<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\TodolistFriends */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Todolist Friends',
]) . ' ' . $model->idtodolist_friends;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todolist Friends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idtodolist_friends, 'url' => ['view', 'id' => $model->idtodolist_friends]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="todolist-friends-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
