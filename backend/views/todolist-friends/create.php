<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TodolistFriends */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Todolist Friends',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todolist Friends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-friends-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
