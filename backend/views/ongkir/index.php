<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OngkirSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Kategori Ongkir';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ongkir-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambah Kategori Ongkir', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'header' => 'No.'],

            // 'id_ongkir',
            'Provinsi',
            'total_ongkir',

            [
                'class' => 'common\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'td-actions'
                ]
        ],
        ],
    ]); ?>


</div>





