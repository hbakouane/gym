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
        $total_paid = DB::table('payments')->where('vendor_id', $id)->sum('amount');
        $total_credits = DB::table('credits')->where('vendor_id', $id)->sum('amount');
        return view('vendors.show', [
            'vendor' => $vendor,
            'total_paid' => $total_paid,
            'total_credits' => $total_credits
        ]);
    }
}
