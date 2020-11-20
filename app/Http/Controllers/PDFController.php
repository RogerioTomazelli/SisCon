<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PDFController extends Controller
{
    public function geraPdf()
    {
        $pdf = PDF::loadView('pdf', compact(''));
	    return $pdf->setPaper('a4')->stream('Relatório do estoque');
    }
}
