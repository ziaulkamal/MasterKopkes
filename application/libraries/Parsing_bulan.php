<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parsing_bulan {

  function parse($value) {
   return str_replace('-','',substr($value,4,-2));
  }

}
