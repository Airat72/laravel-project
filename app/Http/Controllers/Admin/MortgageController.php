<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mortgage;
use Illuminate\Http\Request;

class MortgageController extends Controller
{
    public function index()
    {
        $mortgages = Mortgage::where('is_active', true)->get();
        return view('admin.mortgages.index', compact('mortgages'));
    }

    public function create()
    {
        return view('admin.mortgages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'percent' => 'required|integer|max:40',
            'min_first_payment' => 'required|integer|max:98',
            'max_price' => 'required|numeric',
            'min_price' => 'required|numeric',
            'min_term' => 'required|integer',
            'max_term' => 'required|integer',
        ]);

        Mortgage::create($request->all());
        return redirect()->route('admin.mortgages.index');
    }

    public function show($id)
    {
        $mortgage = Mortgage::findOrFail($id);
        return view('admin.mortgages.show', compact('mortgage'));
    }

    public function edit($id)
    {
        $mortgage = Mortgage::findOrFail($id);
        return view('admin.mortgages.edit', compact('mortgage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'is_active' => 'boolean',
            'description' => 'nullable|string',
            'percent' => 'required|integer|max:40',
            'min_first_payment' => 'required|integer|max:98',
            'max_price' => 'required|numeric',
            'min_price' => 'required|numeric',
            'min_term' => 'required|integer',
            'max_term' => 'required|integer',
        ]);

        $mortgage = Mortgage::findOrFail($id);
        $mortgage->update($request->all());
        return redirect()->route('admin.mortgages.index');
    }

    public function destroy($id)
    {
        $mortgage = Mortgage::findOrFail($id);
        $mortgage->delete();
        return redirect()->route('admin.mortgages.index');
    }
}
