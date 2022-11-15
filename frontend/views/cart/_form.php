<?php

use dosamigos\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\bootstrap4\ActiveForm */

$orderAddress = $order->orderAddress
?>

<div class="cart-form">

<h3>Detail Pesanan: </h3>
<hr>
  <div class="row">
    <div class="col">
        <h5>Informasi Akun</h5>
        <table class="table">
            <tr>
                <th>Firstname</th>
                <td><?php echo $order->firstname ?></td>
            </tr>
            <tr>
                <th>Lastname</th>
                <td><?php echo $order->lastname ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo $order->email ?></td>
            </tr>
        </table>
        <h5>Informasi Alamat</h5>
        <table class="table">
            <tr>
                <th>Address</th>
                <td><?php echo $orderAddress->address ?></td>
            </tr>
            <tr>
                <th>City</th>
                <td><?php echo $orderAddress->city ?></td>
            </tr>
            <tr>
                <th>State</th>
                <td><?php echo $orderAddress->state ?></td>
            </tr>
            <tr>
                <th>Country</th>
                <td><?php echo $orderAddress->country ?></td>
            </tr>
            <tr>
                <th>ZipCode</th>
                <td><?php echo $orderAddress->zipcode ?></td>
            </tr>
        </table>
    </div>
      <div class="col">
        <h5>Produk</h5>
        <table class="table table-sm">
            <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama</th>
                <th>Jumlah</th>
                <th>Harga</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($order->orderItems as $item): ?>
                <tr>
                    <td>
                        <img src="<?php echo $item->product->getImageUrl() ?>"
                            style="width: 50px;">
                    </td>
                    <td><?php echo $item->product_name ?></td>
                    <td><?php echo $item->quantity ?></td>
                    <td><?php echo $item->quantity * $item->unit_price ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
        <hr>
        <table class="table">
            <tr>
                <th>Total Items</th>
                <td><?php echo $order->getItemsQuantity() ?></td>
            </tr>
            <tr>
                <th>Ongkir</th>
                <td><?php echo $order->total_ongkir ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><?php echo $order->total_price ?></td>
            </tr>
        </table>
        <div>
          <!-- <label for="formFileLg" class="form-label">Upload Bukti Transfer</label>
          <input class="form-control form-control-lg" id="formFileLg" type="file">

          <p class="text-right mt-3">
                    <button class="btn btn-primary">Kirim Pesanan</button>
          </p> -->
              <!----------------------------------------->
        <table class="table">
            <tr>
                <th>Bukti Pembayaran</th>
            </tr>
            <tr>
            <th>
                <img class="card-img-top" src="<?php echo $order->getImageUrl() ?>" style="width: 300px"></th>
            </tr>
        </table>
    <br>
    <div class="form-group">
        <a href="<?=Yii::$app->getHomeUrl();?>" class="btn btn-primary">Selesai</a>
        <!-- <button class="btn btn-danger">Batalkan Orderan</button> -->
    </div>

        </div>
      </div>
  </div>
</div>
