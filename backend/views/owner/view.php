<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */

$modelName = 'Owner';
$this->title = 'Owner | ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Owner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
// \yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-warning">
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="box-header">
                            <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="owner-view">

                                        <?= DetailView::widget([
                                            'model' => $model,
                                            'attributes' => [
                                                // 'id_owner',
                                                'id_user',
                                                'nama',
                                                'telp',
                                                'alamat:ntext',
                                            ],
                                        ]) ?>
                                        <a href="./index" class="btn btn-primary">Kembali</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
