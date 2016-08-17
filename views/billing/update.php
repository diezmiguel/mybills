<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bills */

$this->title = 'Update Bills: ' . $model->Id;
$this->params['breadcrumbs'][] = ['label' => 'Bills', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id, 'url' => ['view', 'id' => $model->Id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bills-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'catModel'=>$catModel
    ]) ?>

</div>
