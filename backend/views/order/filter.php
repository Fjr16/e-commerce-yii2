<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\assets\AppAsset;

AppAsset::register($this);

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CostumerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<?php if(Yii::$app->user->identity->level == 'Owner') :?>
    
    <div style="padding: 10px 30px;">
        <h1>Laporan Pada</h1>
        <hr />

        <?php $form = ActiveForm::begin() ?>
        <div class="row">
            <div class="col-2">
                <div class="form-group">
                    <!-- <label>Bulan</label>
                    <input type="text" id="bulan" class="form-control datetimepicker-input"
                        data-toggle="datetimepicker" data-target="#bulan" autocomplete="off" /> -->
                        <?= $form->field($model, "bln")->textInput(['data-toggle'=>'datetimepicker', 'data-target'=>'#filtermodel-bln']) ?>
                </div>
            </div>
            
        
            <div class="col-2">
                <div class="form-group">
                    <!-- <label>Tahun</label>
                    <input type="text" id="tahun" class="form-control datetimepicker-input"
                        data-toggle="datetimepicker" data-target="#tahun" autocomplete="off" /> -->
                        <?= $form->field($model, "thn")->textInput(['data-toggle'=>'datetimepicker', 'data-target'=>'#filtermodel-thn']) ?>
                </div>
            </div>
        </div>
        <div class="form-group">
                <?= Html::submitButton('Cetak', ['class' => 'btn btn-primary']) ?>
            </div>
        <?php ActiveForm::end(); ?>
    </div>

<?php endif; ?>

