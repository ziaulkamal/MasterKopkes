<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curency_indo_helper {

  function convRupiah($value) {
   return 'Rp ' . number_format($value);
  }

}
