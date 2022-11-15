<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KategoriProdukSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kategori-produk-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambah Kategori', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.'
            ],

            // 'id',
            'kategori',
            [
                'class' => 'common\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'td-actions'
                ]
        ],
        ],
    ]); ?>


</div>
