<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ReportController extends Controller
{
    public function index(): View
    {
        $reports = Report::with('resident')->orderBy('created_at', 'desc')->paginate(10);
        $residents = Resident::where('status', 'active')->get();
        return view('reports.index', compact('reports', 'residents'));
    }

    public function create(): View
    {
        $residents = Resident::where('status', 'active')->get();
        return view('reports.create', compact('residents'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'category' => 'required|in:kehilangan,kerusakan_fasilitas,keamanan,kebersihan,lainnya',
            'evidence_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('evidence_image')) {
            $validated['evidence_image'] = $request->file('evidence_image')->store('reports', 'public');
        }

        Report::create($validated);

        return redirect()->route('reports.index')->with('success', 'Laporan berhasil dibuat');
    }

    public function show(Report $report): View
    {
        return view('reports.show', compact('report'));
    }

    public function edit(Report $report): View
    {
        return view('reports.edit', compact('report'));
    }

    public function update(Request $request, Report $report): RedirectResponse
    {
        $validated = $request->validate([
            'status' => 'required|in:baru,diproses,selesai,ditolak',
            'admin_response' => 'nullable|string',
        ]);

        if ($request->filled('admin_response')) {
            $validated['responded_at'] = now();
        }

        $report->update($validated);

        return redirect()->route('reports.show', $report)->with('success', 'Laporan diperbarui');
    }

    public function destroy(Report $report): RedirectResponse
    {
        $report->delete();
        return redirect()->route('reports.index')->with('success', 'Laporan dihapus');
    }
}
