<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\AnalyticsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="analytics-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idanalytics') ?>

    <?= $form->field($model, 'url') ?>

    <?= $form->field($model, 'ip') ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'session') ?>

    <?php // echo $form->field($model, 'browser') ?>

    <?php // echo $form->field($model, 'cdate') ?>

    <?php // echo $form->field($model, 'mdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
