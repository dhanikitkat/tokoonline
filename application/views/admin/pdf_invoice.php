<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF Invoice</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: center;
            border: 1px solid black;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>

</head>

<body>
    <table>
        <tr>
            <th>No</th>
            <th>Nama Pemesan</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Kurir</th>
            <th>Metode Pembayaran</th>
            <th>Tanggal Pemesanan</th>
            <th>Batas Pembayaran</th>
        </tr>

        <?php $no = 1;
        foreach ($invoice as $inv) : ?>
            <tr>
                <td><?php echo $no++ ?></td>
                <td><?php echo $inv->nama ?></td>
                <td><?php echo $inv->alamat ?></td>
                <td><?php echo $inv->no_telp ?></td>
                <td><?php echo $inv->kurir ?></td>
                <td><?php echo $inv->metode_pembayaran ?></td>
                <td><?php echo $inv->tgl_pesan ?></td>
                <td><?php echo $inv->batas_bayar ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>