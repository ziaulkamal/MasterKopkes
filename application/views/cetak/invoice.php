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
    <link rel="stylesheet" href="<?= base_url('assets/invoice/style.css');?>">
</head>
<body>
    <div class="main-content">
        <div class="invoice-container">
            <div class="top">
                <div class="top-left">
                    <h1 class="main">Invoice</h1>
                    <span class="code">No Rekening. <b><?= $no_rekening ?></b></span>
                </div>
                <div class="top-right">
                    <div class="date">Tanggal:<?= $last_update ?> </div>
                </div>
            </div>
            <div class="bill-box">
                <div class="left">
                    <div class="text-m">KPRI Mandiri Syariah Abdya.</div>
                    <div class="addr">Jalan. Bukit Hijau, Kedai Paya, <br>Kec. Blang Pidie, Aceh Barat Daya</div>
                </div>
                <div class="right">
                    <div class="text-m">No. Transaksi:</div>
                    <div class="title"><?= $kode_log ?></div>
                </div>
            </div>
            <div class="table-bill">
                <table class="table-service">
                    <thead>
                        <th class="quantity">Nama Anggota</th>
                        <th><?php if ($kode_jenis == 1) {
                          echo "Jenis Simpanan";
                        }elseif ($kode_jenis == 2) {
                          echo "Angsuran";
                        }elseif ($kode_jenis == 3) {
                          echo "Pinjaman";
                        } ?></th>
                        <th class="cost">Jumlah</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= ucwords($nama_anggota); ?></td>
                            <td>Simpanan Pokok</td>
                            <td class="cost"><?= $jumlah ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td class="name">Total</td>
                            <td colspan="2" class="number"><?= $jumlah ?></td>
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
