<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Package;
use App\Models\Setting;
use App\Models\Visitor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'name'       => 'required|string|max:255',
            'wa'         => 'required|string|max:20',
            'message'    => 'nullable|string'
        ]);

        $package = Package::findOrFail($data['package_id']);

        $applicant = Applicant::create($data);
        $cleanedWa = preg_replace('/[^0-9]/', '', $data['wa']);
        $setting = Setting::first();
        $waAdmin = !empty($setting->wa) ? $setting->wa : config('app.wa_admin');
        $text = "Assalamu'alaikum, saya *{$data['name']}* ingin mendaftar paket umrah/haji.\n\n"
            . "📦 Paket : {$package->name}\n"
            . "📩 Pesan: " . ($data['message'] ?? '-');

        $whatsappUrl = "https://wa.me/{$waAdmin}?text=" . urlencode($text);

        return redirect($whatsappUrl);
    }

    // public function getMonthlyVisitorStats()
    // {
    //     $data = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
    //         ->whereYear('created_at', now()->year)
    //         ->groupByRaw('MONTH(created_at)')
    //         ->pluck('total', 'month');

    //     return response()->json($data);
    // }

    public function getMonthlyVisitorStats()
    {
        $data = Visitor::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', now()->year)
            ->groupByRaw('MONTH(created_at)')
            ->pluck('total', 'month');

        return response()->json($data);
    }

    public function getWeeklyVisitorStats()
    {
        $startDate = now()->subDays(6)->startOfDay();
        $endDate = now()->endOfDay();

        // Ambil data dari database
        $rawData = Visitor::selectRaw('DATE(created_at) as date, COUNT(*) as total')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->keyBy('date');

        // Buat array 7 hari terakhir
        $data = collect();
        for ($i = 0; $i <= 6; $i++) {
            $date = now()->subDays(6 - $i)->format('Y-m-d');
            $total = $rawData->has($date) ? $rawData[$date]->total : 0;

            $data->push([
                'date' => $date,
                'total' => $total,
            ]);
        }

        return response()->json($data);
    }

    public function export()
    {
        $visitors = Applicant::all();

        $filename = "visitors.xls";
        $headers = [
            "Content-Type" => "application/vnd.ms-excel",
            "Content-Disposition" => "attachment; filename=\"$filename\""
        ];

        $content = "<table border='1'>
        <tr>
            <th>Tanggal</th>
            <th>Paket</th>
            <th>Nama</th>
            <th>WA</th>
            <th>Pesan</th>
        </tr>";

       foreach ($visitors as $v) {
            $content .= "<tr>
                <td>" . \Carbon\Carbon::parse($v->created_at)->translatedFormat('d F Y') . "</td>
                <td>" . ($v->package->name ?? '-') . "</td>
                <td>" . $v->name . "</td>
                <td>" . $v->wa . "</td>
                <td>" . $v->message . "</td>
            </tr>";
        }


        $content .= "</table>";

        return response($content, 200, $headers);
    }
}
