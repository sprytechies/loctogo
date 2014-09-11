<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Todo */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Todo',
]) . ' ' . $model->idtodo;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtodo, 'url' => ['view', 'id' => $model->idtodo]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="todo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
