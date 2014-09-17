<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Analytics */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Analytics',
]) . ' ' . $model->idanalytics;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Analytics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idanalytics, 'url' => ['view', 'id' => $model->idanalytics]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="analytics-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
