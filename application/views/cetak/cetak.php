<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <!-- My Style -->
    <link rel="stylesheet" href="<?= base_url('assets');?>/css/style.css">
</head>
<body>
    <div class="main-content">
        <div class="invoice-container">
            <div class="top">
                <div class="top-left">
                    <h1 class="main">Invoice</h1>
                    <span class="code">No Rek. 2589</span>
                </div>
                <div class="top-right">
                    <div class="date">Tanggal:<?= $tanggal ?> </div>
                    <div class="date">ID Anggota: <?= $no_anggota ?> </div>
                </div>
            </div>
            <div class="bill-box">
                <div class="left">
                    <div class="text-m">KPRI Mandiri Syariah Abdya.</div>
                    <div class="addr">Jl. Krueng Beukah,
                    Komplek Masjid Baitul Ghaffur
                    Blangpidie, Aceh Barat Daya
                    KopkesMandiriSyariah@gmail.com</div>
                </div>
                <div class="right">
                    <div class="text-m">No. Transaksi:</div>
                    <div class="title">(LOG TRANSAKSI)</div>
                </div>
            </div>
            <div class="table-bill">
                <table class="table-service">
                    <thead>
                        <th class="quantity">Nama Anggota</th>
                        <th>Jenis Simpanan</th>
                        <th class="cost">Jumlah Simpanan</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $nama; ?></td>
                            <td>Simpanan Pokok</td>
                            <td class="cost">Rp. 4.000.000</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td class="name">Total</td>
                            <td colspan="2" class="number">Rp. 4.000.000</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="note">
                <p>© KPRI Kopkes Mandiri Syariah Abdya.</p>
            </div>
        </div>
    </div>
</body>
</html>
