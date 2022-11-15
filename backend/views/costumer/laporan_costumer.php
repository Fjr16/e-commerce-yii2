<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pelanggan</title>
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
    </style>
</head>
<body>	
    <div class="page">	
        <h1>Laporan Data Pelanggan</h1>
        <table border="0">
        <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Username</th>
        </tr>
        <?php
        $no = 1;
        foreach($dataProvider->getModels() as $pel){ 
        ?>
        <tr>
                <td><?= $no++ ?></td>
                <td><?= $pel->nama ?></td>
                <td><?= $pel->alamat ?></td>
                <td><?= $pel->telp ?></td>
                <td><?= $pel->user->username ?></td>
        </tr>
        <?php
        }
        ?>
        </table>
    </div>   
</body>
</html>