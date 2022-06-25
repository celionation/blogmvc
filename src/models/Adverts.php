<?php

namespace src\models;

use core\helpers\GenerateToken;
use core\Model;
use core\validators\RequiredValidator;
use Exception;

class Adverts extends Model
{
    protected static string $table = "adverts";

    const MAIN_ADS = 'main';
    const SUB_ADS = 'sub';

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->timeStamps();
        $this->runValidation(new RequiredValidator($this, ['field' => 'name', 'msg' => 'Company Name is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'ads_label', 'msg' => 'Ads Label is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'status', 'msg' => 'Ads Status is required']));

        if($this->isNew()) {
            $this->ads_id = GenerateToken::randomString(10);
        }
    }
}