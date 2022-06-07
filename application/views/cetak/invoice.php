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

  <?php if ($set == 'simpanan') { ?>
    <div class="main-content">
        <div class="invoice-container" id="printOut">
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
                            <td><?= $jenis ?></td>
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
            </div><center><button onclick="printDiv()" class="button" title="Cetak Pdf">Cetak Validasi</button></center>

        </div>
    </div>

  <?php }elseif ($set == 'angsuran') { ?>
    <div class="main-content">
        <div class="invoice-container" id="printAngsuran">
            <div class="top">
                <div class="top-left">
                    <h1 class="main">Invoice</h1>
                    <span class="code">No Pinjaman. <b><?= $pinjaman ?></b></span>
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
                    <div class="title"><?= substr($kode,2) ?></div>
                </div>
            </div>
            <div class="table-bill">
                <table class="table-service">
                    <thead>
                        <th class="quantity">Nama Anggota</th>
                        <th>Angsuran Ke</th>
                        <th class="cost">Angsuran Pokok</th>
                        <th class="cost">Margin</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= ucwords($nama_anggota); ?></td>
                            <td><?= $angsuran_ke ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($pokok) ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($margin) ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td class="name">Total</td>
                            <td colspan="3" class="number"><?= $this->conv->convRupiah($pokok+$margin) ?></td>
                        </tr>
                        <tr class="keterangan">
                            <td class="name">Keterangan</td>
                            <td colspan="3"><?= $keterangan ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="note">
                <p>© KPRI Kopkes Mandiri Syariah Abdya.</p>

          </div><center><button onclick="angsuranPdf()" class="button" title="Cetak Pdf">Cetak Validasi</button></center>
    </div>

  <?php }elseif ($set == 'pinjaman') { ?>
    <div class="main-content">
        <div class="invoice-container" id="pinjamanAnggota">
            <div class="top">
                <div class="top-left">
                    <h1 class="main">Invoice</h1>
                    <span class="code">No Pinjaman. <b><?= $pinjaman ?></b></span>
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
                    <div class="title"><?= substr($pinjaman,2) ?></div>
                </div>
            </div>
            <div class="table-bill">
                <table class="table-service">
                    <thead>
                        <th>Nama Anggota</th>
                        <th class="cost">Plafon Pinjaman</th>
                        <th class="cost">Angsuran Pokok</th>
                        <th class="cost">Margin</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?= ucwords($nama_anggota); ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($plafon) ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($pokok) ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($margin) ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td class="name">Total</td>
                            <td colspan="3" class="number"><?= $this->conv->convRupiah($plafon-$gotong_royong) ?></td>
                        </tr>
                        <tr class="keterangan">
                            <td class="name">Keterangan :</td>
                            <td colspan="3"><?= 'Nilai Yang diterima setelah di kurangi dengan Dana Gotong Royong sebesar 1,5% dari nilai Plafon pinjaman sebesar '.$this->conv->convRupiah($gotong_royong) ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="note">
                <p>© KPRI Kopkes Mandiri Syariah Abdya.</p>
          </div><center><button onclick="pinjaman()" class="button" title="Cetak Pdf">Cetak Validasi</button></center>
    </div>

  <?php }else {?>
    <div class="main-content">
        <div class="invoice-container" id="anggotaKeluar">
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
                    <div class="title"><?= time(); ?></div>
                </div>
            </div>
            <div class="table-bill">
                <table class="table-service">
                    <thead>
                        <th>Nama Anggota</th>
                        <th class="cost">Simpanan Pokok</th>
                        <th class="cost">Simpanan Wajib</th>
                        <th class="cost">Simpanan Khusus</th>
                        <th class="cost">Simpanan Lain</th>

                    </thead>
                    <tbody>
                        <tr>
                            <td><?= ucwords($nama_anggota); ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($pokok) ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($wajib) ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($khusus) ?></td>
                            <td class="cost"><?= $this->conv->convRupiah($lain) ?></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="total">
                            <td class="name">Total</td>
                            <td colspan="4" class="number"><?= $this->conv->convRupiah($pokok+$wajib+$khusus+$lain) ?></td>
                        </tr>
                        <tr class="keterangan">
                            <td class="name"><b>Keterangan :</b></td>
                            <td colspan="3">Cetak validasi sebagai pembuktian asli</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="note">
                <p>© KPRI Kopkes Mandiri Syariah Abdya.</p>
          </div><center><button onclick="anggotaKeluar()" class="button" title="Cetak Pdf">Cetak Validasi</button></center>
    </div>

  <?php } ?>
</body>
<script>
<?php if ($set == 'anggotaKeluar') {?>
  function anggotaKeluar() {
      var divContents = document.getElementById("anggotaKeluar").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write('<title>Pengembalian Simpanan <?= $nama_anggota .' (Keluar) ' . $last_update ?></title>');
      a.document.write('<body> ');
      a.document.write('System Validasi: © KPRI Kopkes Mandiri Syariah Abdya.');
      a.document.write('<h3>No Rekening: <?= $no_rekening ?></h3>');
      a.document.write('<p><b>Nama Anggota : </b><?= $nama_anggota ?></p>');
      a.document.write('<hr />');
      a.document.write('<h4><b>Total Pengembalian Dana Simpanan : </b><?= $this->conv->convRupiah($pokok+$wajib+$khusus+$lain) ?></h4>');
      a.document.write('<p><b>Keterangan : </b>Anggota ini sudah dikeluarkan dari sistem dan dana tersebut harus di kembalikan ke anggota yang sudah keluar</p>');
      a.document.write('<p><b>Tanggal Validasi : </b><?= $last_update ?></p>');
      a.document.write('</body></html>');
      a.document.close();
      a.print();
  }
<?php } ?>
<?php if ($set == 'simpanan') { ?>
  function printDiv() {
      var divContents = document.getElementById("printOut").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write('<title>Simpanan <?= $nama_anggota .'-'. $kode_log . '-' . $last_update ?></title>');
      a.document.write('<body> ');
      a.document.write('System Validasi: © KPRI Kopkes Mandiri Syariah Abdya.');
      a.document.write('<h3>No Rekening: <?= $no_rekening ?></h3>');
      a.document.write('<p><b>Nama Anggota : </b><?= $nama_anggota ?></p>');
      a.document.write('<p><b>Jenis : </b><?= $jenis ?></p>');
      a.document.write('<hr />');
      a.document.write('<h4><b>Total Setoran : </b><?= $jumlah ?></h4>');
      a.document.write('<p><b>Tanggal Validasi : </b><?= $last_update ?></p>');
      a.document.write('</body></html>');
      a.document.close();
      a.print();
  }
<?php } ?>

<?php if ($set == 'angsuran') {?>
  function angsuranPdf() {
    var divContents = document.getElementById("printAngsuran").innerHTML;
    var a = window.open('', '', 'height=500, width=500');
    a.document.write('<html>');
    a.document.write('<title>Angsuran <?= $nama_anggota .'-'. substr($kode,2) . ' [ ' . $last_update . ' ] '?></title>');
    a.document.write('<body>');
    a.document.write('System Validasi: © KPRI Kopkes Mandiri Syariah Abdya.');
    a.document.write('<h3>Kode Pinjaman: <?= $pinjaman ?></h3>');
    a.document.write('<hr />');
    a.document.write('<p><b>Nama Anggota : </b><?= $nama_anggota ?></p>');
    a.document.write('<p><b>Angsuran Ke : </b><?= $angsuran_ke ?></p>');
    a.document.write('<p><b>Pokok Bulanan : </b><?= $this->conv->convRupiah($pokok) ?></p>');
    a.document.write('<p><b>Margin Bulanan : </b><?= $this->conv->convRupiah($margin) ?></p>');
    a.document.write('<hr />');
    a.document.write('<h4><b>Total Bayar : </b><?= $this->conv->convRupiah($pokok+$margin) ?></h4>');
    a.document.write('<p><b>Keterangan : </b><?= $keterangan ?></p>');
    a.document.write('<p><b>Tanggal Validasi : </b><?= $last_update ?></p>');
    a.document.write('</body></html>');
    a.document.close();
    a.print();
  }
<?php } ?>

<?php if ($set == 'pinjaman') { ?>
  function pinjaman() {
      var divContents = document.getElementById("pinjamanAnggota").innerHTML;
      var a = window.open('', '', 'height=500, width=500');
      a.document.write('<html>');
      a.document.write('<title>Pinjaman <?= $nama_anggota .'-'. substr($pinjaman,2) . ' [ ' . $last_update . ' ] '?></title>');
      a.document.write('<body>');
      a.document.write('System Validasi: © KPRI Kopkes Mandiri Syariah Abdya.');
      a.document.write('<h3>Kode Pinjaman: <?= $pinjaman ?></h3>');
      a.document.write('<hr />');
      a.document.write('<p><b>Nama Anggota : </b><?= $nama_anggota ?></p>');
      a.document.write('<p><b>Plafon Pinjaman : </b><?= $this->conv->convRupiah($plafon) ?></p>');
      a.document.write('<p><b>Dana Gotong Royong (1.5%) : </b><?= $this->conv->convRupiah($gotong_royong) ?></p>');
      a.document.write('<p><b>Pokok Bulanan : </b><?= $this->conv->convRupiah($pokok) ?></p>');
      a.document.write('<p><b>Margin Bulanan : </b><?= $this->conv->convRupiah($margin) ?></p>');
      a.document.write('<hr />');
      a.document.write('<h4><b>Total Diterima : </b><?= $this->conv->convRupiah($plafon-$gotong_royong) ?></h4>');
      a.document.write('<p><b>Keterangan : </b><?= 'Nilai Yang diterima setelah di kurangi dengan Dana Gotong Royong sebesar 1,5% dari nilai Plafon pinjaman sebesar '.$this->conv->convRupiah($gotong_royong) ?></p>');
      a.document.write('<p><b>Tanggal Validasi : </b><?= $last_update ?></p>');
      a.document.write('</body></html>');
      a.document.close();
      a.print();
  }
<?php } ?>

</script>
</html>
