<?php

namespace Ezadev\Terbilang;

class Sebutkan {

  public static function Angka($nilai){
    if(is_numeric($nilai)){
      if($nilai<0) {
        $hasil = "minus ". trim(static::Penyebut($nilai));
      } else {
        $hasil = trim(static::Penyebut($nilai));
      }
      return ucwords($hasil);
    }else{
      die('Data harus berupa angka');
    }
  }

  public static function Penyebut($nilai)
  {
    $nilai = abs($nilai);
    $huruf = array("", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($nilai < 12) {
      $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
      $temp = static::Penyebut($nilai - 10). " belas";
    } else if ($nilai < 100) {
      $temp = static::Penyebut($nilai/10)." puluh". static::Penyebut($nilai % 10);
    } else if ($nilai < 200) {
      $temp = " Seratus" . static::Penyebut($nilai - 100);
    } else if ($nilai < 1000) {
      $temp = static::Penyebut($nilai/100) . " ratus" . static::Penyebut($nilai % 100);
    } else if ($nilai < 2000) {
      $temp = " Seribu" . static::Penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
      $temp = static::Penyebut($nilai/1000) . " ribu" . static::Penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
      $temp = static::Penyebut($nilai/1000000) . " juta" . static::Penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
      $temp = static::Penyebut($nilai/1000000000) . " milyar" . static::Penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
      $temp = static::Penyebut($nilai/1000000000000) . " trilyun" . static::Penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
  }

}
