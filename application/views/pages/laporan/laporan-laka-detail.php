<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title_pdf; ?></title>
    <style>
        /** Define the margins of your page **/
        @page {
            margin: 0cm 0cm;
        }

        body {
            font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
            margin-top: 3cm;
            margin-left: 2cm;
            margin-right: 2cm;
            margin-bottom: 2cm;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            text-transform: uppercase;
            letter-spacing: 2px;
            margin: 0px;
            padding: 0px;
        }

        /** Define the header rules **/
        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            color: #0f172a;
            text-align: center;
            line-height: 1.5cm;
        }

        /** Define the footer rules **/
        footer {
            position: fixed;
            bottom: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;

            /** Extra personal styles **/
            color: #ddd;
            text-align: center;
            line-height: 1.5cm;
        }

        #table {
            width: 100%;
            border-collapse: collapse;
        }

        #table td,
        #table th {
            border: 1px solid #6b7280;
            padding: 8px;
            font-size: 10px;
        }

        #table tr:nth-child(even) {
            background-color: #f3f4f6;
        }

        #table tr:hover {
            background-color: #d1d5db;
        }

        #table th {
            padding-top: 10px;
            padding-bottom: 10px;
            text-align: center;
            background-color: #111827;
            color: #fff;
            text-transform: uppercase;
        }
    </style>
</head>

<body>
    <!-- Define header and footer blocks before your content -->
    <header>
        <h3 style="padding:0px;margin:0px;"><?= $title_pdf . ' ' . $item2['id_laka']; ?></h3>
        <!-- Laporan Data Keseluruhan Kecelakaan / Insiden -->
    </header>

    <footer>
        Copyright <?= APP_NAME; ?> &copy; <?php echo date("Y"); ?>
    </footer>

    <!-- Wrap the content of your PDF inside a main tag -->
    <main>
        <div>
            <br>
            <table id="table">
                <tr>
                    <th>Lokasi</th>
                    <td colspan="3">
                        <div>
                            <?= $item2['nm_lokasi']; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Alamat</th>
                    <td colspan="3">
                        <div>
                            <?= $item2['alamat_lokasi']; ?>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th>Korban</th>
                    <td>Meninggal : <?= $item2['korban_mati']; ?></td>
                    <td>Luka : <?= $item2['korban_luka']; ?></td>
                    <td>Total : <?= $item2['korban_total']; ?></td>
                </tr>
            </table>
        </div>
        <br>
        <h4 style="text-align:center;margin-bottom:20px;"> DATA KORBAN </h4>
        <table id="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Jenis Luka</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($getKorban == 0) { ?>
                    <tr>
                        <td colspan="5" style="text-align:center;"> DATA TIDAK ADA</td>
                    </tr>
                <?php } else { ?>
                    <?php $i = 0; ?>
                    <?php foreach ($item as $x) : ?>
                        <?php $i++; ?>
                        <tr>
                            <td width="5%"><?= $i; ?></td>
                            <td><?= $x['nama']; ?></td>
                            <td><?= $x['umur']; ?></td>
                            <td><?= ($x['jenis_kelamin'] == 1) ? 'Laki Laki' : 'Perempuan'; ?></td>
                            <td><?= ($x['kondisi'] == 1) ? 'Korban Luka' : 'Korban Meninggal'; ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php } ?>


            </tbody>
        </table>
        <!-- <p style="page-break-after: never;">
            Content Page 2
        </p> -->
    </main>
</body>

</html>