<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data User';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                <div class="pull-right">
                    <a class="btn btn-primary btn-sm" href="<?= Url::toRoute(['create']) ?>">Tambahkan Data</a>
                </div>
            </div>
            <div class="table-responsive">
                        <?= GridView::widget([
                            'dataProvider' => $dataProvider,
                            'filterModel' => $searchModel,
                            'columns' => [
                                [
                                    'class' => 'yii\grid\SerialColumn',
                                    'header' => 'No.'
                                ],
                                'firstname',
                                'lastname',
                                'username',
                                'level',

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

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
