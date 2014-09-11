<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\States */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'States',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idstates]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="states-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
