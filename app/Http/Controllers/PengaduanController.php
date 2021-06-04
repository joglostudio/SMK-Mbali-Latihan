<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Auth;

class PengaduanController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $model = Pengaduan::where('nik', Auth::user()->nik)
                    ->paginate(10);

        return view('home.pengaduan.index')->with([
            'model' => $model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('home.pengaduan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $model = new Pengaduan;
        $model->tgl_pengaduan = date('Y-m-d');
        $model->nik = Auth::user()->nik;
        $model->isi_laporan = $request->input('isi_laporan');
        $model->status = '0';
        if($model->save()) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = md5($model->id) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/pengaduan', $filename);

                $model->foto = $filename;
                $model->save();
            }
        }
        
        return redirect()->route('pengaduan.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pengaduan $pengaduan)
    {
        if(Auth::user()->nik !== $pengaduan->nik && $pengaduan->status != '0') {
            abort(404);
        }

        return view('home.pengaduan.edit')->with([
            'pengaduan' => $pengaduan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pengaduan $pengaduan)
    {
        if(Auth::user()->nik !== $pengaduan->nik && $pengaduan->status != '0') {
            abort(404);
        }

        $request->validate([
            'isi_laporan' => 'required|min:10',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $pengaduan->isi_laporan = $request->input('isi_laporan');
        $pengaduan->status = '0';
        if($pengaduan->save()) {
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = md5($pengaduan->id) . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/pengaduan', $filename);

                $pengaduan->foto = $filename;
                $pengaduan->save();
            }
        }
        
        return redirect()->route('pengaduan.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pengaduan $pengaduan)
    {
        if(Auth::user()->nik !== $pengaduan->nik && $pengaduan->status != '0') {
            abort(404);
        }
        
        if($pengaduan->delete()) {
            return redirect()->route('pengaduan.index');
        }
    }
}
