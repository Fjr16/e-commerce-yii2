<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Ongkir */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ongkir-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Provinsi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'total_ongkir')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <a href="./index" class="btn btn-default">Kembali</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
