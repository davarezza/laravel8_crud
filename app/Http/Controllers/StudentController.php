<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        $data = Student::all();
        return view('dataSiswa', compact('data'));
    }

    public function tambah()
    {
        return view('tambahData');
    }

    public function insertdata(Request $request)
    {
        $data = Student::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotosiswa/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }

        return redirect()->route('siswa')->with('success', 'Data berhasil ditambahkan!');
    }

    public function tampildata($id)
    {
        $data = Student::find($id);
        
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Student::find($id);
        $data->update($request->all());

        return redirect()->route('siswa')->with('success', 'Data berhasil diubah!');
    }

    public function delete($id)
    {
        $data = Student::find($id);
        $image_name = $data->foto; // Menggunakan $data->foto sesuai dengan kolom gambar yang Anda gunakan
        $image_path = public_path('fotosiswa/' . $image_name);
        
        if (file_exists($image_path)) {
            unlink($image_path); // Menghapus gambar jika ada
        }
    
        $data->delete();
    
        return redirect()->route('siswa')->with('success', 'Data berhasil dihapus!');
    }

}
