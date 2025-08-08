<?php

namespace App\Http\Controllers;

use App\Models\Anouncement;
use Illuminate\Http\Request;

class AnouncementController extends Controller
{
     public function index()
    {
        $announcements = Anouncement::latest()->get();
        return view('backend.pages.announcement.index', compact('announcements'));
    }

    public function create()
    {
        return view('backend.pages.announcement.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        // Nonaktifkan semua
        Anouncement::query()->update(['is_active' => false]);

        // Simpan dan aktifkan
        Anouncement::create([
            'text' => $request->text,
            'is_active' => true,
        ]);

        return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil ditambahkan dan diaktifkan.');
    }

    public function edit($id)
    {
        $announcement = Anouncement::findOrFail($id);
        return view('backend.pages.announcement.edit', compact('announcement'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'text' => 'required|string',
        ]);

        $announcement = Anouncement::findOrFail($id);
        $announcement->update([
            'text' => $request->text,
        ]);

        return redirect()->route('announcements.index')->with('success', 'Pengumuman berhasil diperbarui.');
    }

    public function destroy($id)
    {
        Anouncement::destroy($id);
        return redirect()->back()->with('success', 'Pengumuman berhasil dihapus.');
    }

    public function activate($id)
    {
        // Nonaktifkan semua
        Anouncement::query()->update(['is_active' => false]);

        // Aktifkan yang dipilih
        $announcement = Anouncement::findOrFail($id);
        $announcement->update(['is_active' => true]);

        return redirect()->back()->with('success', 'Pengumuman berhasil diaktifkan.');
    }
}
