<?php

namespace App\Http\Controllers;

use App\Models\Member;
use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoicesController extends Controller
{
    public function create()
    {
        // Define a buyer
        $buyer = Member::first();
        $customer = new Buyer([
            'name' => $buyer->name,
            'custom_fields' => [
                'email' => $buyer->email,
            ],
        ]);

        $item = (new InvoiceItem())->title('this is the title')->pricePerUnit(10);

        $invoice = Invoice::make()
                            ->buyer($customer)
                            ->addItem($item);

        return $invoice->stream();
    }
}
