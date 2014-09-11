<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\TodoTerms */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="todo-terms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idtodo')->textInput() ?>

    <?= $form->field($model, 'idterms')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
