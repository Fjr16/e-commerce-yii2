<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CostumerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Costumer';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->user->identity->level == 'Admin') :?>
<div class="costumer-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.'
            ],

            // 'id_costumer',
            // 'id_user',
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

<?php if(Yii::$app->user->identity->level == 'Owner') :?>
    <div class="costumer-index">

<h3><?= Html::encode($this->title) ?></h3>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Cetak Data Pelanggan', ['export-pdf'], ['class'=>'btn btn-info']); ?>  
    </p>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header' => 'No.'
        ],

        // 'id_costumer',
        // 'id_user',
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
