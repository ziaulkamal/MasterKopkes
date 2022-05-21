<div class="page-content">
       <div class="container-fluid">
           <div class="row">
               <div class="col-12">
                   <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                       <h4 class="mb-sm-0"><?= $title ?></h4>
                   </div>
               </div>
           </div>
           <div class="alert alert-warning alert-dismissible fade show">Fitur Ini Hanya Digunakan Saat Akhir Tahun</div>
           <?php echo $this->session->flashdata('message'); ?>

           <form class="custom-validation" action="<?= base_url($action_neraca) ?>"  method="post" enctype="multipart/form-data">
           <div class="row">
               <div class="col-6 lg-6">
                   <div class="card">
                     <div class="card-body">
                       <div class="row">
                         <div class="mb-3 col-xl-12">
                           <div>
                             <label class="form-label">Generate Data Neraca</label>
                             <select class="form-control" name="tahun" required>
                                 <option selected value="<?= date('Y') ?>">Tahun <?= date('Y') ?></option>
                             </select>
                           </div>
                         </div>
                       </div>
                         <div class="button-items">
                             <div class="d-grid">
                               <button type="submit" class="btn btn-primary btn-lg-12 ">Proses Neraca</button>
                                 </div>
                             </div>
                           </div>
                         </div>
                       </div>
                   </div>
                 </form>

               <form class="custom-validation" action="<?= base_url($action_jasa_usaha) ?>"  method="post" enctype="multipart/form-data">
               <div class="row">
                   <div class="col-6 lg-6">
                       <div class="card">
                         <div class="card-body">
                           <div class="row">
                             <div class="mb-3 col-xl-12">
                               <div>
                                 <label class="form-label">Generate Data Pembagian Jasa Usaha</label>
                                 <select class="form-control" name="tahun" required>
                                     <option selected value="<?= date('Y') ?>">Tahun <?= date('Y') ?></option>
                                 </select>
                               </div>
                             </div>
                           </div>
                             <div class="button-items">
                                 <div class="d-grid">
                                   <button type="submit" class="btn btn-info btn-lg-12 ">Proses Pembagian Jasa Usaha</button>
                                     </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                       </div>
                 </form>

               <form class="custom-validation" action="<?= base_url($action_jasa_simpanan) ?>"  method="post" enctype="multipart/form-data">
               <div class="row">
                   <div class="col-6 lg-6">
                       <div class="card">
                         <div class="card-body">
                           <div class="row">
                             <div class="mb-3 col-xl-12">
                               <div>
                                 <label class="form-label">Generate Data Pembagian Jasa Simpanan</label>
                                 <select class="form-control" name="tahun" required>
                                     <option selected value="<?= date('Y') ?>">Tahun <?= date('Y') ?></option>
                                 </select>
                               </div>
                             </div>
                           </div>
                             <div class="button-items">
                                 <div class="d-grid">
                                   <button type="submit" class="btn btn-dark btn-lg-12 ">Proses Jasa Simpanan</button>
                                     </div>
                                 </div>
                               </div>
                             </div>
                           </div>
                       </div>
                 </form>
                 </div>
               </div>
