<?php

namespace App\Http\Controllers;

use Validator;
use App\Generic\Helper;
use Illuminate\Http\Request;


class PosController extends Controller
{	
    public function __construct(Helper $helper) {
        $this->helper = $helper;
    }

    public function index()
    {
        return view("pos");
    }

   	public function calculatePrice(Request $request)
    {
    	$products = $request->product_name;
		$products = array_count_values($products);
		$totalPrice = 0;
		foreach ($products as $key=>$value) {
			$totalPrice +=  $this->helper->getPrice(strtoupper($key), $value);
		}
		if($totalPrice == 0){
			$message = "Invalid option!,Please try again.";
			$status = "error";
		}
		else{
			$message = "Total Price: " . $totalPrice;
			$status = "success";
		}
        return ["message"=> $message,"status"=>"success"];
    } 
}
