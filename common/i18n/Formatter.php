<?php


namespace common\i18n;

/**
 * Class Formatter
 *
 * @author  Zura Sekhniashvili <zurasekhniashvili@gmail.com>
 * @package common\i18n
 */
class Formatter extends \yii\i18n\Formatter
{
    public function asOrderStatus($status)
    {
        if ($status == \common\models\Order::STATUS_COMPLETED) {
            return \yii\bootstrap4\Html::tag('span', 'Completed', ['class' => 'badge badge-success']);
        } else if ($status == \common\models\Order::STATUS_PAID) {
            return \yii\bootstrap4\Html::tag('span', 'Sudah Dibayar', ['class' => 'badge badge-primary']);
        } else if ($status == \common\models\Order::STATUS_DRAFT) {
            return \yii\bootstrap4\Html::tag('span', 'Belum Dibayar', ['class' => 'badge badge-danger']);
        } else {
            return \yii\bootstrap4\Html::tag('span', 'Dikirim', ['class' => 'badge badge-secondary']);
        }
    }
}