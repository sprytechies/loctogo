<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\TodolistFriendsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Todolist Friends');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-friends-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Todolist Friends',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idtodolist_friends',
            'idtodolist',
            'iduser',
            'idfriends',
            'cdate',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
