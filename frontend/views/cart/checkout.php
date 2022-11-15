<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 8:12 PM
 */
/** @var \common\models\Order $order */
/** @var \common\models\OrderAddress $orderAddress */
/** @var array $cartItems */
/** @var int $productQuantity */

/** @var float $totalPrice */

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

?>

<?php $form = ActiveForm::begin([
    'id' => 'checkout-form',  'options' => ['enctype' => 'multipart/form-data']
]); ?>

<?php if(isset($success) && $success) :?>
    <div class="alert alert-warning">
        <h3>Tolong Gunakan Alamat Yang Valid !!</h3>
        Data Alamat Anda Tidak Valid / Tidak Terjangkau, Segera Perbarui Alamat Anda. <br>
    </div>
    <div class="row">
    <div class="col">
    <div class="card mb-3">
            <div class="card-header">
                <h5>Informasi Akun</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($order, 'firstname')->textInput(['autofocus' => true, 'readonly' =>true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($order, 'lastname')->textInput(['autofocus' => true, 'readonly' =>true]) ?>
                    </div>
                </div>
                <?= $form->field($order, 'email')->textInput(['autofocus' => true, 'readonly' =>true]) ?>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Informasi Alamat Pengiriman</h5>
            </div>
            <div class="card-body">
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
                <td><?php echo $orderAddress->provinsi ?></td>
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
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Informasi Pesanan</h5>
            </div>
            <div class="card-body">
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
                    <?php foreach ($cartItems as $item): ?>
                        <tr >
                            <td>
                                <img src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>"
                                     style="width: 50px;"
                                     alt="<?php echo $item['name'] ?>">
                            </td>
                            <td><?php echo $item['name'] ?></td>
                            <td>
                                <?php echo $item['quantity'] ?>
                            </td>
                            <td><?php echo $item['total_price'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <p class="text-right mt-3">
                    <a href="./index" class="btn btn-primary">Perbarui Alamat</a>
                </p>
            </div>
        </div>
    </div>
</div>

<?php else :?>
<div class="row">
    <div class="col">
        <div class="card mb-3">
            <div class="card-header">
                <h5>Verifikasi Akun</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($order, 'firstname')->textInput(['autofocus' => true, 'readonly' =>true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($order, 'lastname')->textInput(['autofocus' => true, 'readonly' =>true]) ?>
                    </div>
                </div>
                <?= $form->field($order, 'email')->textInput(['autofocus' => true, 'readonly' =>true]) ?>

            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h5>Verifikasi Alamat</h5>
            </div>
            <div class="card-body">
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
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5>Verifikasi Pesanan</h5>
            </div>
            <div class="card-body">
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
                    <?php foreach ($cartItems as $item): ?>
                        <tr >
                            <td>
                                <img src="<?php echo \common\models\Product::formatImageUrl($item['image']) ?>"
                                     style="width: 50px;"
                                     alt="<?php echo $item['name'] ?>">
                            </td>
                            <td><?php echo $item['name'] ?></td>
                            <td>
                                <?php echo $item['quantity'] ?>
                            </td>
                            <td><?php echo $item['total_price'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <hr>
                <table class="table">
                    <tr>
                        <td>Total Produk</td>
                        <td class="text-right"><?php echo $productQuantity ?></td>
                    </tr>
                    <tr>
                        <td>Total Belanja</td>
                        <td class="text-right">
                            <?php echo $totalPrice ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Ongkir</td>
                        <td class="text-right">
                            <?php echo $ong ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Total Bayar</td>
                        <td class="text-right">
                            <?php echo $sumTotal ?>
                        </td>
                    </tr>
                </table>

                <?= $form->field($order, 'imageFile', [
                    'template' => '
                        <div class="custom-file">
                            {label}
                            {input}
                            {error}
                        </div>'
                ])->textInput(['type' => 'file']) ?>
                <p class="text-right mt-3">
                    <button class="btn btn-secondary">Bayar Sekarang</button>
                    <a href="./index" class="btn btn-danger">Batal</a>
                </p>
            </div>
        </div>
    </div>
</div>
<?php endif;?> 

<?php ActiveForm::end(); ?>
