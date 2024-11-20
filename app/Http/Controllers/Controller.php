<?php

namespace App\Http\Controllers;

abstract class Controller
{
    
    // buatkan fungsi penjumlahan 1-10
    public function sum1to50(): int
    {
        $sum = 0;
        for ($i = 1; $i <= 50; $i++) {
            $sum += $i;
        }
        return $sum;
    }
    
    public function product1to10(): int
    {
        $product = 1;
        for ($i = 1; $i <= 10; $i++) {
            $product *= $i;
        }
        return $product;
    }
    


    
    
    
}