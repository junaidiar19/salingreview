<?php

if (!function_exists('increment')) {
  /**
   * Ubah angka menjadi format rupiah
   * 
   * @params int|float $angka
   */
  function rupiahFormat($angka = null): string
  {
    if ($angka) {
      $angka = (int) $angka;

      $rp = 'Rp. ' . number_format($angka, 0, ',', '.');
      return $rp;
    }

    return "";
  }
}
