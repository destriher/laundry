<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class Customer_controller extends Controller
{
    public function index(){
    	$title = 'Halaman customer';
    	$data = Customer::orderBy('nama','asc')->get();

    	return view('customer.index',compact('title','data'));
    }

    public function add(){
    	$title = 'Tambah Customer';

    	return view('customer.add',compact('title'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'email'=>'required',
    		'nama'=>'required',
    		'no_hp'=>'required',
    		'alamat'=>'required'
    	]);

    	$data['id'] = \Uuid::generate(4);
    	$data['email'] = $request->email;
    	$data['nama'] = $request->nama;
    	$data['no_hp'] = $request->no_hp;
    	$data['alamat'] = $request->alamat;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	Customer::insert($data);

    	\Session::flash('sukses','Data berhasil ditambah');

    	return redirect('customer');
    }

    public function edit($id){
        $dt = Customer::find($id);
        $title = "Edit customer $dt->nama";

        return view('customer.edit',compact('title','dt'));
    }

    public function update(Request $request,$id){
        $this->validate($request,[
            'email'=>'required',
            'nama'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required'
        ]);

        $data['email'] = $request->email;
        $data['nama'] = $request->nama;
        $data['no_hp'] = $request->no_hp;
        $data['alamat'] = $request->alamat;
        $data['updated_at'] = date('Y-m-d H:i:s');

        Customer::where('id',$id)->update($data);

        \Session::flash('sukses','Data berhasil di update');
        return redirect('customer');
    }

    public function delete($id){
        try {
            Customer::where('id',$id)->delete();

            \Session::flash('sukses','Data berhasil dihapus');

            
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect('customer');
    }
}
