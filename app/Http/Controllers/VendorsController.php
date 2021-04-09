<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Subscription;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorsController extends Controller
{
    public function index()
    {
        return view('vendors.index');
    }

    public function create()
    {
        return view('vendors.create');
    }

    public function show($prefix, $id)
    {
        $vendor = Vendor::find($id);
        $total_paid = DB::table('payments')
                        ->where('payable_type', 'App\Models\Vendor')
                        ->where('payable_id', $id)
                        ->sum('amount');
        $total_credits_paid = DB::table('credits')
                                ->where('creditable_type', 'App\Models\Vendor')
                                ->where('creditable_id', $id)
                                ->where('status', 'Paid')
                                ->sum('amount');
        $total_paid = $total_paid + $total_credits_paid;
        $total_credits = DB::table('credits')
                            ->where('creditable_type', 'App\Models\Vendor')
                            ->where('creditable_id', $id)
                            ->where('status', 'Unpaid')
                            ->sum('amount');
        return view('vendors.show', [
            'vendor' => $vendor,
            'total_paid' => $total_paid,
            'total_credits' => $total_credits
        ]);
    }
}
