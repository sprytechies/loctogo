<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Analytics */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Analytics',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Analytics'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="analytics-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
