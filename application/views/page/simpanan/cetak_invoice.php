<div class="page-content">
       <div class="container-fluid">
             <div class="card">
               <div class="card-body">
               <h6 class="card-title">Cetak Invoice</h6>
               <br>
               <button type="button" value='Print Content' onclick='myApp.printDiv()' class="btn btn-primary waves-effect waves-light">Print Slip Validasi</button>
                 <div class="row">
                   <div class="col-12 lg-12">
                       <form class="back" id='parent' >
                       <div class="container">
                         <div class="row">
                           <div class="col-xs-12">
                             <div class="invoice-wrapper">
                               <div class="invoice-top">
                                 <div class="row">
                                   <div class="col-sm-6">
                                     <div class="invoice-top-left">
                                       <h2 class="client-company-name">KPRI Mandiri Syariah Abdya.</h2> <br>
                                       <h6 class="client-address">Jl. Krueng Beukah,<br>Komplek Masjid Baitul Ghaffur<br>Blangpidie, Aceh Barat Daya<br>KopkesMandiriSyariah@gmail.com</h6>
                                     </div>
                                   </div>
                                   <div class="col-sm-6">
                                     <div class="invoice-top-right">
                                       <!-- <div class="logo-wrapper">
                                         <img src="" class="img-responsive pull-right logo" />
                                       </div> -->
                                       <h6>Tanggal Hari Ini: <?= $tanggal  ?> <br>ID Nasabah: <?= $no_anggota  ?></h6>
                                     </div>
                                   </div>
                                 </div>
                               </div>
                               <div class="invoice-bottom">
                                 <div class="row">
                                   <div class="col-xs-12">
                                     <h2 class="title">Slip Validasi</h2>
                                   </div>
                                   <div class="clearfix"></div>

                                   <div class="col-sm-3 col-md-3">
                                     <div class="invoice-bottom-left">
                                       <h5>No. Transaksi</h5>
                                       <h6><?= $invoice_no ?></h6>
                                     </div>
                                   </div>
                                   <div class="col-md-offset-1 col-md-9 col-sm-9">
                                     <div class="invoice-bottom-right">
                                       <table class="table">
                                         <thead>
                                           <tr>
                                             <th>Nama Nasabah</th>
                                             <th>Jenis Simpanan</th>
                                             <th>Jumlah Simpanan</th>
                                           </tr>
                                         </thead>
                                         <tbody>
                                           <tr>
                                             <td><?= $nama ?></td>
                                             <td></td>
                                             <td><?= $jml_simpan ?></td>
                                           </tr>
                                           <tr style="height: 40px;"></tr>
                                         </tbody>
                                         <thead>
                                           <tr>
                                             <td>Biaya Admin</td>
                                             <td></td>
                                             <td>IDR 0,00</td>
                                           </tr>
                                           <tr>
                                             <th>Total</th>
                                             <th></th>
                                             <th><?= $jml_simpan ?></th>
                                           </tr>
                                         </thead>
                                       </table>
                                     </div>
                                   </div>
                                   <div class="clearfix"></div>
                                   <div class="col-xs-12">
                                     <hr class="divider">
                                   </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                         </div>
                       </div>
                 </form>
                 </div>
               </div>
               </div>
               </div>
