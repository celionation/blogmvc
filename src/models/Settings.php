<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use core\validators\UniqueValidator;
use Exception;

class Settings extends Model
{
    protected static string $table = 'settings';
    public $id;

    const SETTING_ACTIVATE = 'Activate';
    const SETTING_DEACTIVATE = 'Deactivate';

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        if($this->isNew()) {
            $this->timeStamps();
            $this->runValidation(new RequiredValidator($this, ['field' => 'option', 'msg' => 'Field is required']));
            $this->runValidation(new RequiredValidator($this, ['field' => 'value', 'msg' => 'Field is required']));
            $this->runValidation(new UniqueValidator($this, ['field' => 'option', 'msg' => 'Field already Exists']));
        }
    }
}