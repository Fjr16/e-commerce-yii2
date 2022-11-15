<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="owner-form">
<div class="row">
        <div class="col-lg-6">
            <?php $form = ActiveForm::begin(); ?>

            <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'telp')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'alamat')->textarea(['rows' => 6]) ?>
        </div>
</div>
    <div class="col-lg-6">
        <div class="form-group">
            <?= Html::submitButton('Save',['class' =>'btn btn-primary']) ?>
            <a href="./index" class="btn btn-default">Kembali</a>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
