<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 1:30 PM
 */
/** @var \common\models\User $user */
/** @var \yii\web\View $this */
/** @var \common\models\UserAddress $userAddress */


?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                Informasi Alamat
            </div>
            <div class="card-body">

                <?php \yii\widgets\Pjax::begin([
                    'enablePushState' => false
                ]) ?>
                <?php echo $this->render('user_address', [
                    'userAddress' => $userAddress,
                    'pro'=>$pro,
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-header">
                Informasi Akun
            </div>
            <div class="card-body">
                <?php \yii\widgets\Pjax::begin([
                    'enablePushState' => false
                ]) ?>
                <?php echo $this->render('user_account', [
                    'user' => $user
                ]) ?>
                <?php \yii\widgets\Pjax::end() ?>
            </div>
        </div>
    </div>
</div>
