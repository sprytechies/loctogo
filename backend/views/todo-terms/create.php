<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\TodoTerms */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Todo Terms',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todo Terms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todo-terms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
