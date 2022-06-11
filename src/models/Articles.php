<?php

namespace src\models;

use core\helpers\GenerateToken;
use core\Model;
use core\validators\RequiredValidator;
use Exception;

class Articles extends Model
{
    protected static string $table = 'articles';

    public $id, $created_at, $updated_at, $user_id, $title, $body, $img, $status = 'private', $category_id = 0, $region_id = 0;

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->timeStamps();

        $this->runValidation(new RequiredValidator($this, ['field' => 'title', 'msg' => 'Title is required']));
        $this->runValidation(new RequiredValidator($this, ['field' => 'body', 'msg' => 'Body is a required field.']));

        if ($this->isNew()) {
            $this->article_id = GenerateToken::randomString(6);
        }
    }
}