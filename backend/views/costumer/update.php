<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Costumer */

$this->title = 'Update Costumer | ' . $model->nama;
$this->params['breadcrumbs'][] = ['label' => 'Costumers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_costumer, 'url' => ['view', 'id' => $model->id_costumer]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="costumer-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
