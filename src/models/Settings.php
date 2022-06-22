<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use core\validators\UniqueValidator;
use Exception;

class Settings extends Model
{
    protected static string $table = 'settings';
    public $name, $value_one, $status_one = 0, $value_two, $status_two = 0, $value_three, $status_three = 0, $value_four, $status_four = 0, $value_five, $status_five = 0, $value_six, $status_six = 0;
    public string $setting_id;

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