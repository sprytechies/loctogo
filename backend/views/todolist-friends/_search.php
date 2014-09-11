<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TodolistFriendsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todolist-friends-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idtodolist_friends') ?>

    <?= $form->field($model, 'idtodolist') ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'idfriends') ?>

    <?= $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
