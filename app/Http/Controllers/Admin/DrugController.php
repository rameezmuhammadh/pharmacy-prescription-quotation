<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Drug;
use Illuminate\Http\Request;

class DrugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drugs = Drug::paginate(10)->OnEachSide(1);

        return view('admin.drug.index', compact('drugs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.drug.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        Drug::create($request->all());

        return redirect()->route('admin.drug.index')
            ->with('success', 'Drug created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Drug $drug)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Drug $drug)
    {
        return view('admin.drug.edit', compact('drug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Drug $drug)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
        ]);

        $drug->update($request->all());

        return redirect()->route('admin.drug.index')
            ->with('success', 'Drug updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Drug $drug)
    {
        $drug->delete();

        return redirect()->route('admin.drug.index')
            ->with('success', 'Drug deleted successfully');
    }
}

