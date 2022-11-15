<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OwnerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Owner';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="owner-index">
    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambahkan Data', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.'
            ],
            'nama',
            'telp',
            'alamat:ntext',
            [
                'class' => 'common\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'td-actions'
                    ]
                ],
            ],
         ]); ?>
</div>
          

