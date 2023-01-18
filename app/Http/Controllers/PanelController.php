<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    protected function panel_home_get() {
        return view("panel.home");
    }
    protected function panel_invoices_get() {
        return view("panel.invoices");
    }
}
