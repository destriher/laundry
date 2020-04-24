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
               
                <form role="form" method="post" action="{{ url('transaksi-pesanan/add') }}">
                    @csrf
                  <div class="box-body">

                    <div class="form-group">
                      <label for="exampleInputEmail1">Customer</label>
                      <select class="form-control select2" name="customer">
                          @foreach($customer as $cs)
                          <option value="{{ $cs->id }}">{{ $cs->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Paket Laundry</label>
                      <select class="form-control select2" name="paket">
                          @foreach($paket as $pk)
                          <option value="{{ $pk->id }}">{{ $pk->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Berat (Kg)</label>
                      <input type="number" name="berat" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Status Pesanan</label>
                      <select class="form-control select2" name="status_pesanan">
                          @foreach($status_pesanan as $sp)
                          <option value="{{ $sp->id }}">{{ $sp->nama }}</option>
                          @endforeach
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Status Pembayaran</label>
                      <select class="form-control select2" name="status_pembayaran">
                          @foreach($status_pembayaran as $sb)
                          <option value="{{ $sb->id }}">{{ $sb->nama }}</option>
                          @endforeach
                      </select>
                    </div>


                  </div>
                  <!-- /.box-body -->
     
                  <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
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