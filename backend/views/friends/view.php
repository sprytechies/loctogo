<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Friends */

$this->title = $model->idfriends;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Friends'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="friends-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->idfriends], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->idfriends], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idfriends',
            'iduser',
            'idfriend',
            'cdate',
            'mdate',
        ],
    ]) ?>

</div>
