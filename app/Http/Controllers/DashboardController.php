<?php

namespace App\Http\Controllers;
use App\Models\Transaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function __invoke()
    {

        $income = Transaction::where('transaction_status','SUCCESS')->sum('transaction_total');
        $sell   = Transaction::count();
        $item   = Transaction::orderBy('id','DESC')->take(5)->get();
        $pie    = [
            'pending' => Transaction::where('transaction_status','PENDING')->count(),
            'success' => Transaction::where('transaction_status','SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status','FAILED')->count()
        ];        
        return view('pages/dashboard')->with([
            'income' => $income,
            'sell'   => $sell,
            'items'  => $item,
            'pie'    => $pie
        ]);
    }
}
