<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->paginate(10);
        return view('backend.pages.package.index', compact('packages'));
    }

    public function create()
    {
        return view('backend.pages.package.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'duration'        => 'nullable|string|max:255',
            'airline'        => 'nullable|string|max:255',
            'departure_date'  => 'nullable|date',
            'detail'          => 'nullable|string',
            'hotel_1'         => 'nullable|string|max:255',
            'hotel_2'         => 'nullable|string|max:255',
            'ziarah'          => 'nullable|string',
            'acomodation'     => 'nullable|string|max:255',
            'price'           => 'required|numeric',
        ]);

        Package::create($request->all());

        return redirect()->route('packages.index')->with('success', 'Package created succesfully.');
    }

    public function show(Package $package)
    {
        return view('backend.pages.package.show', compact('package'));
    }

    public function edit(Package $package)
    {
        return view('backend.pages.package.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'            => 'required|string|max:255',
            'duration'        => 'nullable|string|max:255',
            'airline'        => 'nullable|string|max:255',
            'departure_date'  => 'nullable|date',
            'detail'          => 'nullable|string',
            'hotel_1'         => 'nullable|string|max:255',
            'hotel_2'         => 'nullable|string|max:255',
            'ziarah'          => 'nullable|string',
            'acomodation'     => 'nullable|string|max:255',
            'price'           => 'required|numeric',
        ]);

        $package->update($request->all());

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }

    public function destroy(Package $package)
    {
        $package->delete();
        return redirect()->route('packages.index')->with('success', 'Package deleted succesfully.');
    }
}
