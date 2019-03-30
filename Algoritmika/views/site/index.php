<?php
use yii\helpers\Html;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<div class="site-index">
    <div class="jumbotron">
        <p>
            <?= Html::a('К урокам', '/school/lesson/index', ['class' => 'btn btn-lg btn-success']) ?>
        </p>
    </div>
</div>
