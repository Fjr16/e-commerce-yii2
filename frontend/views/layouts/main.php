<?php

/* @var $this \yii\web\View */

/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;
use backend\models\KategoriProduk;

$cartItemCount = $this->params['cartItemCount'];

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="shortcut icon" type="image/x-icon" href="<?= Url::toRoute(['assets/logoatlanta.jpg']) ?>" />
    <title>Atlanta Sport</title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand-lg navbar-light bg-light',
        ],
    ]);
    $menuItems = [
        [
            'label' => 'Keranjang <span id="cart-quantity" class="badge bg-dark text-white ms-1 rounded-pill">' . $cartItemCount . '</span>',
            'url' => ['/cart/index'],
            'encode' => false
        ],
    ];
    
    //belum selesai
    // $kategori = KategoriProduk::find()->all();
    // foreach($kategori as $tipe):
    //     $tipe['kategori'];
    // // $menuItems[] = [
    // //     'label' => 'Kategori',
    // //     'items' => [
    // //         [
    // //             'label' => $tipe['id'],
    // //             'url' => ['/profile/index'],
    // //         ],
    // //     ]
    // // ];
    // endforeach;

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Daftar', 'url' => ['/site/signup']];
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = [
            'label' => Yii::$app->user->identity->getDisplayName(),
            'items' => [
                [
                    'label' => 'Profile',
                    'url' => ['/profile/index'],
                ],
                [
                    'label' => 'Logout',
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'data-method' => 'post'
                    ],
                ]
            ]
        ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

        <header class="garis">
        </header>

    <div id="content wrapper" class="d-flex flex-column">
        <div id="content">
            <div class="p-4">
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

            <footer class="sticky-footer bg-dark">
                <div class="container my-auto">
                    <div class="row copyright">
                    &copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?>
                    </div>
                </div>
            </footer>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
