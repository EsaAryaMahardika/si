<?php

namespace App\Http\Controllers;

use App\Models\aturan;
use App\Models\gejala;
use App\Models\kerusakan;
use App\Models\laporan;
use App\Models\login;
use App\Models\pengguna;
use App\Models\tutorial;
use App\Models\teknisi;
use App\Models\provinsi;
use App\Models\kabupaten;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class DBController extends Controller
{
    //<--- Dashboard --->//
    public function dashboard()
    {
        $aturan = aturan::all();
        $gejala = gejala::all();
        $kerusakan = kerusakan::all();
        $laporan = laporan::all();
        $login = login::all();
        $pengguna = pengguna::all();
        $tutorial = tutorial::all();
        $teknisi = teknisi::all();
        return view('admin/dashboard');
    }
    // <--- Kerusakan ---> //
    public function crash()
    {
        $tutorial = tutorial::all();
        $kerusakan = DB::table('kerusakan')
            ->join('tutorial', 'kerusakan.tutorial_id', '=', 'tutorial.id')
            ->select('kerusakan.id as id_crash', 'kerusakan.nama as crash', 'kerusakan.deskripsi', 'kerusakan.tutorial_id', 'tutorial.nama as tutorial')
            ->get();
        return view('admin/crash', compact('kerusakan', 'tutorial'));
    }
    public function crash_input(Request $request)
    {
        kerusakan::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/crash');
    }
    public function crash_update(Request $request, $id)
    {
        $kerusakan = kerusakan::find($id);
        $kerusakan->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/crash');
    }
    public function crash_delete($id)
    {
        $kerusakan = kerusakan::find($id);
        $kerusakan->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/crash');
    }
    // <--- Teknisi --->//
    public function engineer()
    {
        $prov = provinsi::all();
        $teknisi = teknisi::all();
        return view('admin/engineer', compact('teknisi', 'prov'));
    }
    public function engineer_input(Request $request)
    {
        teknisi::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/engineer');
    }
    public function engineer_update(Request $request, $id)
    {
    }
    public function engineer_delete()
    {
    }
    //<--- Gejala --->//
    public function gejala()
    {
        $gejala = gejala::all();
        return view('admin/gejala', compact('gejala'));
    }
    public function gejala_input(Request $request)
    {
        gejala::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/gejala');
    }
    public function gejala_update(Request $request, $id)
    {
        $gejala = gejala::find($id);
        $gejala->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/gejala');
    }
    public function gejala_delete($id)
    {
        $gejala = gejala::find($id);
        $gejala->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/gejala');
    }
    //<--- Laporan --->//
    public function report()
    {
        $laporan = laporan::all();
        return view('admin/report', compact('laporan'));
    }
    //<--- Aturan --->//
    public function rule()
    {
        $aturan = aturan::join('kerusakan', 'kerusakan.id', '=', 'aturan.id_rusak')
            ->join('gejala', 'gejala.id', '=', 'aturan.id_gejala')
            ->select('aturan.id', 'aturan.id_rusak', 'aturan.id_gejala', 'gejala.keterangan as gejala', 'kerusakan.nama as crash')
            ->get();
        $gejala = gejala::all();
        $crash = kerusakan::all();
        return view('admin/rule', compact('aturan','gejala','crash'));
    }
    public function rule_input(Request $request)
    {
        aturan::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/rule');
    }
    public function rule_update()
    {
    }
    public function rule_delete()
    {
    }
    //<--- Tutorial --->//
    public function tutorial()
    {
        $tutorial = tutorial::all();
        return view('admin/tutorial', compact('tutorial'));
    }
    public function tutorial_input(Request $request)
    {
        $path = $request->file('file')->store('tutorial');
        $filePath = pathinfo($path, PATHINFO_BASENAME);
        tutorial::create([
            'nama' => $request->input('nama'),
            'file' => $filePath,
        ]);
        Session::flash('success', 'Data berhasil ditambahkan');
        return redirect('/tutorial');
    }
    public function tutorial_update(Request $request, $id)
    {
        $tutorial = tutorial::find($id);
        if ($request->file('file')) {
            $path = $request->file('file')->store('tutorial');
            $filePath = pathinfo($path, PATHINFO_BASENAME);
            $tutorial->update([
                'nama' => $request->input('nama'),
                'file' => $filePath,
            ]);
        } else {
            $tutorial->update([
                'nama' => $request->input('nama')
            ]);
        }
        Session::flash('success', 'Data berhasil diubah');
        return redirect('/tutorial');
    }
    public function tutorial_delete($id)
    {
        $tutorial = tutorial::find($id);
        $tutorial->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/tutorial');
    }
    //<--- User --->//
    public function user()
    {
        $pengguna = pengguna::all();
        return view('admin/user', compact('pengguna'));
    }
    public function user_update(Request $request, $id)
    {
        $pengguna = pengguna::find($id);
        $pengguna->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/user');
    }
    public function user_delete($id)
    {
        $pengguna = pengguna::find($id);
        $pengguna->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/user');
    }
    //<--- Provinsi --->//
    public function provinsi()
    {
        $provinsi = provinsi::all();
        return view('admin/provinsi', compact('provinsi'));
    }
    public function provinsi_input(Request $request)
    {
        provinsi::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/provinsi');
    }
    public function provinsi_update(Request $request, $id)
    {
        $provinsi = provinsi::find($id);
        $provinsi->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/provinsi');
    }
    public function provinsi_delete($id)
    {
        $provinsi = provinsi::find($id);
        $provinsi->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/provinsi');
    }
    //<--- Kabupaten --->//
    public function kabupaten()
    {
        $kabupaten = DB::table('kabupaten')
            ->join('provinsi', 'provinsi.id', '=', 'kabupaten.id_prov')
            ->select('kabupaten.id as id_kab', 'kabupaten.nama as nama_kab', 'kabupaten.id_prov', 'provinsi.nama as nama_prov')
            ->get();
        $provinsi = provinsi::all();
        return view('admin/kabupaten', compact('kabupaten','provinsi'));
    }
    public function kabupaten_input(Request $request)
    {
        kabupaten::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/kabupaten');
    }
    public function kabupaten_update(Request $request, $id)
    {
        $kabupaten = kabupaten::find($id);
        $kabupaten->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/kabupaten');
    }
    public function kabupaten_delete($id)
    {
        $kabupaten = kabupaten::find($id);
        $kabupaten->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/kabupaten');
    }
    public function kab($id)
    {
        $data = kabupaten::where('id_prov', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
}
