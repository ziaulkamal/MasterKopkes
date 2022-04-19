<?php
defined('BASEPATH') OR exit('No direct script access allowed');

      // IDEA: Untuk Peletakan Format Rupiah pada Tabel Simpanan dan Kebutuhan untuk nilai
      function convRupiah($value) {
       return 'Rp ' . number_format($value);
      }
