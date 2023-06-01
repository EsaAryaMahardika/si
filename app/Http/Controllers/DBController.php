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

class DBController extends Controller
{
    //<--- Dashboard --->//
    public function dashboard()
    {
        $nama = 'Dashboard';
        $aturan = aturan::all();
        $gejala = gejala::all();
        $kerusakan = kerusakan::all();
        $laporan = laporan::all();
        $login = login::all();
        $pengguna = pengguna::all();
        $tutorial = tutorial::all();
        $teknisi = teknisi::all();
        return view('admin/dashboard', ['nama' => $nama]);
    }
    // <--- Kerusakan ---> //
    public function crash()
    {
        $nama = 'Kerusakan';
        $kerusakan = kerusakan::all();
        $tutorial = tutorial::get(['id', 'nama']);
        return view('admin/crash', ['nama' => $nama, 'kerusakan' => $kerusakan, 'tutorial' => $tutorial]);
    }
    public function crash_input(Request $request)
    {
        kerusakan::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/crash');
    }
    public function crash_update(Request $request, $id)
    {
        kerusakan::all();
        return redirect('/crash');
        // $kerusakan = kerusakan::with('tutorial')->findOrFail($id);
        // $tutorial = tutorial::where('id', '!=', $kerusakan->tutorial_id)->get(['id', 'nama']);
        // return view('crash', ['kerusakan' => $kerusakan, 'tutorial' => $tutorial]);
    }
    public function crash_delete()
    {
    }
    // <--- Teknisi --->//
    public function engineer()
    {
        $nama = 'Teknisi';
        $teknisi = teknisi::all();
        return view('admin/engineer', ['nama' => $nama], ['teknisi' => $teknisi]);
    }
    public function engineer_input(Request $request)
    {
        teknisi::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/engineer');
    }
    public function engineer_update()
    {
    }
    public function engineer_delete()
    {
    }
    //<--- Gejala --->//
    public function gejala()
    {
        $nama = 'Gejala';
        $gejala = gejala::all();
        return view('admin/gejala', ['nama' => $nama], ['gejala' => $gejala]);
    }
    public function gejala_input(Request $request)
    {
        gejala::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/gejala');
    }
    public function gejala_update()
    {
    }
    public function gejala_delete()
    {
    }
    //<--- Laporan --->//
    public function report()
    {
        $nama = 'Laporan';
        $laporan = laporan::all();
        return view('admin/report', ['nama' => $nama], ['laporan' => $laporan]);
    }
    //<--- Aturan --->//
    public function rule()
    {
        $nama = 'Aturan';
        $aturan = aturan::all();
        return view('admin/rule', ['nama' => $nama], ['aturan' => $aturan]);
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
        $nama = 'Tutorial';
        $tutorial = tutorial::all();
        return view('admin/tutorial', ['nama' => $nama], ['tutorial' => $tutorial]);
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
    public function tutorial_update()
    {
    }
    public function tutorial_delete()
    {
    }
    //<--- User --->//
    public function user()
    {
        $nama = 'Pengguna';
        $pengguna = pengguna::all();
        return view('admin/user', ['nama' => $nama], ['pengguna' => $pengguna]);
    }
    public function user_update()
    {
    }
    public function user_delete()
    {
    }
    //<--- Provinsi --->//
    public function provinsi()
    {
        $nama = 'Provinsi';
        $provinsi = provinsi::all();
        return view('admin/provinsi', ['nama' => $nama], ['provinsi' => $provinsi]);
    }
    public function provinsi_input(Request $request)
    {
        provinsi::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/provinsi');
    }
    public function provinsi_update()
    {
        $provinsi = provinsi::all();
        return view('admin/provinsi', ['provinsi' => $provinsi]);
    }
    public function provinsi_delete()
    {
    }
    //<--- Kabupaten --->//
    public function kabupaten()
    {
        $nama = 'Kabupaten';
        $kabupaten = kabupaten::all();
        return view('admin/kabupaten', ['nama' => $nama], ['kabupaten' => $kabupaten]);
    }
    public function kabupaten_input(Request $request)
    {
        kabupaten::create($request->all());
        Session::flash('success', 'Data berhasil ditambahkan.');
        return redirect('/kabupaten');
    }
    public function kabupaten_update()
    {
    }
    public function kabupaten_delete()
    {
    }
    public function prov()
    {
        $data = provinsi::where('nama', 'LIKE', '%'.request('q').'%')->get();
        return response()->json($data);
    }
    public function kab($id)
    {
        $data = kabupaten::where('id_prov', $id)->where('nama', 'LIKE', '%'.request('q').'%');
        return response()->json($data);
    }
}
