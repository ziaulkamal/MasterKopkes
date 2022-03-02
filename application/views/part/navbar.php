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
                        <i class="mdi mdi-gradient"></i>
                        <span>Anggota</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url('anggota'); ?>">Data Anggota</a></li>
                        <li><a href="<?=base_url('daftar'); ?>">Daftar Anggota</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-gradient"></i>
                        <span>Instansi</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                      <li><a href="<?=base_url('Instansi'); ?>"> Data Instansi</a></li>
                        <li><a href="<?=base_url(''); ?>"></a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-gradient"></i>
                        <span>Simpanan</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="<?=base_url('C_Simpanan/cari_simpan'); ?>">Cari ID Anggota</a></li>
                        <li><a href="<?=base_url('C_Simpanan/data_simpan'); ?>">Data Simpanan Anggota</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-page-layout-header"></i>
                        <span>Operasional</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="layouts-horizontal.html">Update Data</a></li>
                        <li><a href="layouts-hori-topbar-dark.html">Data Keseluruhan</a></li>
                        <li><a href="layouts-hori-boxed-width.html">Data Bulana</a></li>
                        <li><a href="layouts-hori-boxed-width.html">Data Harian</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Angsuran</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="auth-login.html">Proses Angsuran</a></li>
                        <li><a href="auth-register.html">Cek Angsuran Tertunda</a></li>
                        <li><a href="auth-recoverpw.html">Laporan Angsuran</a></li>
                    </ul>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-briefcase-variant-outline"></i>
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
            </ul>
        </div>
    </div>
</div>
