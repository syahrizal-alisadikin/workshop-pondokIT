<?php

// format price
if (!function_exists('MoneyFormat')) {

   /**
    * TanggalID
    *
    * @param  mixed $tanggal
    * @return void
    */
   function MoneyFormat($price)
   {
      return "Rp " . number_format($price, 0, ',', '.');
   }
}

// discount
if (!function_exists('Discount')) {

   /**
    * TanggalID
    *
    * @param  mixed $tanggal
    * @return void
    */
   function Discount($price, $discount)
   {
      $discount = $price - ($price * $discount / 100);
      return "Rp " . number_format($discount, 0, ',', '.');
   }
}
