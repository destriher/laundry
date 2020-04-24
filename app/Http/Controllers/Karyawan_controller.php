<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class Karyawan_controller extends Controller
{
    public function index(){
    	$title = 'Master Karyawan';
    	$data = User::whereNull('role')->get();

    	return view('karyawan.index',compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah karyawan';

    	return view('karyawan.add',compact('title'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'email'=>'required',
    		'name'=>'required'
    	]);

    	$data['email'] = $request->email;
    	$data['name'] = $request->name;
    	$data['password'] = bcrypt('123');
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	User::insert($data);

    	return redirect('karyawan');
    }

    public function edit($id){
    	$dt = User::find($id);
    	$title = "Edit Karyawan $dt->name";

    	return view('karyawan.edit',compact('title','dt'));
    }

    public function update(Request $request, $id){
    	$this->validate($request,[
    		'email'=>'required',
    		'name'=>'required'
    	]);

    	$data['email'] = $request->email;
    	$data['name'] = $request->name;
    	// $data['password'] = bcrypt('123');
    	// $data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	User::where('id',$id)->update($data);

    	return redirect('karyawan');
    }

    public function delete($id){
    	try {
    		User::where('id',$id)->delete();

    		\Session::flash('sukses','Data berhasil dihapus');
    	} catch (\Exception $e) {
    		\Session::flash('gagal',$e->getMessage());
    	}

    	return redirect('karyawan');
    }
}
