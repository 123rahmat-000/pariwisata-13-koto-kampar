<?php
namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;

class DestinasiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('cari');

        $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->latest()
            ->paginate(2);

        return view('destinasi', compact('destinasiList', 'keyword'));
    }

    public function show($id)
    {
       $destinasi = Destinasi::with(['atraksi', 'ulasan.user'])->findOrFail($id);

        return view('destinasi-detail', [
            'destinasi' => $destinasi,
        ]);
    }

    public function create()
    {
        return view('destinasi-create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nama'         => 'required|string|max:255',
        'deskripsi'    => 'required|string',
        'gambar' => 'required|image|max:2048',
        'jam_buka'     => 'required|date_format:H:i,H:i:s',
        'jam_tutup'    => 'required|date_format:H:i,H:i:s|after:jam_buka',
        'lokasi'       => 'nullable|string|max:255',
        'harga_tiket'  => 'required|numeric|min:0|max:99999999',
    ], [
        'nama.required'      => 'Nama destinasi wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'gambar.string'      => 'Nama file gambar tidak valid.',
        'gambar.max'         => 'Nama file gambar maksimal 255 karakter.',
        'jam_buka.required'     => 'Jam buka wajib diisi.',
        'jam_buka.date_format'  => 'Format jam buka tidak valid (HH:MM).',
        'jam_tutup.required'    => 'Jam tutup wajib diisi.',
        'jam_tutup.date_format' => 'Format jam tutup tidak valid (HH:MM).',
        'jam_tutup.after'       => 'Jam tutup harus setelah jam buka.',
        'harga_tiket.required'  => 'Harga tiket wajib diisi (isi 0 jika gratis).',
        'harga_tiket.numeric'   => 'Harga tiket harus berupa angka.',
        'harga_tiket.min'       => 'Harga tiket tidak boleh kurang dari 0.',
        'harga_tiket.max'       => 'Harga tiket terlalu besar.',
    ]);
         $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
         Destinasi::create($validated);


    $destinasi = Destinasi::create($validated);

    return redirect()->route('destinasi.detail', $destinasi->id)
        ->with('success', 'Destinasi berhasil ditambahkan!');
}

    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        return view('destinasi-edit', compact('destinasi'));
    }

    public function update(Request $request, $id)
{
    $destinasi = Destinasi::findOrFail($id);

    $validated = $request->validate([
        'nama'         => 'required|string|max:255',
        'deskripsi'    => 'required|string',
         'gambar' => 'nullable|image|max:2048',
        'jam_buka'     => 'required|date_format:H:i,H:i:s',
        'jam_tutup'    => 'required|date_format:H:i,H:i:s|after:jam_buka',
        'lokasi'       => 'nullable|string|max:255',
        'harga_tiket'  => 'required|numeric|min:0|max:99999999',
    ], [
        'nama.required'      => 'Nama destinasi wajib diisi.',
        'deskripsi.required' => 'Deskripsi wajib diisi.',
        'gambar.string'      => 'Nama file gambar tidak valid.',
        'gambar.max'         => 'Nama file gambar maksimal 255 karakter.',
        'jam_buka.required'     => 'Jam buka wajib diisi.',
        'jam_buka.date_format'  => 'Format jam buka tidak valid (HH:MM).',
        'jam_tutup.required'    => 'Jam tutup wajib diisi.',
        'jam_tutup.date_format' => 'Format jam tutup tidak valid (HH:MM).',
        'jam_tutup.after'       => 'Jam tutup harus setelah jam buka.',
        'harga_tiket.required'  => 'Harga tiket wajib diisi (isi 0 jika gratis).',
        'harga_tiket.numeric'   => 'Harga tiket harus berupa angka.',
        'harga_tiket.min'       => 'Harga tiket tidak boleh kurang dari 0.',
        'harga_tiket.max'       => 'Harga tiket terlalu besar.',
    ]);

       if ($request->hasFile('gambar')) {
       $validated['gambar'] = $request->file('gambar')->store('destinasi', 'public');
       } else {
       unset($validated['gambar']);
}
 
$destinasi->update($validated);

    $destinasi->update($validated);

    return redirect()->route('destinasi.detail', $destinasi->id)
        ->with('success', 'Destinasi berhasil diperbarui!');
}

    public function destroy($id)
    {

        $destinasi = Destinasi::findOrFail($id);
        $destinasi->delete();

        return redirect()->route('destinasi')
            ->with('success', 'Destinasi berhasil dihapus!');
    }
}