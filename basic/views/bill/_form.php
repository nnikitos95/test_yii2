<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Bill */
/* @var $form yii\widgets\ActiveForm */
/* @var $clients array */
?>

<div class="bill-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id')->dropDownList($clients) ?>

    <?= $form->field($model, 'bill_date')->textInput() ?>

    <?= $form->field($model, 'bill_pay')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bill_link')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
