<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Karyawan */

$this->title = 'Menambahkan Karyawan Baru';
$this->params['breadcrumbs'][] = ['label' => 'Karyawans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="karyawan-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
