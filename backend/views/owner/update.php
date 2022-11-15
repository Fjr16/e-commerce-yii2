<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Owner */

$this->title = 'Update Owner: ' . $model->id_owner;
$this->params['breadcrumbs'][] = ['label' => 'Owners', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_owner, 'url' => ['view', 'id' => $model->id_owner]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="box-header">
    <h3 class="box-title"><?= Html::encode($this->title) ?></h3> 
</div>
<div class="box-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="owner-update">

                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>

            </div>
        </div>
    </div>
</div>
