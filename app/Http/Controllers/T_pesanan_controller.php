<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;
use App\Models\Paket;
use App\Models\Status_pesanan;
use App\Models\Status_pembayaran;
use App\Models\T_pesanan;
use App\Models\Nama_usaha;

use PDF;

class T_pesanan_controller extends Controller
{
    public function index(){
        $title = 'Transaksi Pesanan';
        $data = T_pesanan::orderBy('created_at','desc')->get();

        return view('t_pesanan.index',compact('title','data'));
    }

    public function periode(Request $request){
        try {
            $dari = $request->dari;
            $sampai = $request->sampai;

            $title = "Transaksi Pesanan dari $dari sampai $sampai";

            $data = T_pesanan::whereDate('created_at','>=',$dari)->whereDate('created_at','<=',$sampai)->orderBy('created_at','desc')->get();

            return view('t_pesanan.index',compact('title','data'));
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());

            return redirect()->back();
        }
    }

    public function export($id){
        try {
            $dt = T_pesanan::find($id);
            $nama_usaha = Nama_usaha::first();

            $pdf = PDF::loadView('t_pesanan.pdf', ['dt'=>$dt, 'nama_usaha'=>$nama_usaha]);
            return $pdf->download('t_pesanan.pdf');
        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
            return redirect()->back();
        }


    }

    public function naikkan_status($id){
        try {
            $transaksi = T_pesanan::find($id);
            $id_status = $transaksi->status_pesanan;
            $urutan_status = $transaksi->status_pesanans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pesanan::where('urutan',$urutan_baru)->first();

            T_pesanan::where('id',$id)->update([
                'status_pesanan'=>$status_baru->id
            ]);

            \Session::flash('sukses','Status berhasil dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function naikkan_status_pembayaran($id){
        try {
            $transaksi = T_pesanan::find($id);
            $id_status = $transaksi->status_pembayaran;
            $urutan_status = $transaksi->status_pembayarans->urutan;

            $urutan_baru = $urutan_status + 1;
            $status_baru = Status_pembayaran::where('urutan',$urutan_baru)->first();

            T_pesanan::where('id',$id)->update([
                'status_pembayaran'=>$status_baru->id
            ]);

            \Session::flash('sukses','Status berhasil dinaikkan');

        } catch (\Exception $e) {
            \Session::flash('gagal',$e->getMessage());
        }

        return redirect()->back();
    }

    public function add(){
    	$title = 'Tambah Pesanan';
    	$customer = Customer::orderBy('nama','asc')->get();
    	$paket = Paket::orderBy('nama','asc')->get();
    	$status_pesanan = Status_pesanan::orderBy('urutan','asc')->get();
    	$status_pembayaran = Status_pembayaran::orderBy('nama','asc')->get();

    	return view('t_pesanan.add',compact('title','customer','paket','status_pesanan','status_pembayaran'));
    }

    public function store(Request $request){
    	$this->validate($request,[
    		'customer'=>'required',
    		'paket'=>'required',
    		'berat'=>'required',
    		'status_pesanan'=>'required',
    		'status_pembayaran'=>'required'
    	]);

    	$data['id'] = \Uuid::generate(4);
    	$data['customer'] = $request->customer;
    	$data['paket'] = $request->paket;
    	$data['berat'] = $request->berat;
    	$data['status_pembayaran'] = $request->status_pembayaran;
    	$data['status_pesanan'] = $request->status_pesanan;
    	$data['created_at'] = date('Y-m-d H:i:s');
    	$data['updated_at'] = date('Y-m-d H:i:s');

    	$harga = Paket::find($request->paket);
    	$harga_paket = $harga->harga;
    	$berat = $request->berat;

    	$grand_total = $harga_paket * $berat;

    	$data['grand_total'] = $grand_total;

    	T_pesanan::insert($data);

    	\Session::flash('sukses','Transaksi berhasil ditambah');

    	return redirect('transaksi-pesanan/add');
    }

    public function edit($id){
        $dt = T_pesanan::find($id);
        $title = "Edit Transaksi";
        $customer = Customer::orderBy('nama','asc')->get();
        $paket = Paket::orderBy('nama','asc')->get();
        $status_pesanan = Status_pesanan::orderBy('urutan','asc')->get();
        $status_pembayaran = Status_pembayaran::orderBy('nama','asc')->get();

        return view('t_pesanan.edit',compact('title','customer','paket','status_pesanan','status_pembayaran','dt'));
    }

    public function update(Request $request, $id){
        $this->validate($request,[
            'customer'=>'required',
            'paket'=>'required',
            'berat'=>'required',
            'status_pesanan'=>'required',
            'status_pembayaran'=>'required'
        ]);

        // $data['id'] = \Uuid::generate(4);
        $data['customer'] = $request->customer;
        $data['paket'] = $request->paket;
        $data['berat'] = $request->berat;
        $data['status_pembayaran'] = $request->status_pembayaran;
        $data['status_pesanan'] = $request->status_pesanan;
        // $data['created_at'] = date('Y-m-d H:i:s');
        $data['updated_at'] = date('Y-m-d H:i:s');

        $harga = Paket::find($request->paket);
        $harga_paket = $harga->harga;
        $berat = $request->berat;

        $grand_total = $harga_paket * $berat;

        $data['grand_total'] = $grand_total;

        T_pesanan::where('id',$id)->update($data);

        \Session::flash('sukses','Transaksi berhasil diupdate');

        return redirect('transaksi-pesanan');
    }

    public function delete($id){
        T_pesanan::where('id',$id)->delete();

        \Session::flash('sukses','Data berhasil dihapus');
        return redirect('transaksi-pesanan');
    }
}
