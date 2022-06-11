<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use Exception;

class contactMessages extends Model
{
    protected static string $table = "contact_messages";
    public $fullname, $email, $subject, $message;
    public string $contact_id;

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->timeStamps();

        $this->runValidation(new RequiredValidator($this, ['field' => 'fullname', 'msg' => "FullName is a required Field."]));

        $this->runValidation(new RequiredValidator($this, ['field' => 'email', 'msg' => "E-Mail is a required Field."]));

        $this->runValidation(new RequiredValidator($this, ['field' => 'subject', 'msg' => "Subject is a required Field."]));

        $this->runValidation(new RequiredValidator($this, ['field' => 'message', 'msg' => "Message is a required Field."]));
    }
}