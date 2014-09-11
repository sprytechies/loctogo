<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TodoTerms */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Todo Terms',
]) . ' ' . $model->idtodo_terms;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todo Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtodo_terms, 'url' => ['view', 'id' => $model->idtodo_terms]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="todo-terms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
