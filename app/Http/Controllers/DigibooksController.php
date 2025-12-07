<?php

namespace App\Http\Controllers;

use App\Models\Digibooks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DigibooksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil query search (bisa null)
        $search = $request->query('search');
        $page   = $request->query('page', 1);

        // Jika ada input search, paksa kembali ke page 1
        if ($search && $page != 1) {
            return redirect()->route('elib.index', ['search' => $search, 'page' => 1]);
        }

        // Build URL API
        $url = "https://gutendex.com/books?page={$page}";

        if ($search) {
            $url .= "&search=" . urlencode($search);
        }

        // Fetch API
        $response = Http::withoutVerifying()->get($url);

        if ($response->failed()) {
            return back()->with('error', 'Gagal mengambil data dari API Gutendex');
        }

        $data = $response->json();

        $digibooks = $data['results'];
        $nextPage  = $data['next'] ? $page + 1 : null;
        $prevPage  = $data['previous'] ? $page - 1 : null;

        return view('e-library.index', compact('digibooks', 'search', 'nextPage', 'prevPage', 'page'));
    }

    /**
     * Simpan data baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|string',
            'writer'     => 'nullable|string',
            'publisher'  => 'nullable|string',
            'coverimg_path' => 'nullable|string',
            'file_path'  => 'nullable|string',
        ]);

        Digibooks::create($request->all());

        return redirect()->back()->with('success', 'DigiBook berhasil ditambahkan!');
    }

    /**
     * Update data tertentu.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title'      => 'required|string',
            'writer'     => 'nullable|string',
            'publisher'  => 'nullable|string',
            'coverimg_path' => 'nullable|string',
            'file_path'  => 'nullable|string',
        ]);

        $digibook = Digibooks::findOrFail($id);
        $digibook->update($request->all());

        return redirect()->back()->with('success', 'DigiBook berhasil diupdate!');
    }

    /**
     * Hapus data.
     */
    public function destroy($id)
    {
        $digibook = Digibooks::findOrFail($id);
        $digibook->delete();

        return redirect()->back()->with('success', 'DigiBook berhasil dihapus!');
    }
}
