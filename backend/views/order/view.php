<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Order */

$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$orderAddress = $model->orderAddress;
?>
<?php if(Yii::$app->user->identity->level == 'Karyawan') :?>
    <div class="order-view">

<h1><?= Html::encode($this->title) ?></h1>

<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'total_price',
        'status:orderStatus',
        'firstname',
        'lastname',
        'email:email',
        // 'transaction_id',
        // 'paypal_order_id',
        'created_at:datetime',
        [
            'attribute' => 'Bukti Pembayaran',
            'format' => ['html'],
            'value' => fn() => Html::img($model->getImageUrl(), ['style' => 'width: 400px']),
        ],
    ],
]) ?>

<h4>Address</h4>
<?= DetailView::widget([
    'model' => $orderAddress,
    'attributes' => [
        'address',
        'city',
        'state',
        'country',
        'zipcode',
    ],
]) ?>

<h4>Detail Pesanan</h4>
<table class="table table-sm">
    <thead>
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga satuan</th>
        <th>Ongkir</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model->orderItems as $item): ?>
        <tr>
            <td>
                <img src="<?php echo $item->product ? $item->product->getImageUrl() : \common\models\Product::formatImageUrl(null) ?>"
                     style="width: 50px;">
            </td>
            <td><?php echo $item->product_name ?></td>
            <td><?php echo $item->quantity ?></td>
            <td><?php echo $item->unit_price ?></td>
            <td><?php echo $model->total_ongkir ?></td>
            <td><?php echo $model->total_price ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<a href="./index" class="btn btn-primary">Kembali</a>
<?php endif;?>

<?php if(Yii::$app->user->identity->level == 'Owner') :?>
    <div class="order-view">

<h1><?= Html::encode($this->title) ?></h1>


<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'total_price',
        'status:orderStatus',
        'firstname',
        'lastname',
        'email:email',
        'transaction_id',
        'paypal_order_id',
        'created_at:datetime',
    ],
]) ?>

<h4>Address</h4>
<?= DetailView::widget([
    'model' => $orderAddress,
    'attributes' => [
        'address',
        'city',
        'state',
        'country',
        'zipcode',
    ],
]) ?>

<h4>Detail Pesanan</h4>
<table class="table table-sm">
    <thead>
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga satuan</th>
        <th>Ongkir</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model->orderItems as $item): ?>
        <tr>
            <td>
                <img src="<?php echo $item->product ? $item->product->getImageUrl() : \common\models\Product::formatImageUrl(null) ?>"
                     style="width: 50px;">
            </td>
            <td><?php echo $item->product_name ?></td>
            <td><?php echo $item->quantity ?></td>
            <td><?php echo $item->unit_price ?></td>
            <td><?php echo $model->total_ongkir ?></td>
            <td><?php echo $model->total_price ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="./index" class="btn btn-primary">Kembali</a>
<?php endif;?>


<?php if(Yii::$app->user->identity->level == 'Admin') :?>
    <div class="order-view">

<h1><?= Html::encode($this->title) ?></h1>


<?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'id',
        'total_price',
        'status:orderStatus',
        'firstname',
        'lastname',
        'email:email',
        // 'transaction_id',
        // 'paypal_order_id',
        'created_at:datetime',
        [
            'attribute' => 'Bukti Pembayaran',
            'format' => ['html'],
            'value' => fn() => Html::img($model->getImageUrl(), ['style' => 'width: 400px']),
        ],
    ],
]) ?>

<h4>Address</h4>
<?= DetailView::widget([
    'model' => $orderAddress,
    'attributes' => [
        'address',
        'city',
        'state',
        'country',
        'zipcode',
    ],
]) ?>

<h4>Detail Pesanan</h4>
<table class="table table-sm">
    <thead>
    <tr>
        <th>Foto</th>
        <th>Nama</th>
        <th>Jumlah</th>
        <th>Harga satuan</th>
        <th>Ongkir</th>
        <th>Total Harga</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($model->orderItems as $item): ?>
        <tr>
            <td>
                <img src="<?php echo $item->product ? $item->product->getImageUrl() : \common\models\Product::formatImageUrl(null) ?>"
                     style="width: 50px;">
            </td>
            <td><?php echo $item->product_name ?></td>
            <td><?php echo $item->quantity ?></td>
            <td><?php echo $item->unit_price ?></td>
            <td><?php echo $model->total_ongkir ?></td>
            <td><?php echo $model->total_price ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<a href="./index" class="btn btn-primary">Kembali</a>
<?php endif;?>