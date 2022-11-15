<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 1:48 PM
 */

use yii\bootstrap4\ActiveForm;

/** @var \yii\web\View $this */
/** @var \common\models\UserAddress $userAddress */


?>

<?php if (isset($success) && $success): ?>
    <div class="alert alert-success">
        Data Alamat Anda Berhasil Diperbarui
    </div>
<?php endif ?>

<?php $addressForm = ActiveForm::begin([
    'action' => ['/profile/update-address'],
    'options' => [
        'data-pjax' => 1
    ]
]); ?>
<?= $addressForm->field($userAddress, 'address') ?>
<?= $addressForm->field($userAddress, 'city') ?>
<?= $addressForm->field($userAddress, 'provinsi')->dropDownList($pro)->label('State') ?>
<?= $addressForm->field($userAddress, 'country') ?>
<?= $addressForm->field($userAddress, 'zipcode') ?>
<br><button class="btn btn-primary">Update</button>
<?php ActiveForm::end() ?>
