<?php

namespace src\models;

use core\Model;
use core\validators\RequiredValidator;
use Exception;

class Comments extends Model
{
    protected static string $table = 'comments';
    public string|array|false $name;
    public string|array|false $comment;
    /**
     * @var mixed|null
     */
    public mixed $article_id;
    public string $comment_id;

    /**
     * @throws Exception
     */
    public function beforeSave()
    {
        $this->timeStamps();

        $this->runValidation(new RequiredValidator($this, ['field' => 'comment', 'msg' => "Comment is required"]));
    }
}