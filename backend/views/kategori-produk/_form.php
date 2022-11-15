<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\KategoriProduk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kategori-produk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kategori')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-primary']) ?>
        <a href="./index" class="btn btn-default">Kembali</a>
    </div>

    <?php ActiveForm::end(); ?>

</div>
