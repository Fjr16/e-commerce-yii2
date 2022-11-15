<?php
/**
 * User: TheCodeholic
 * Date: 12/12/2020
 * Time: 11:53 AM
 */
/** @var \common\models\Product $model */
?>
    <div class="card h-100">
        <a href="#" class="img-wrapper">
            <img class="card-img-top" src="<?php echo $model->getImageUrl() ?>" alt="">
        </a>
        <div class="card-body">
            <h5 class="fw-bolder"><?php echo \yii\helpers\StringHelper::truncateWords($model->name, 20) ?></h5>
            <h5>Rp. <?php echo $model->price?></h5>
            <div class='stokhabis'>
            <?php if($model->stok<=0): ?>
                <h5><?php echo $model->habis ?></h5><br>
            <?php endif ?>
            </div>
            <div class='stoktersedia'>
            <?php if($model->stok>0): ?>
                <h5>Stok: <?php echo $model->stok ?></h5><br>
            <?php endif ?>
            </div>
            
            <div class="card-text">
                <?php echo $model->getShortDescription() ?>
            </div>
        </div>

        <?php if($model->stok<=0):?>
            <div class="card-footer text-right">
            <a class="btn btn-secondary">
                Masukkan Keranjang
            </a>
        </div>
        <?php endif ?>

        <?php if($model->stok>0):?>
            <div class="card-footer text-right">
            <a href="<?php echo \yii\helpers\Url::to(['/cart/add']) ?>" class="btn btn-primary btn-add-to-cart">
                Masukkan Keranjang
            </a>
        </div>
        <?php endif ?>
    </div>
