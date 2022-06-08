<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
              <li>
                <a href="<?= base_url('dashboard'); ?>" class="waves-effect">
                  <i class="mdi mdi-home-variant-outline"></i>
                  <span>Dashboard</span>

                </a>
              </li>
              <li class="menu-title">Manejemen Dasar</li>
              <?php
              if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2 ) { ?>
                <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-circle-outline"></i>
                    <span>Anggota</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                    <li><a href="<?=base_url('anggota'); ?>">Data Anggota</a></li>
                    <?php if ($this->session->userdata('id_lvl') == 1 ) { ?>
                      <li><a href="<?=base_url('daftar'); ?>">Tambah Anggota Baru</a></li>
                    <?php } ?>
                    <li><a href="<?=base_url('anggota_keluar'); ?>">Anggota Yang Keluar</a></li>
                  </ul>
                </li>

              <?php }
              ?>
              <?php if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2) { ?>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-office-building-outline"></i>
                        <span>Instansi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url('instansi'); ?>"> Data Instansi</a></li>
                      <?php if ($this->session->userdata('id_lvl') == 1 ) {?>
                        <li><a href="<?=base_url('tambah_instansi'); ?>"> Tambah Instansi Baru</a></li>
                      <?php } ?>
                    </ul>
                </li>
              <?php } ?>


                <?php if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2) {?>
                  <li>
                      <a href="javascript: void(0);" class="has-arrow waves-effect">
                          <i class="mdi mdi-safe"></i>
                          <span>Simpanan</span>
                      </a>
                      <ul class="sub-menu" aria-expanded="false">
                          <li><a href="<?=base_url('cari_simpanan'); ?>">Cari ID Anggota</a></li>
                          <li><a href="<?=base_url('simpanan'); ?>">Data Simpanan Anggota</a></li>
                      </ul>
                  </li>
                <?php } ?>

                <?php if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2) { ?>
                  <li>
                      <a href="<?=base_url('pinjaman'); ?>" class="waves-effect">
                          <i class="mdi mdi-safe"></i>
                          <span>Pinjaman</span>
                      </a>

                  </li>
                <?php } ?>

                <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                  <li>
                    <a href="<?=base_url('operasional/cash_out'); ?>" class="waves-effect">
                      <i class="mdi mdi-page-layout-header"></i>
                      <span>Operasional</span>
                    </a>
                  </li>
                <?php } ?>
                <?php if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2) { ?>

                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="mdi mdi-page-layout-header"></i>
                      <span>Kelola Inventaris</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url('list_inventaris'); ?>">Data Inventaris</a></li>
                      <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                        <li><a href="<?=base_url('add_inventaris'); ?>">Tambah Inventaris</a></li>
                      <?php } ?>
                    </ul>
                  </li>
                <?php } ?>
                <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="mdi mdi-page-layout-header"></i>
                      <span>Pengelolaan Dana </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url('kelola_dana/pengurus'); ?>">Update Dana Pengurus</a></li>
                      <li><a href="<?=base_url('kelola_dana/pendidikan'); ?>">Update Dana Pendidikan</a></li>
                      <li><a href="<?=base_url('kelola_dana/kes_pegawai'); ?>">Update Dana Kesejahteraan Pegawai</a></li>
                      <li><a href="<?=base_url('kelola_dana/sosial'); ?>">Update Dana Sosial</a></li>
                      <li><a href="<?=base_url('kelola_dana/audit'); ?>">Update Dana Audit</a></li>
                      <li><a href="<?=base_url('kelola_dana/pembangunan'); ?>">Update Dana Pembangunan Kerja</a></li>

                    </ul>
                  </li>
                <?php } ?>
                <?php if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2) { ?>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="mdi mdi-account-circle-outline"></i>
                      <span>Angsuran</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?= base_url('angsuran') ?>">Data Angsuran Terakhir</a></li>
                      <li><a href="<?= base_url('angsuran_tertunda') ?>">Cek Angsuran Tertunda</a></li>
                    </ul>
                  </li>
                <?php } ?>


                <?php if (date('m') == 12) {
                  if ($this->session->userdata('id_lvl') == 1 || $this->session->userdata('id_lvl') == 2) { ?>
                    <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="mdi mdi-application"></i>
                            <span>Rincian Data Export</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                          <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                            <li><a href="<?= base_url('master_neraca_kolektif') ?>">Hasil Proses Data Neraca</a></li>
                          <?php } ?>
                            <li><a href="#">Data Simpanan Anggota</a></li>
                            <li><a href="#">Data SHU Per PUSK</a></li>
                            <li><a href="#">Data Piutang Tahunan</a></li>
                            <li><a href="#">Data Penggunaan Dana Sosial</a></li>
                            <li><a href="#">Data Neraca Saldo</a></li>
                            <li><a href="#">Data Neraca Tahunan</a></li>

                        </ul>
                    </li>
                  <?php }
                 } ?>
                <?php if ($this->session->userdata('id_lvl') == 1) { ?>
                  <li class="menu-title">Pengaturan</li>
                  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                      <i class="mdi mdi-cog"></i>
                      <span> Pengaturan </span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?= base_url('sign_up') ?>">Buat Pengguna</a></li>
                      <li><a href="<?= base_url('data_akun') ?>">Akun </a></li>
                      <!-- <li><a href="<?= base_url('reset_kas') ?>">Reset Kas</a></li>
                      <li><a href="<?= base_url('base_config') ?>">Atur Master Brangkas</a></li> -->

                    </ul>
                  </li>
                <?php } ?>
                <!-- <li>
                  <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-format-page-break"></i>
                    <span>Modul Custom</span>
                  </a>
                  <ul class="sub-menu" aria-expanded="false">
                    <li><a href="pages-starter.html">Tambah Modul</a></li>
                    <li><a href="pages-maintenance.html">Edit Modul</a></li>
                    <li><a href="pages-comingsoon.html">Hapus Modul</a></li>
                  </ul>
                </li>
                <li>
                    <a href="<?= base_url('C_Auth/logout') ?>">
                        <i class="mdi mdi-logout"></i>
                        <span> logout </span>
                    </a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
