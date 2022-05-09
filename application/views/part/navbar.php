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
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Anggota</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url('anggota'); ?>">Data Anggota</a></li>
                        <li><a href="<?=base_url('daftar'); ?>">Tambah Anggota Baru</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-office-building-outline"></i>
                        <span>Instansi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url('Instansi'); ?>"> Data Instansi</a></li>
                      <li><a href="<?=base_url('tambah_instansi'); ?>"> Tambah Instansi Baru</a></li>
                    </ul>
                </li>

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

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-safe"></i>
                        <span>Pinjaman</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url('cari_pinjaman'); ?>">Cari Rekening Anggota</a></li>
                        <li><a href="<?=base_url('pinjaman'); ?>">Data Pinjaman Anggota</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-page-layout-header"></i>
                        <span>Operasional</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url('operasional/cash_out'); ?>">Update Data Kas Keluar</a></li>
                        <li><a href="<?=base_url('operasional/cash_in'); ?>">Update Data Kas Masuk</a></li>
                        <li><a href="<?= base_url() ?>">Data Bulana</a></li>
                        <li><a href="<?= base_url() ?>">Data Harian</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Angsuran</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?= base_url('angsuran') ?>">Data Angsuran Terakhir</a></li>
                        <li><a href="<?= base_url('angsuran_tertunda') ?>">Cek Angsuran Tertunda</a></li>
                        <li><a href="auth-recoverpw.html">Laporan Angsuran</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-cog"></i>
                        <span>Data Petugas</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url('C_Admin'); ?>">List Petugas</a></li>
                        <li><a href="<?=base_url('C_Admin/daftar'); ?>">Daftar Petugas</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-application"></i>
                        <span>Buku Laporan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="ui-alerts.html">Neraca Tahunan</a></li>
                        <li><a href="ui-badge.html">Neraca Perminggu</a></li>
                        <li><a href="ui-buttons.html">Laporan Perbulan</a></li>
                        <li><a href="ui-cards.html">Laporan Per 3 Bulan</a></li>
                        <li><a href="ui-carousel.html">Laporan Per 6 Bulan</a></li>
                    </ul>
                </li>
                <li class="menu-title">Pengaturan</li>
                <li>
                    <a href="<?=base_url('C_Pengaturan/index'); ?>">
                        <i class="mdi mdi-cog"></i>
                        <span> Pengaturan </span>
                    </a>
                </li>
                <li>
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
                </li>
            </ul>
        </div>
    </div>
</div>
