<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use Exception;

class Settings extends Model
{
    protected static string $table = 'settings';
    public $sitename, $copyright, $manager, $logo, $description, $keywords, $mission_aim, $about_founder;

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->runValidation(new RequiredValidator($this, ['field' => 'sitename', 'msg' => 'Site Name is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'copyright', 'msg' => 'Copyright is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'manager', 'msg' => 'Manager is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'description', 'msg' => 'Description is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'keywords', 'msg' => 'Keywords is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'mission_aim', 'msg' => 'Mission & Aim is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'about_founder', 'msg' => 'About Founder is required']));
    }
}