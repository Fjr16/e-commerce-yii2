<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Produk';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->user->identity->level == 'Owner') :?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => 'No.'
                ],
                [
                    'label' => 'Image',
                    'attribute' => 'image',
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::img($model->getImageUrl(), ['style' => 'width: 50px']);
                    }
                ],
                [
                    'attribute' => 'name',
                    'content' => function ($model) {
                        return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                    }
                ],
                [
                    'attribute' => 'kategori',
                    'value' => function ($model) {
                        return $model->kategori->kategori;
                    }

                ],
                    'price',
                    'stok',
                [
                    'attribute' => 'status',
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::tag('span', $model->status ? 'Active' : 'Draft', [
                            'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                        ]);
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['datetime'],
                    'contentOptions' => ['style' => 'white-space: nowrap']
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['datetime'],
                    'contentOptions' => ['style' => 'white-space: nowrap']
                ],
                //'created_by',
                //'updated_by',
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


</div>
<?php endif;?>

<?php if(Yii::$app->user->identity->level == 'Admin') :?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambah Produk', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'header' => 'No.'
                ],
                [
                    'label' => 'Image',
                    'attribute' => 'image',
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::img($model->getImageUrl(), ['style' => 'width: 50px']);
                    }
                ],
                [
                    'attribute' => 'name',
                    'content' => function ($model) {
                        return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                    }
                ],

                [
                    'attribute' => 'kategori',
                    'value' => function ($model) {
                        return $model->kategori->kategori;
                    }

                ],
                    'price',
                    'stok',
                [
                    'attribute' => 'status',
                    'content' => function ($model) {
                        /** @var \common\models\Product $model */
                        return Html::tag('span', $model->status ? 'Active' : 'Draft', [
                            'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                        ]);
                    }
                ],
                [
                    'attribute' => 'created_at',
                    'format' => ['datetime'],
                    'contentOptions' => ['style' => 'white-space: nowrap']
                ],
                [
                    'attribute' => 'updated_at',
                    'format' => ['datetime'],
                    'contentOptions' => ['style' => 'white-space: nowrap']
                ],
                //'created_by',
                //'updated_by',

                [
                    'class' => 'common\grid\ActionColumn',
                    'contentOptions' => [
                        'class' => 'td-actions'
                    ]
                ],
            ],
        ]); ?>
    </div>


</div>
<?php endif;?>

<?php if(Yii::$app->user->identity->level == 'Karyawan') :?>
<div class="product-index">

    <h3><?= Html::encode($this->title) ?></h3>

    <p>
        <?= Html::a('Tambah Produk', ['create'], ['class' => 'btn btn-primary btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'No.'
            ],
            [
                'label' => 'Image',
                'attribute' => 'image',
                'content' => function ($model) {
                    /** @var \common\models\Product $model */
                    return Html::img($model->getImageUrl(), ['style' => 'width: 50px']);
                }
            ],
            [
                'attribute' => 'name',
                'content' => function ($model) {
                    return \yii\helpers\StringHelper::truncateWords($model->name, 7);
                }
            ],
            [
                'attribute' => 'kategori',
                'value' => function ($model) {
                    return $model->kategori->kategori;
                }

            ],
                'price',
                'stok',
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    /** @var \common\models\Product $model */
                    return Html::tag('span', $model->status ? 'Active' : 'Draft', [
                        'class' => $model->status ? 'badge badge-success' : 'badge badge-danger'
                    ]);
                }
            ],
            [
                'attribute' => 'created_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['datetime'],
                'contentOptions' => ['style' => 'white-space: nowrap']
            ],
            //'created_by',
            //'updated_by',

            [
                'class' => 'common\grid\ActionColumn',
                'contentOptions' => [
                    'class' => 'td-actions'
                ]
            ],
        ],
    ]); ?>
    </div>


</div>
<?php endif;?>
