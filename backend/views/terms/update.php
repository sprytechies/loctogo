<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Terms */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Terms',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->idterms]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="terms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
