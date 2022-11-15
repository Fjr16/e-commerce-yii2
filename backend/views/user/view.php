<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\User */

$modelName = 'User';
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-warning">
            <div class="box-header">
                <h3 class="box-title"><?= Html::encode($this->title) ?></h3>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <?= DetailView::widget([
                            'model' => $model,
                            'attributes' => [
                                // 'id',
                                'level',
                                'firstname',
                                'lastname',
                                'username',
                                'email:email',
                                [
                                    'attribute' => 'status',
                                    'value' => function ($row) {
                                        return $row->status == 10 ? 'Aktif' : 'Tidak Aktif';
                                    }
                                ],
                                'created_at:datetime',
                                'updated_at:datetime',
                            ],
                        ]) ?>
                        <a href="<?= Url::toRoute(['/user']) ?>" class="btn btn-primary">Kembali</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
