<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status_pesanan;

class Status_pesanan_controller extends Controller
{
    public function index(){
    	$title = 'status pesanan';
    	$data = Status_pesanan::orderBy('nama','asc')->get();

    	return view('status_pesanan.index',compact('title','data'));
    }

    public function add(){
    	$title = 'tambah status pesanan';

    	return view('status_pesanan.add',compact('title'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'nama'=>'required',
    		'urutan'=>'required'
    	]);

    	$data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
    	$data['urutan'] = $request->urutan;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Status_pesanan::insert($data);

    	\Session::flash('sukses','Data berhasil ditambah');
    	return redirect('status-pesanan');
    }

    public function edit($id){
    	$dt = Status_pesanan::find($id);
    	$title = "Edit status $dt->nama";

    	return view('status_pesanan.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'nama'=>'required',
    		'urutan'=>'required'
    	]);

    	// $data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');
    	$data['urutan'] = $request->urutan;

    	Status_pesanan::where('id',$id)->update($data);

    	\Session::flash('sukses','Data berhasil diupdate');
    	return redirect('status-pesanan');
    }

    public function delete($id){
    	try {
            Status_pesanan::where('id',$id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
    	return redirect('status-pesanan');
    }
}
