<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Todolist */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Todolist',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Todolists'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="todolist-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
