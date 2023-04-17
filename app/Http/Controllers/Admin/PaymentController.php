<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index(){

        $payments=Payment::with('vendors')
                  ->with('categories')
                  ->with('trainings')
                  ->with('companies')                  
                  ->get();
                  
    	return view('admin.payment.index',compact('payments'));
    }
}
