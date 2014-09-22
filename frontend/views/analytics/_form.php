<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Analytics */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analytics-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 128]) ?>

    <?= $form->field($model, 'ip')->textInput(['maxlength' => 16]) ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <?= $form->field($model, 'session')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'browser')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'cdate')->textInput() ?>

    <?= $form->field($model, 'mdate')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
