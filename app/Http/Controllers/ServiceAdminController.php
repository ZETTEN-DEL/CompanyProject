<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use Barryvdh\DomPDF\Facade\Pdf;

class ServiceAdminController extends Controller
{
    // READ / INDEX
    public function index()
    {
        $services = Services::all();

        return view('auth.dashboard', [
            'page' => 'services',
            'services' => $services
        ]);
    }

    // CREATE / STORE
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'desc' => 'required',
            'foto' => 'required|image'
        ]);

        $file = $request->file('foto');
        $namaFile = time().'_'.$file->getClientOriginalName();
        $file->move(public_path('image'), $namaFile);

        Services::create([
            'nama' => $request->nama,
            'desc' => $request->desc,
            'foto' => $namaFile
        ]);

        return redirect()->back()->with('success', 'Service berhasil ditambahkan');
    }

    // UPDATE
    public function update(Request $request, $id)
    {
        $service = Services::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'desc' => 'required'
        ]);

        $data = [
            'nama' => $request->nama,
            'desc' => $request->desc
        ];

        if ($request->hasFile('foto')) {

            $file = $request->file('foto');
            $namaFile = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('image'), $namaFile);

            $data['foto'] = $namaFile;
        }

        $service->update($data);

        return redirect()->back()->with('success', 'Service berhasil diupdate');
    }

    // DELETE
    public function destroy($id)
    {
        $service = Services::findOrFail($id);

        // hapus file gambar jika ada
        if ($service->foto && file_exists(public_path('image/'.$service->foto))) {
            unlink(public_path('image/'.$service->foto));
        }

        $service->delete();

        return redirect()->back()->with('success', 'Service berhasil dihapus');
    }

    public function exportPdf()
{
    $services = Services::all();

    $pdf = Pdf::loadView('admin.services_pdf', compact('services'));

    return $pdf->download('services.pdf');
}
}