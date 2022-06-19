<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use Exception;

class Headlines extends Model
{
    protected static string $table = 'headlines';

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->timeStamps();

        $this->runValidation(new RequiredValidator($this, ['field' => 'body', 'msg' => 'Message is required']));
    }
}