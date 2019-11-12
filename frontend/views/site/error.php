<?php

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

use yii\helpers\Html;
use common\helpers\LangHelper;

$this->title = $name;
?>
<div class="container">

    <div class="" style="margin: 100px auto; text-align: center;">
        <h1 style="display:block;"><?=LangHelper::t("Страница не найдена", "Sahifa topilmadi", "Page not found"); ?>!</h1>
    </div>


</div>
