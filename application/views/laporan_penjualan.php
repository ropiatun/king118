<html>

<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse: collapse;
            table-layout: fixed;
            width: 630px;
        }

        table td {
            word-wrap: break-word;
            width: 17%;
            text-align: center;
        }
    </style>
</head>

<body>
    <p align="center"><b>mana aad</b></p><br /><br />

    <table border="1" align="center">
        <tr align="center">
            <th>Tanggal</th>
            <th>Invoice</th>
            <th>Pelanggan</th>
            <th>Layanan</th>
            <th>Kendaraan</th>
            <th>Karyawan</th>
            <th>Total Harga</th>
        </tr>

        <?php
        $no = 1;
        foreach ($penjualan as $l) {
            echo "<tr>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "<td>" . $l->tanggal . "</td>";
            echo "</tr>";
        }
        ?>

    </table>
</body>

</html>