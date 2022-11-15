<?php

use yii\bootstrap4\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title ='Daftar Permintaan Pelanggan'
?>
<?php if(Yii::$app->user->identity->level == 'Owner') :?>
    <div class="order-index">
    <h3><?= Html::encode($this->title) ?></h3>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header'=> 'No.'
        ],
        [
            'attribute' => 'fullname',
            'content' => function ($model) {
                return $model->firstname . ' ' . $model->lastname;
            },
        ],
        'total_price',
        [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList($searchModel, 'status', \common\models\Order::getStatusLabels(), [
                'class' => 'form-control',
                'prompt' => 'All'
            ]),
            'format' => ['orderStatus']
        ],
        'created_at:datetime',
        //'created_by',

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
<?php endif;?>

<?php if(Yii::$app->user->identity->level == 'Admin') :?>
    <div class="order-index">
    <h3><?= Html::encode($this->title) ?></h3>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header'=> 'No.'
        ],
        [
            'attribute' => 'fullname',
            'content' => function ($model) {
                return $model->firstname . ' ' . $model->lastname;
            },
        ],
        'total_price',
        [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList($searchModel, 'status', \common\models\Order::getStatusLabels(), [
                'class' => 'form-control',
                'prompt' => 'All'
            ]),
            'format' => ['orderStatus']
        ],
        'created_at:datetime',
        [
            'label' => 'Bukti Pembayaran',
            'attribute' => 'bukti',
            'content' => function ($model) {
                /** @var \common\models\Product $model */
                return Html::img($model->getImageUrl(), ['style' => 'width: 100px']);
            }
        ],
        //'created_by',

        [
            'class' => 'common\grid\ActionColumn',
            // 'template' => '{view}',
            'contentOptions' => [
                'class' => 'td-actions'
            ]
        ],
    ],
]); ?>


</div>
<?php endif;?>

<?php if(Yii::$app->user->identity->level == 'Karyawan') :?>
    <div class="order-index">
    <h3><?= Html::encode($this->title) ?></h3>

<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= GridView::widget([
    // 'id' => 'ordersTable',
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'pager' => [
        'class' => \yii\bootstrap4\LinkPager::class
    ],
    'columns' => [
        [
            'class' => 'yii\grid\SerialColumn',
            'header'=> 'No.'
        ],
        [
            'attribute' => 'fullname',
            'content' => function ($model) {
                return $model->firstname . ' ' . $model->lastname;
            },
        ],
        'total_price',
        //'email:email',
        //'transaction_id',
        //'paypal_order_id',
        [
            'attribute' => 'status',
            'filter' => Html::activeDropDownList($searchModel, 'status', \common\models\Order::getStatusLabels(), [
                'class' => 'form-control',
                'prompt' => 'All'
            ]),
            'format' => ['orderStatus']
        ],
        'created_at:datetime',
        //'created_by',
        [
            'label' => 'Bukti Pembayaran',
            'attribute' => 'bukti',
            'content' => function ($model) {
                /** @var \common\models\Product $model */
                return Html::img($model->getImageUrl(), ['style' => 'width: 100px']);
            }
        ],

        [
            'class' => 'common\grid\ActionColumn',
            // 'template' => ' {view}',
            'contentOptions' => [
                'class' => 'td-actions'
            ]
        ],
    ],
]); ?>


</div>
<?php endif;?>
