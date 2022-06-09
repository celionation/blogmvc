<?php


$this->title = 'Welcome Page';


?>

<?php \core\helpers\CoreHelpers::dnd($name); ?>
<h1>Blog Home Page By <?= $name->fname ?></h1>
