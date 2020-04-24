<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Status_pembayaran;

class Status_pembayaran_controller extends Controller
{
    public function index(){
    	$title = 'Master status pembayaran';
    	$data = Status_pembayaran::orderBy('nama','asc')->get();

    	return view('status_pembayaran.index',compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah status pembayaran';

    	return view('status_pembayaran.add',compact('title'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'nama'=>'required'
    	]);

    	$data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Status_pembayaran::insert($data);

    	\Session::flash('sukses','Data berhasil ditambah');
    	return redirect('status-pembayaran');
    }

    public function edit($id){
    	$dt = Status_pembayaran::find($id);
    	$title = "Edit Status Pembayaran $dt->nama";

    	return view('status_pembayaran.edit',compact('title','dt'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'nama'=>'required'
    	]);

    	// $data['id'] = \Uuid::generate(4);
    	$data['nama'] = $request->nama;
        $data['urutan'] = $request->urutan;
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Status_pembayaran::where('id',$id)->update($data);

    	\Session::flash('sukses','Data berhasil diupdate');
    	return redirect('status-pembayaran');
    }

    public function delete($id){
    	try {
            Status_pembayaran::where('id',$id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }
    	return redirect('status-pembayaran');
    }
}
