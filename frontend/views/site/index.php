<?php

/* @var $this yii\web\View */
/** @var \yii\data\ActiveDataProvider $dataProvider */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="py-5">
        <div class="container px-4 px-lg-5 mt-5">

                <?php echo \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '<div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">{items}</div>{pager}',
                    'itemView' => '_product_item',
                    'itemOptions' => [
                        'class' => 'product-item'
                    ],
                    'pager' => [
                        'class' => \yii\bootstrap4\LinkPager::class
                    ]
                ]) ?>
        </div>
    </div>
</div>
