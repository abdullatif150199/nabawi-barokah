<?php

namespace App\Http\Controllers;

use App\Models\Documentation;
use App\Models\DocumentationImg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DocumentationController extends Controller
{
    public function index()
    {
        $documentations = Documentation::with('images')->latest()->get();
        return view('backend.pages.documentation.index', compact('documentations'));
    }

    public function create()
    {
        return view('backend.pages.documentation.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img_thumb' => 'required|image',
            'images.*' => 'image|nullable',
        ]);


        $imgThumbPath = $request->file('img_thumb')->store('documentations/thumbs', 'public');

        $documentation = Documentation::create([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'description' => $request->description,
            'img_thumb' => $imgThumbPath,
        ]);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $img) {
                $path = $img->store('documentations/images', 'public');
                DocumentationImg::create([
                    'documentation_id' => $documentation->id,
                    'url' => $path,
                ]);
            }
        }

        return redirect()->route('documentations.index')->with('success', 'Documentation created successfully.');
    }

    public function edit(Documentation $documentation)
    {
        $documentation->load('images');
        return view('backend.pages.documentation.edit', compact('documentation'));
    }

    public function update(Request $request, Documentation $documentation)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'img_thumb' => 'nullable|image',
            'images.*' => 'nullable|image',
        ]);

        $documentation->update([
            'title' => $request->title,
            'slug' => Str::slug($request->title) . '-' . Str::random(5),
            'description' => $request->description,
        ]);

        if ($request->hasFile('img_thumb')) {
            if (Storage::disk('public')->exists($documentation->img_thumb)) {
                Storage::disk('public')->delete($documentation->img_thumb);
            }
            $imgThumbPath = $request->file('img_thumb')->store('documentations/thumbs', 'public');
            $documentation->img_thumb = $imgThumbPath;
            $documentation->save();
        }


        if ($request->hasFile('images')) {
            foreach ($documentation->images as $image) {
                if (Storage::disk('public')->exists($image->url)) {
                    Storage::disk('public')->delete($image->url);
                }
                $image->delete();
            }

            foreach ($request->file('images') as $img) {
                $path = $img->store('documentations/images', 'public');
                DocumentationImg::create([
                    'documentation_id' => $documentation->id,
                    'url' => $path,
                ]);
            }
        }

        return redirect()->route('documentations.index')->with('success', 'Documentation updated successfully.');
    }


    public function destroy(Documentation $documentation)
    {

        if (Storage::disk('public')->exists($documentation->img_thumb)) {
            Storage::disk('public')->delete($documentation->img_thumb);
        }


        foreach ($documentation->images as $image) {
            if (Storage::disk('public')->exists($image->url)) {
                Storage::disk('public')->delete($image->url);
            }
            $image->delete();
        }

        $documentation->delete();

        return redirect()->route('documentations.index')->with('success', 'Documentation deleted successfully.');
    }
}
