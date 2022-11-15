<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Ongkir */

$this->title = 'Tambah Kategori Ongkir';
$this->params['breadcrumbs'][] = ['label' => 'Kategori Ongkir', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ongkir-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
