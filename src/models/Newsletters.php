<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use core\validators\UniqueValidator;
use Exception;

class Newsletters extends Model
{
    protected static string $table = "newsLetters";

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->timeStamps();

        $this->runValidation(new RequiredValidator($this, ['field' => 'email', 'msg' => "E-Mail is a required Field."]));
        $this->runValidation(new UniqueValidator($this, ['field' => 'email', 'msg' => "E-Mail Already Exists"]));
    }
}