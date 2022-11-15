<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */

$modelName = 'Owner';
$this->title = 'Menambahkan Owner Baru';
$this->params['breadcrumbs'][] = ['label' => 'Owner', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
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

                                    <div class="owner-create">

                                            <?= $this->render('_form', [
                                                'model' => $model,
                                            ]) ?>
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
