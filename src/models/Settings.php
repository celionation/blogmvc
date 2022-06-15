<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use core\validators\UniqueValidator;
use Exception;

class Settings extends Model
{
    protected static string $table = 'settings';
    public $name;

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        if($this->isNew()) {
            $this->timeStamps();
            $this->runValidation(new RequiredValidator($this, ['field' => 'name', 'msg' => 'Name is required']));
            $this->runValidation(new UniqueValidator($this, ['field' => 'name', 'msg' => 'Field already Exists']));
        }
    }
}