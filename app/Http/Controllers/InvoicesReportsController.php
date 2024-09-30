<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoicesReportsController extends Controller
{
    public function index()
    {
        return view('reports.invoices_report');
    }
    public function search_reports(Request $request)
    {
        $radio = $request->rdio;
        // check the type of invoice
        if($radio == 1)
        {
            // check if there date on search fields
            if ($request->type && $request->start_at =='' && $request->end_at =='')
            {
                $invoices = Invoice::select('*')->where('Status','=',$request->type)->get();
                $type = $request->type;
                return view('reports.invoices_report',compact('type'))->with('invoices',$invoices);
            }
            else
            {
                $start_at = date($request->start_at);
                $end_at = date($request->end_at);
                $type = $request->type;
                $invoices = Invoice::whereBetween('invoice_Date',[$start_at,$end_at])->where('Status','=',$request->type)->get();
                return view('reports.invoices_report',compact('type','start_at','end_at'))->with('invoices',$invoices);
            }
        }
        //search with invoice number
        else {
        
            $invoices = Invoice::select('*')->where('invoice_number','=',$request->invoice_number)->get();
            return view('reports.invoices_report')->with('invoices',$invoices);
            
        }

    }
}
