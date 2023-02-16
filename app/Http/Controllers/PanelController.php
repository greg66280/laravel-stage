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
                $filtredInvoices[] = $invoice;
            } 
        }
        return view("panel.invoices", compact("filtredInvoices"));
    }

    protected function panel_tiers_get() {
        $invoices = $this->getInvoices();
        $filtredInvoices = [];
        foreach($invoices as $invoice) {
            if (isset($invoice["lines"][0])) {
                array_push($filtredInvoices, $invoice);
            } 
        }
        return view("panel.tiers",compact("filtredInvoices"));
    }

    protected function panel_pdf_get() {
        $invoices = $this->getInvoices();
        $filtredInvoices = [];
        foreach($invoices as $invoice) {
            if (isset($invoice["lines"][0])) {
                array_push($filtredInvoices, $invoice);
            } 
        }
        return view("panel.pdf",compact("filtredInvoices"));
    }

    // Dolibarr functions
    protected function getRequest($url) {
        return Http::withHeaders([
            "Content-Type" => "application/json",
            "DOLAPIKEY" => env("DOLAPIKEY")
        ])->get($url)->json();
    }

    protected function postRequest($url) {
        
        return Http::withHeaders([
            "Content-Type" => "application/json",
            "DOLAPIKEY" => env("DOLAPIKEY")
        ])->post($url,["idwarehouse"=> 0])->json();
    }

    protected function getInvoices() {
        return $this->getRequest("http://localhost/dolibarr/htdocs/api/index.php/invoices?sortfield=t.rowid&sortorder=ASC&limit=100");

        if(is_null($raw)){
            exit("l'api me retourne NULLL");
        }

        return $raw;
    }
    
    
    protected function status(Request $request) {
        $datas = $request->except(["_method", "_token"]);

        //dd($datas);
        switch($datas["status"]) {
            case "draft": {
                $url = "http://localhost/dolibarr/htdocs/api/index.php/invoices/{$datas['id']}/settodraft";
                break;
            }
            case "unpaid": {
                $url = "http://localhost/dolibarr/htdocs/api/index.php/invoices/{$datas['id']}/settounpaid";
                break;
            }

            case "paid": {
                $url = "http://localhost/dolibarr/htdocs/api/index.php/invoices/{$datas['id']}/settopaid";
                break;
            }

        }
        $this->postRequest($url);
        return redirect()->back();
    }
}