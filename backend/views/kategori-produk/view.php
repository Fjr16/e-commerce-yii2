<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\KategoriProduk */

$this->title = 'Kategori | ' .$model->kategori;
$this->params['breadcrumbs'][] = ['label' => 'Kategori Produks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="kategori-produk-view">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'kategori',
        ],
    ]) ?>
    <a href="./index" class="btn btn-primary">Kembali</a>

</div>
