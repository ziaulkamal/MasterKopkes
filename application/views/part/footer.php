<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © KPRI Kopkes Mandiri Syariah Abdya.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Developer <i class="mdi mdi-heart text-danger"></i> by <a href="//mindkreativ.com" target="_blank">Mind Kreativ</a>
                </div>
            </div>
        </div>
    </div>
</footer>

</div>
</div>
<script src="<?=base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?=base_url(); ?>assets/js/app.js"></script>
<?php
if ($js == 'anggota' || $js == 'instansi') {?>
<script src="<?=base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?=base_url(); ?>assets/js/pages/datatables.init.js"></script>
<script src="<?=base_url(); ?>assets/libs/table-edits/build/table-edits.min.js"></script>
<script src="<?=base_url(); ?>assets/js/pages/table-editable.init.js"></script>
  <?php }
// elseif ($js == 'transaksi') {
//   // code...
// }
//    ?>

</body>
</html>
