<?php

use yii\helpers\Html;
use common\models\OrderAddress;
use common\models\OrderItem;
// use common\models\Order;
use yii\helpers\Url;

?>

<?php if (Yii::$app->user->identity->level == 'Karyawan') :?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Transaksi</title>

    <style>
        .page
        {           
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse; 
            width:100%;
        }

        table td, table th
        {
            border: 1px solid #ccc;
        }
		
		table th
        {
            background-color:red;
        }
        table tr td img{
            width: 200px; display: block; margin:0;
        }
    </style>
</head>
<body>	
    <div class="page">	
        <h1>Laporan Data Transaksi</h1>
        <table border="0">
        <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Ongkir</th>
                <th>Total Harga</th>
                <th>Bukti Transfer</th>
                <th>Alamat Pengiriman</th>
                <th>Status</th>
        </tr>
        <?php
        $no= 1;
        
        foreach($dataProvider->getModels() as $tran){ 
        ?>
        
        <?php $almt = OrderAddress::find()
                ->alias('oa')
                ->andWhere(['oa.order_id'=> $tran->id])
                ->all();
             
            $brg = OrderItem::find()
                ->alias('oi')
                ->Where(['oi.order_id' => $tran->id])
                ->all();

                // echo '<pre>';
                // print_r($almt);
                // die();
        ?>
        
        <tr>
                <td><?= $no++ ?></td>
                
                <td><?= $tran->createdBy->getDisplayName() ?></td>
                <td><?php 
                // $no = 0;
                for($i=0; $i < count($brg); $i++){
                    // $no++;
                    echo ($brg[$i]['product_name']. "<br><br>");
                    
                } ?></td>
                
                <td><?php
                for($i=0; $i < count($brg); $i++){
                    echo($brg[$i]['quantity']."<br><br>");
                }
                 ?></td>
                <td><?php
                 for($i=0; $i < count($brg); $i++){
                    echo($brg[$i]['unit_price']."<br><br>");
                 }
                 ?></td>
                <td><?= $tran->total_ongkir ?></td>
                <td><?= $tran->total_price ?></td>
                <td><img src="storage<?= $tran->bukti?>" style = "width: 200px; display: block; margin:0;"></td>
                <td><p><?php
                for($i=0; $i < count($almt); $i++){
                    echo("".$almt[$i]['address']. " ".$almt[$i]['city']. ", ".$almt[$i]['state']. "<br> ".$almt[$i]['country']. "<br> Kode Pos: ".$almt[$i]['zipcode']);
                }
                ?></p></td>
                 <td>
                        <?php
                                        if($tran->status == 0){
                                            $sts = "Belum Bayar";
                                        }else if($tran->status == 1){
                                            $sts = "Sudah Bayar";
                                        }else if($tran->status == 2){
                                            $sts = "Dikirim";
                                        }else if($tran->status == 10){
                                            $sts = "Complete";
                                        }
                                    ?>
                        <?= $sts ?>
                    </td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>
<?php endif; ?>

<?php if(Yii::$app->user->identity->level == 'Owner') :?>
<!DOCTYPE html>
<html>
<head>
    <title>Laporan Perbulan</title>
    <style>
        .page
        {           
            padding:2cm;
        }
        table
        {
            border-spacing:0;
            border-collapse: collapse; 
            width:100%;
        }

        table td, table th
        {
            border: 1px solid #ccc;
        }
		
		table th
        {
            background-color:red;
        }
        img{
            width: 200px; display: block; margin:0;
        }
    </style>
</head>
<body>	
    <div class="page">	
        <h1>Laporan Perbulan</h1>
        <table border="0">
        <tr>
                <th>No</th>
                <th>Nama Pelanggan</th>
                <th>Nama Barang</th>
                <th>Jumlah</th>
                <th>Harga Satuan</th>
                <th>Ongkir</th>
                <th>Total Harga</th>
                <th>Bukti Transfer</th>
                <th>Alamat Pengiriman</th>
                <th>Status</th>
                <th>Tanggal</th>
        </tr>
        
        <?php

        
        $b = $post["FilterModel"]["bln"];
        $t = $post["FilterModel"]["thn"];
        $no= 1;
        foreach($dataProvider->getModels() as $tran){       
        ?>

            <?php if($tran->status == 1 || $tran->status == 2 || $tran->status == 10) {

                $bln = date("m", $tran->created_at);
                $thn = date("Y", $tran->created_at);
                
                if($b == $bln && $t == $thn){
            
                $almt = OrderAddress::find()
                        ->alias('oa')
                        ->Where(['oa.order_id'=> $tran->id])
                        ->all();
                    
                $brg = OrderItem::find()
                        ->alias('oi')
                        ->Where(['oi.order_id' => $tran->id])
                        ->all();

                $tgl = date("d-m-Y H:i:s", $tran->created_at);

                // $gbr = Order::find()
                //         ->alias('o')
                //         ->select('bukti')
                //         ->where(['o.id'=> $tran->id])
                //         ->all();
                
                // $b = date("Y-m-d H:i:s", $tran->created_at);

                // echo '<pre>';
                // print_r($b);
                // die();
                // echo '<pre>'; print_r($gbr);die();
            ?>

                <tr>
                    <td><?= $no++ ?></td>

                    <td><?= $tran->createdBy->getDisplayName() ?></td>
                    <td><?php 
                                // $no = 0;
                                for($i=0; $i < count($brg); $i++){
                                    // $no++;
                                    echo ($brg[$i]['product_name']. "<br><br>");
                                    
                                } ?></td>

                    <td><?php
                                for($i=0; $i < count($brg); $i++){
                                    echo($brg[$i]['quantity']."<br><br>");
                                }
                                ?></td>
                    <td><?php
                                for($i=0; $i < count($brg); $i++){
                                    echo($brg[$i]['unit_price']."<br><br>");
                                }
                                ?></td>
                    <td><?= $tran->total_ongkir ?></td>
                    <td><?= $tran->total_price ?></td>

                    <!-- <td><img src="storage\buktitf\1c-JYlGgugBgryWIafg5ui3__7IDcefb\pexels-daria-shevtsova-1078058.jpg"></td> -->
                    <td><img src="storage\<?= $tran->bukti?>"></td>

                    <td>
                        <p><?php
                                for($i=0; $i < count($almt); $i++){
                                    echo("".$almt[$i]['address']. " ".$almt[$i]['city']. ", ".$almt[$i]['state']. "<br> ".$almt[$i]['country']. "<br> Kode Pos: ".$almt[$i]['zipcode']);
                                }
                                ?></p>
                    </td>

                    <td>
                        <?php
                                        if($tran->status == 0){
                                            $sts = "Belum Bayar";
                                        }else if($tran->status == 1){
                                            $sts = "Sudah Bayar";
                                        }else if($tran->status == 2){
                                            $sts = "Dikirim";
                                        }else if($tran->status == 10){
                                            $sts = "Complete";
                                        }
                                    ?>
                        <?= $sts ?>
                    </td>
                    <td><?= $tgl ?></td>
                    <?php $total_pemasukan[] = $tran->total_price ?>
                </tr>

            <?php
                }
            }
        }
        ?>

        <?php if($total_pemasukan != null) : ?>
                <tr>

                    <td></td>
                    <td><b>Total Pendapatan</b></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                        <?php $laba = array_sum($total_pemasukan); ?>
                            <b>
                                <?=$laba?>
                            </b> 
                    </td>
                </tr>
        <?php endif ?>
        </table>
        
    </div> 
</body>
</html>
<?php endif; ?>