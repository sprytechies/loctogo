<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Todolist */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Todolist',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todolists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idtodolist]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="todolist-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
