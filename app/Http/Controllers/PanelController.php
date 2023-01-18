<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PanelController extends Controller
{
    protected function panel_home_get() {
        return view("panel.home");
    }

    protected function panel_invoices_get() {
        $invoices = $this->getInvoices();
        $filtredInvoices = [];
        foreach($invoices as $invoice) {
            if (isset($invoice["lines"][0])) {
                array_push($filtredInvoices, $invoice);
            } 
        }
        return view("panel.invoices", compact("filtredInvoices"));
    }

    





    // Dolibarr functions
    protected function getRequest($url) {
        return Http::withHeaders([
            "Content-Type" => "application/json",
            "DOLAPIKEY" => env("DOLAPIKEY")
        ])->get($url)->json();
    }

    protected function getInvoices() {
        return $this->getRequest("http://localhost/dolibarr/api/index.php/invoices?sortfield=t.rowid&sortorder=ASC&limit=100");

    }
}
