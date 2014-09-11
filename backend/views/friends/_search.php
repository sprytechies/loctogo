<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\FriendsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="friends-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idfriends') ?>

    <?= $form->field($model, 'iduser') ?>

    <?= $form->field($model, 'idfriend') ?>

    <?= $form->field($model, 'cdate') ?>

    <?= $form->field($model, 'mdate') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
