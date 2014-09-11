<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\States */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'States',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'States'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="states-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
