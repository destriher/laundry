@extends('layouts.master')
 
@section('content')
 
<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>


                    <a href="{{ url('transaksi-pesanan') }}" class="btn btn-sm btn-flat btn-primary"><i class="fa fa-backward"></i> Kembali</a>
                </p>
            </div>
            <div class="box-body">
               
                <form role="form" method="post" action="{{ url('transaksi-pesanan/'.$dt->id) }}">
                    @csrf
                    {{ method_field('PUT') }}
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Customer</label>
                      <select class="form-control select2" name="customer">
                          @foreach($customer as $cs)
                          <option value="{{ $cs->id }}" {{ ($dt->customer == $cs->id ? 'selected' : '') }}>{{ $cs->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Paket Laundry</label>
                      <select class="form-control select2" name="paket">
                          @foreach($paket as $pk)
                          <option value="{{ $pk->id }}" {{ ($dt->paket == $pk->id) ? 'selected' : '' }}>{{ $pk->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Berat (Kg)</label>
                      <input type="number" name="berat" class="form-control" value="{{ $dt->berat }}">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Status Pesanan</label>
                      <select class="form-control select2" name="status_pesanan">
                          @foreach($status_pesanan as $sp)
                          <option value="{{ $sp->id }}" {{ ($dt->status_pesanan == $sp->id) ? 'selected' : '' }}>{{ $sp->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Status Pembayaran</label>
                      <select class="form-control select2" name="status_pembayaran">
                          @foreach($status_pembayaran as $sb)
                          <option value="{{ $sb->id }}" {{ ($dt->status_pembayaran == $sb->id) ? 'selected' : '' }}>{{ $sb->nama }}</option>
                          @endforeach
                      </select>
                    </div>


                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>

            </div>
        </div>
    </div>
</div>
 
@endsection
 
@section('scripts')
 
<script type="text/javascript">
    $(document).ready(function(){
 
        // btn refresh
        $('.btn-refresh').click(function(e){
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })
 
    })
</script>
 
@endsection