@extends('layouts.master')
@section('title', 'Pembayaran')
@section('pagetitle')
    <h1>Transaksi</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        @if (auth()->user()->level=="petugas" || auth()->user()->level=="admin"  )
           <a href="{{ route('pembayaran.create') }}" class="btn btn-outline-primary"><i class="far fa-edit"></i>Masukan pembayaran</a>
           <hr>
        @endif
           <div class="card">
               <div class="card-body">
                @if (session('message'))
                <div class="alert alert-success alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('message') }}
                    </div>
                </div>
                @elseif (session('delete'))
                <div class="alert alert-danger alert-dismissible show fade">
                    <div class="alert-body">
                        <button class="close" data-dismiss="alert">
                            <span>x</span>
                        </button>
                        {{ session('delete') }}
                    </div>
                </div>
                @endif
                <div class="table-responsive">
           <table id="table" class="table table-striped table-bordered table-md">
               <thead>
                <tr>
                    <th>No</th>
                    <th>id_petugas</th>
                    <th>nisn</th>
                    <th>tgl_bayar</th>
                    <th>Bulan Bayar</th>
                    <th>tahun_dibayar</th>
                    <th>id_spp</th>
                    <th>jumlah_pembayaran</th>
                    <th>Status Pembayaran</th>
                    @if (auth()->user()->level=="petugas" || auth()->user()->level=="admin"  )
                    <th>Action</th>
                    @endif
                </tr>
               </thead>
               <tbody>
                @foreach ($pembayaran as $item)
                <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->petugas->name }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->bulan_dibayar }}</td>
                    <td>{{ $item->tgl_bayar }}</td>
                    <td>{{ $item->tahun_dibayar }}</td>
                    <td>{{ $item->spp->spp->nominal }}</td>
                    <td>{{ $item->jumlah_pembayaran }}</td>
                    <td>
                    <div class="alert alert-{{  $item->status == 'SudahBayar'  ? 'success' : 'danger' }} alert-dismissible show fade">
                        <div class="alert-body">
                        {{ $item->status }}
                        </div>
                    </div>
                    @if (auth()->user()->level=="petugas" || auth()->user()->level=="admin"  )
                    @if ( $item->status =="BelumBayar")
                    <form action="{{ route('status', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="SudahBayar">
                        <button type="submit" class="btn btn-danger">jadikan SudahBayar
                    </form>
                    @endif
                    @endif
                    </td>
                    @if (auth()->user()->level=="petugas" || auth()->user()->level=="admin")
                    <td>
                        <a href="{{route('pembayaran.edit', $item->id)}}" class="btn btn-outline-warning">Edit</a>
                        <form action="{{ route('pembayaran.destroy',$item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
                @endforeach
               </tbody>
           </table>
           </div>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
  
@endpush

@push('after-script')
<script type="text/javascript">
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>
@endpush
