<?php
namespace App\Generic;
use App\Http\Controllers\Controller;

class Helper extends Controller
{
    public function getPrice($item, $quantity){
        switch ($item) {
            case 'A':
                if($quantity >= 3){
                    if($quantity % 3 == 0){
                        $itemGroupPrice = $quantity/3 * 3.00;
                    }else{
                        $itemGroupPrice = (floor($quantity/3) * 3.00 ) +  ($quantity % 3 * 1.25);
                    }
                }else{
                   $itemGroupPrice = $quantity * 1.25;  
                }
                return $itemGroupPrice;
                break;
            case 'B':
                return $quantity * 4.25;
                break;
            case 'C':
                if($quantity >= 6){
                    if($quantity % 6 == 0){
                        $itemGroupPrice = $quantity/6 * 5.00;
                    }else{
                        $itemGroupPrice = (floor($quantity/6) * 5 ) +  ($quantity % 6 * 1.00);
                    }
                }else{
                   $itemGroupPrice = $quantity * 1;  
                }
                return $itemGroupPrice;
                break;
            case 'D':
                return  $quantity * 0.75;
                break;
            default:
                return 0;
                break;
        }
    }
}
