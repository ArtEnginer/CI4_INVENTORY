<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,700" rel="stylesheet">
    <style>
        body {
            margin: 0;
            font-family: "Source Sans Pro", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
            font-size: 1rem;
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #ffffff;
        }

        table {
            font-size: 0.85rem;
            font-weight: inherit;
            line-height: 1;
            margin: 10px 0px 10px 0px;
            border-collapse: collapse;
        }

        h2 {
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            margin: 5px;
        }

        h3 {
            font-size: 1.25rem;
            font-weight: 700;
            line-height: 1;
            margin: 5px;
        }

        p {
            font-size: 0.75rem;
            font-weight: 400;
            line-height: 1;
            margin: 5px;
        }
    </style>

    <?php
    //    var to get date time now
    $date = date('Y-m-d');
    $time = date('H:i:s');
    $date_time = $date . ' ' . $time;



    ?>
</head>

<body>
    <div class="form-group" style="text-align: center;">
        <h2><?= $web['nm_web'] ?></h2>
        <p><?= $web['alamat'] ?></p>
        <p>Telepon : <?= $web['telp'] ?>, Email : <?= $web['email'] ?></p>
        <hr />
    </div>

    <!-- get sesion user admin-->
    <div class="">
        <table>
            <tr>
                <td>Di Cetak Oleh</td>
                <td>:</td>
                <td><?php
                    $exp = explode(" ", session()->get('name'));
                    echo $exp[0];
                    ?></td>

                    <td width="200px"></td>
                    <td>Periode</td>
                    <td>:</td>
                    <td><?= $tanggal_awal  ?> - <?= $tanggal_akhir ?></td>
            </tr>
    
            <tr>
                <td>Pada</td>
                <td>:</td>
                <td><?php echo date('l, d F Y'); ?></td>
            </tr>
        </table>

       
    </div>

    <div class="form-group">
        <h3 style="text-align: center;"><?= $title ?></h3>
    </div><br />

    <table id="dataTable1" width="100%" border="1">
        <thead align="center">
            <tr>
                <td style="width: 70px;">No.</td>
                <td style="width: 100px;">ID</td>
                <td style="width: 200px;">Nama Barang</td>           

                <td style="width: 120px;">Tanggal Keluar</td>
                <td>Keterangan</td>


            </tr>
        </thead>
        <tbody>
            <?php $i = 1 + ($count * ($currentPage - 1));
            foreach ($keluar as $data) : ?>
                <tr align="center">
                    <td><?= $i++ ?></td>
                    <td><?= $data[] = $data['id_keluar'] ?></td>
                    <td><?php  $da = $keluarDetail->detail($data['id_keluar']);
                    echo $da[0]['nm_barang']; ?></td>
                    ) ?></td>
                    
                    <td><?= $data[] = $data['tanggal'] ?></td>
                    <td align="left"><?= nl2br($data[] = $data['keterangan']) ?></td>

                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>


</body>

</html>