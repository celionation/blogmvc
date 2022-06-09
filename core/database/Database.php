<?php

namespace core\database;

use core\Application;
use core\Config;
use core\Errors;
use Exception;

class Database
{
    protected $_results, $_lastInsertId, $_rowCount = 0, $_fetchType = \PDO::FETCH_OBJ, $_class, $_error = false;
    protected \PDO $_dbh;
    protected $_stmt;
    protected static $_db;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $drivers = Config::get('DB_DRIVERS');
        $host = Config::get('DB_HOST');
        $port = Config::get('DB_PORT');
        $name = Config::get('DB_DATABASE');
        $user = Config::get('DB_USERNAME');
        $pass = Config::get('DB_PASSWORD');
        $db_activate = Config::get('DB_ACTIVATE');
        $options = [
            \PDO::ATTR_EMULATE_PREPARES => false,
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
        ];
        if (strtolower($db_activate) == 'true') {
            try {
                $this->_dbh = new \PDO("{$drivers}:host={$host};dbname={$name};port={$port}", $user, $pass, $options);
            } catch (Exception $e) {
                throw new Exception($e->getMessage());
            }
        }
    }

    public static function getInstance()
    {
        if (!self::$_db) {
            self::$_db = Application::$app->db;
        }
        return self::$_db;
    }


    /**
     * Executes PDO Query
     * @param string $sql defines the query to be executed
     * @param array $bind defines the argument that need to be bound to the query
     * @return $this
     * @throws Exception
     * @version 1.0.0
     * @author Celio Natti <Celionatti@gmail.com>
     */
    public function execute($sql, $bind = [])
    {
        $this->_stmt = $this->_dbh->prepare($sql);
        if (!$this->_stmt || !is_array($bind)) {
            $this->_error = true;
            throw new \Exception(Errors::get('2003'), 2003);
        }
        $this->_stmt->execute($bind);
        $this->_lastInsertId = $this->_dbh->lastInsertId();
        return $this;
    }

    /**
     * @throws Exception
     */
    public function query($sql, $bind = [])
    {
        $this->execute($sql, $bind);
        if (!$this->_error) {
            $this->_rowCount = $this->_stmt->rowCount();
            if ($this->_fetchType === \PDO::FETCH_CLASS) {
                $this->_results = $this->_stmt->fetchAll($this->_fetchType, $this->_class);
            } else {
                $this->_results = $this->_stmt->fetchAll($this->_fetchType);
            }
        }
        return $this;
    }

    public function insert($table, $values)
    {
        $fields = [];
        $binds = [];
        foreach ($values as $key => $value) {
            $fields[] = $key;
            $binds[] = ":{$key}";
        }
        $fieldStr = implode('`, `', $fields);
        $bindStr = implode(', ', $binds);
        $sql = "INSERT INTO {$table} (`{$fieldStr}`) VALUES ({$bindStr})";
        $this->execute($sql, $values);
        return !$this->_error;
    }

    public function update($table, $values, $conditions)
    {
        $binds = [];
        $valueStr = "";
        foreach ($values as $field => $value) {
            $valueStr .= ", `{$field}` = :{$field}";
            $binds[$field] = $value;
        }
        $valueStr = ltrim($valueStr, ', ');
        $sql = "UPDATE {$table} SET {$valueStr}";

        if (!empty($conditions)) {
            $conditionStr = " WHERE ";
            foreach ($conditions as $field => $value) {
                $conditionStr .= "`{$field}` = :cond{$field} AND ";
                $binds['cond' . $field] = $value;
            }
            $conditionStr = rtrim($conditionStr, ' AND ');
            $sql .= $conditionStr;
        }
        $this->execute($sql, $binds);
        return !$this->_error;
    }

    public function results()
    {
        return $this->_results;
    }

    public function count()
    {
        return $this->_rowCount;
    }

    public function lastInsertId()
    {
        return $this->_lastInsertId;
    }

    public function setClass($class)
    {
        $this->_class = $class;
    }

    public function getClass()
    {
        return $this->_class;
    }

    public function setFetchType($type)
    {
        $this->_fetchType = $type;
    }

    public function getFetchType()
    {
        return $this->_fetchType;
    }

    // ***************** MIGRATIONS CODE *****************

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $newMigrations = [];
        $files = scandir(Application::$ROOT_DIR . '/migrations');
        $toApplyMigrations = array_diff($files, $appliedMigrations);
        foreach ($toApplyMigrations as $migration) {
            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$ROOT_DIR . '/migrations/' . $migration;
            $className = pathinfo($migration, PATHINFO_FILENAME);
            $instance = new $className();
            $this->log("Applying migration $migration");
            $instance->up();
            $this->log("Applied migration $migration");
            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->log("There are no migrations to apply");
        }
    }

    protected function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR(255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )  ENGINE=INNODB;");
    }

    protected function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    protected function saveMigrations(array $newMigrations)
    {
        $str = implode(',', array_map(fn ($m) => "('$m')", $newMigrations));
        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $str
        ");
        $statement->execute();
    }

    public function prepare($sql): \PDOStatement
    {
        return $this->pdo->prepare($sql);
    }

    private function log($message)
    {
        echo "[" . date("Y-m-d H:i:s") . "] - " . $message . PHP_EOL;
    }

    public function __call(string $name, array $arguments)
    {
        return call_user_func_array([$this->pdo, $name], $arguments);
    }

}