<?php

namespace App\Http\Controllers\Admin;

use App\Models\Drug;
use App\Models\Quotation;
use App\Mail\QuotationMail;
use App\Models\Prescription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $quotations = Quotation::all();
        return view('admin.quotation.index', compact('quotations'));
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
        $validated = $request->validate([
            'user_id' => 'required',
            'prescription_id' => 'required',
            'drug_id' => 'required',
            'quantity' => 'required',
        ]);

        $drug_price = Drug::find($validated['drug_id'])->price;

        $total_price = $drug_price * $validated['quantity'];

        $validated['total_price'] = $total_price;

        Quotation::create($validated);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Quotation $quotation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quotation $quotation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quotation $quotation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quotation $quotation)
    {
        //
    }

    public function sendQuotation(Request $request)
    {

        // Retrieve the prescription ID from the form submission
        $prescriptionId = $request->input('prescription_id');

        // Find the prescription by its ID
        $prescription = Prescription::find($prescriptionId);

        // $prescription = Prescription::find(['prescription_id']);
        // $userEmail = $prescription->user->email;
        $userEmail = $prescription->user->email;

        // Send the quotation email to the user
        Mail::to($userEmail)->send(new QuotationMail());

  


        return redirect()->route('admin.prescription.index');
    }
}
