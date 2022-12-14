<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Karyawan */

$this->title = 'Update Karyawan  | ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_karyawan, 'url' => ['view', 'id' => $model->id_karyawan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="karyawan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
