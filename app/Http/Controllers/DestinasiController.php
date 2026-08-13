<?php
namespace App\Http\Controllers;

use App\Models\Destinasi;
use Illuminate\Http\Request;
use App\Models\Kategori;

class DestinasiController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('cari');
        $kategoriId = $request->input('kategori');

        $destinasiList = Destinasi::when($keyword, function ($query) use ($keyword) {
                $query->where('nama', 'like', '%' . $keyword . '%');
            })
            ->when($kategoriId, function ($query) use ($kategoriId) {
                $query->where('kategori_id', $kategoriId);
            })
            ->with('kategori')
            ->latest()
            ->paginate(2)
            ->appends($request->query());

        $kategoriList = Kategori::all();

        return view('destinasi', compact('destinasiList', 'keyword', 'kategoriId', 'kategoriList'));
    }

    public function show($id)
    {
        $destinasi = Destinasi::with(['atraksi', 'ulasan.user', 'kategori'])->findOrFail($id);
        return view('destinasi-detail', [
            'destinasi' => $destinasi,
        ]);
    }

    public function create()
    {
        $kategoriList = Kategori::all();
        return view('destinasi-create', compact('kategoriList'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'kategori_id'  => 'required|exists:kategori,id',
            'nama'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'gambar'       => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jam_buka'     => 'required|date_format:H:i,H:i:s',
            'jam_tutup'    => 'required|date_format:H:i,H:i:s|after:jam_buka',
            'lokasi'       => 'nullable|string|max:255',
            'harga_tiket'  => 'required|numeric|min:0|max:99999999',
        ], [
            'kategori_id.required'  => 'Kategori wajib dipilih.',
            'kategori_id.exists'    => 'Kategori yang dipilih tidak valid.',
            'nama.required'         => 'Nama destinasi wajib diisi.',
            'deskripsi.required'    => 'Deskripsi wajib diisi.',
            'gambar.required'       => 'Gambar wajib diupload.',
            'gambar.image'          => 'File yang diupload harus berupa gambar.',
            'gambar.mimes'          => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.max'            => 'Ukuran gambar maksimal 2MB.',
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

        $destinasi = Destinasi::create($validated);

        return redirect()->route('destinasi.detail', $destinasi->id)
            ->with('success', 'Destinasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $destinasi = Destinasi::findOrFail($id);
        $kategoriList = Kategori::all();
        return view('destinasi-edit', compact('destinasi', 'kategoriList'));
    }

    public function update(Request $request, $id)
    {
        $destinasi = Destinasi::findOrFail($id);

        $validated = $request->validate([
            'kategori_id'  => 'nullable|exists:kategori,id',
            'nama'         => 'required|string|max:255',
            'deskripsi'    => 'required|string',
            'gambar'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jam_buka'     => 'required|date_format:H:i,H:i:s',
            'jam_tutup'    => 'required|date_format:H:i,H:i:s|after:jam_buka',
            'lokasi'       => 'nullable|string|max:255',
            'harga_tiket'  => 'required|numeric|min:0|max:99999999',
        ], [
            'kategori_id.exists'    => 'Kategori yang dipilih tidak valid.',
            'nama.required'         => 'Nama destinasi wajib diisi.',
            'deskripsi.required'    => 'Deskripsi wajib diisi.',
            'gambar.image'          => 'File yang diupload harus berupa gambar.',
            'gambar.mimes'          => 'Format gambar harus jpeg, png, jpg, atau gif.',
            'gambar.max'            => 'Ukuran gambar maksimal 2MB.',
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