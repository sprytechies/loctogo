<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\AnalyticsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Analytics');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analytics-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Analytics',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idanalytics',
            'url:url',
            'ip',
            'iduser',
            'session:ntext',
            // 'browser:ntext',
            // 'cdate',
            // 'mdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
