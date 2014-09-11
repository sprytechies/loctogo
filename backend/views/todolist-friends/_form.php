<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TodolistFriends */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todolist-friends-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtodolist_friends')->textInput() ?>

    <?= $form->field($model, 'idtodolist')->textInput() ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <?= $form->field($model, 'idfriends')->textInput() ?>

    <?= $form->field($model, 'cdate')->textInput() ?>

    <?= $form->field($model, 'mdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
