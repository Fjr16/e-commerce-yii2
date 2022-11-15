<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Ongkir */

$this->title = 'Kategori Ongkir | '. $model->Provinsi;
$this->params['breadcrumbs'][] = ['label' => 'Ongkirs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ongkir-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_ongkir',
            'Provinsi',
            'total_ongkir',
        ],
    ]) ?>
    <a href="./index" class="btn btn-primary">Kembali</a>

</div>
