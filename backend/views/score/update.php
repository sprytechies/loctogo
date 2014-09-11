<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Score */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Score',
]) . ' ' . $model->idscore;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Scores'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idscore, 'url' => ['view', 'id' => $model->idscore]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="score-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
