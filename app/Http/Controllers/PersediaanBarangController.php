<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersediaanBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persediaanbarang = DB::table('persediaanbarang')->paginate(15);
        return view('persediaanbarang.index', ['persediaanbarang' => $persediaanbarang ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $persediaanbarang = DB::table('persediaanbarang')->where('namabarang', 'like', '%'.$search.'%')->paginate(15);
        return view('index', ['persediaanbarang' => $persediaanbarang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
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
            'kodebarang' => 'required',
            'namabarang' => 'required',
            'hargapokok' => 'required',
            'hargajual' => 'required',
            'jumlah' => 'required',
            'nilai' => 'required'
        ]);
        $kodebarang = $request->get('kodebarang');
        $namabarang = $request->get('namabarang');
        $hargapokok = $request->get('hargapokok');
        $hargajual = $request->get('hargajual');
        $jumlah = $request->get('jumlah');
        $nilai = $request->get('nilai');
        $persediaanbarang = DB::insert('insert into persediaanbarang(kodebarang, namabarang, hargapokok, hargajual, jumlah, nilai) value(?,?,?,?,?,?)', [$kodebarang, $namabarang, $hargapokok, $hargajual, $jumlah, $nilai]);
        if($persediaanbarang){
            $red = redirect('persediaanbarang')->with('succes', 'Data has been added');
        } else{
            $red = redirect('persediaanbarang/create')->with('danger', 'Input Data Failed, please try again');
        }
        return $red;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $persediaanbarang = DB::select('select * from persediaanbarang where id=?',[$id]);
        return view('.persediaanbarang.show', ['persediaanbarang'=> $persediaanbarang]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $persediaanbarang = DB::select('select * from persediaanbarang where id=?',[$id]);
        return view('edit', ['persediaanbarang' => $persediaanbarang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'kodebarang' => 'required',
            'namabarang' => 'required',
            'hargapokok' => 'required',
            'hargajual' => 'required',
            'jumlah' => 'required',
            'nilai' => 'required'
        ]);
        
        $kodebarang = $request->get('kodebarang');
        $namabarang = $request->get('namabarang');
        $hargapokok = $request->get('hargapokok');
        $hargajual = $request->get('hargajual');
        $jumlah = $request->get('jumlah');
        $nilai = $request->get('nilai');
        $persediaanbarang = DB::update('update persediaanbarang set kodebarang=?, namabarang=?, hargapokok=?, hargajual=?, jumlah=?, nilai=? where id=?',[$kodebarang, $namabarang, $hargapokok, $hargajual, $jumlah, $nilai, $id]);
        if($persediaanbarang){
            $red = redirect('persediaanbarang')->with('success','Data has been updated');
        } else{
            $red = redirect('persediaanbarang/edit/'.$id)->with('danger','Error Update please try again');
        }
        return $red;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persediaanbarang = DB::delete('delete from persediaanbarang where id=?',[$id]);
        $red = redirect('persediaanbarang');
        return $red;
    }

    public function deleteAll(Request $request)
    {
        $ids = $request->get('ids');
        $dbs = DB::delete('delete from persediaanbarang where id in ('.implode(",",$ids).')');
        return redirect('persediaanbarang');
    }
}

