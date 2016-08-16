<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bills */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bills-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Organization')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dueDate')->textInput() ?>

    <?= $form->field($model, 'balance')->textInput() ?>

    <?= $form->field($model, 'minimum')->textInput() ?>

    <?= $form->field($model, 'interest')->textInput() ?>

    <?= $form->field($model, 'paid')->textInput() ?>

    <?= $form->field($model, 'sms')->textInput() ?>

    <?= $form->field($model, 'category')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
