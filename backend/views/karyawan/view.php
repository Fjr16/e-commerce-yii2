<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Karyawan */

$this->title ='Karyawan | '. $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="karyawan-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id_karyawan',
            'id_user',
            'nama',
            'telp',
            'alamat:ntext',
        ],
    ]) ?>
    <a href="./index" class="btn btn-primary">Kembali</a>

</div>
