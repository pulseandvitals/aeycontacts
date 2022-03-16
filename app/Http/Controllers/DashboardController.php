<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }

    public function ada()
    {
        return view('admin.ada.index');
    }

    public function chargeInvoice()
    {
        return view('admin.charge-invoice.index');
    }
    public function receiptCollection()
    {
        return view('pages.billing-collection.receipt-collection.index');
    }
}
