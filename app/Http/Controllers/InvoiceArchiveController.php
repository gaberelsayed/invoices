<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use Illuminate\Support\Facades\Storage;

class InvoiceArchiveController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:ارشيف الفواتير', ['only' => ['index']]);
        $this->middleware('permission:حذف الفاتورة', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::onlyTrashed()->get();
        return view('invoices.archive',compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $invoice = Invoice::withTrashed()->where('id',$id)->first();
        return view('invoices.show',compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $invoice = Invoice::withTrashed()->where('id', $request->invoice_id)->restore();
        session()->flash('success', 'تم نقل الفاتورة بنجاح');
        return redirect()->route('invoices_archive.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        $invoice = Invoice::withTrashed()->where('id',$id)->first();
        //delete Attachments
        if(! empty($invoice->Invoice_attachments))
            Storage::disk('public_uploads')->deleteDirectory($invoice->invoice_number);

        $invoice->forceDelete();
        session()->flash('success', 'تم حذف الفاتورة بنجاح');
        return redirect()->back();
    }
}
