<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ongkir */

$this->title = 'Update Kategori Ongkir| ' . $model->Provinsi;
$this->params['breadcrumbs'][] = ['label' => 'Ongkirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_ongkir, 'url' => ['view', 'id' => $model->id_ongkir]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ongkir-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
