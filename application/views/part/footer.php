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

<?php // IDEA: Dasar Assets ?>
<script src="<?= base_url(); ?>assets/libs/jquery/jquery.min.js"></script>
<script src="<?= base_url(); ?>assets/js/jquery.mask.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/metismenu/metisMenu.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/simplebar.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/node-waves/waves.min.js"></script>
<script src="<?= base_url(); ?>assets/js/app.js"></script>
<script src="<?= base_url(); ?>assets/libs/select2/js/select2.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/form-advanced.init.js"></script>
<?php // IDEA: End Dasar Assets ?>
<?php // IDEA: Penggunaan Assets DataTables ?>
<?php if ($js == 'dataTables') { ?>
<script src="<?= base_url(); ?>assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/jszip/jszip.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/pdfmake/build/vfs_fonts.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url(); ?>assets/js/pages/datatables.init.js"></script>
<?php }
// IDEA: End Penggunaan Assets DataTables
?>
<?php // IDEA: Penggunaan SweetAlert Pada tombol Hapus ?>
<script src="<?= base_url(); ?>assets/libs/sweetalert2/sweetalert2.all.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){

        // Format mata uang.
        $( '.uang' ).mask('000.000.000.000.000', {reverse: true});

    })
</script>
<script>

var flash = $('#flash').data('flash');
  if(flash) {
    swal.fire({
      icon: 'success',
      title: 'Success',
      text: flash
    })
  }

  $(document).on('click', '#btn-delete', function(e) {
    e.preventDefault();
    var link = $(this).attr('href');

    Swal.fire({
    title: 'Apakah Anda Yakin?',
    text: "Data Akan Dihapus!",
    icon: 'warning',
    showCancelButton: false,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, Konfirmasi Penghapusan !'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = link;
    }
    })
  })
</script>

</body>
</html>
