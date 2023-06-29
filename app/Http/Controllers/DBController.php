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
use Barryvdh\DomPDF\Facade\Pdf;

use function GuzzleHttp\Promise\all;

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
        aturan::create([
            'id_rusak' => $request->input('id_rusak')
        ]);
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
        $teknisi = teknisi::find($id);
        $teknisi->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/engineer');
    }
    public function engineer_delete($id)
    {
        $teknisi = teknisi::find($id);
        $teknisi->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/engineer');
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
        $relasi = kerusakan::with('gejala')->get();
        $aturan = aturan::all();
        $gejala = gejala::all();
        // $crash = kerusakan::all();
        return view('admin/rule', compact('relasi', 'aturan', 'gejala'));
    }
    public function rule_update(Request $request, $id)
    {
        $aturan = aturan::find($id);
        $aturan->update($request->all());
        Session::flash('success', 'Data berhasil diubah.');
        return redirect('/rule');
    }
    public function rule_delete($id)
    {
        $aturan = aturan::find($id);
        $aturan->delete();
        Session::flash('success', 'Data berhasil dihapus.');
        return redirect('/rule');
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
        $prov = provinsi::all();
        $pengguna = pengguna::all();
        return view('admin/user', compact('pengguna', 'prov'));
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
        $kabupaten = kabupaten::all();
        $provinsi = provinsi::all();
        return view('admin/kabupaten', compact('kabupaten', 'provinsi'));
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
    public function kabupaten_export()
    {
        $kabupaten = kabupaten::all();
        $pdf = Pdf::loadview('admin.export_kabupaten', compact('kabupaten'));
        return $pdf->download('export-kabupaten.pdf');
    }

    public function kab($id)
    {
        $data = kabupaten::where('id_prov', $id)->pluck('nama', 'id')->toArray();
        return response()->json($data);
    }
    public function select()
    {
        $gejala = gejala::all();
        return view('check', compact('gejala'));
    }
    public function check(Request $request)
    {
        $data = aturan::all();
        $aturan = [];
        foreach ($data as $a) {
            if (!isset($aturan[$a->id_rusak])) {
                $aturan[$a->id_rusak] = [];
            }
            array_push($aturan[$a->id_rusak], $a->id_gejala);
        }
        $gejala = [];
        foreach ($request->input('id') as $key) {
            array_push($gejala, $key);
        }
        $hasil = [];
        foreach ($aturan as $key => $rules) {
            foreach ($gejala as $value) {
                if (in_array($value, $rules)) {
                    if (!isset($hasil[$key])) {
                        $hasil[$key] = 1;
                    } else {
                        $hasil[$key] = $hasil[$key] + 1;
                    }
                }
            }
        }
        $penyakit = 0;
        if (count($hasil) > 0) {
            $max_keys = array_keys($hasil, max($hasil));
            $penyakit = $max_keys[0];
        }
        laporan::insert([
            'id_rusak' => $penyakit
        ]);
        $hasil = kerusakan::where('id', $penyakit)->value('nama');
        return view('laporan', compact('hasil'));
    }
}
