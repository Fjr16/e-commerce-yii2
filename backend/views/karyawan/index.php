<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\KaryawanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Karyawan';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->user->identity->level == 'Owner') :?>
<div class="karyawan-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header'=> 'No.'
            ],

            //'id_karyawan',
            //'id_user',
            'nama',
            'telp',
            'alamat:ntext',

            [
                'class' => 'common\grid\ActionColumn',
                'template' => '{view}',
                'contentOptions' => [
                    'class' => 'td-actions'
                ]
            ],
        ],
    ]); ?>


</div>
<?php endif; ?>

<?php if(Yii::$app->user->identity->level == 'Admin') :?>
    <div class="karyawan-index">

<h3><?= Html::encode($this->title) ?></h3>

<p>
    <?= Html::a('Tambahkan Data', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
</p>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header'=> 'No.'
        ],

        //'id_karyawan',
        //'id_user',
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
<?php endif; ?>