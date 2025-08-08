<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first(); // karena cuma satu
        return view('backend.pages.setting.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'wa' => 'nullable|string',
            'fb' => 'nullable|url',
            'ig' => 'nullable|url',
            'yt' => 'nullable|url',
        ]);

        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        $setting->wa = $request->wa;
        $setting->fb = $request->fb;
        $setting->ig = $request->ig;
        $setting->yt = $request->yt;
        $setting->save();

        return redirect()->back()->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
