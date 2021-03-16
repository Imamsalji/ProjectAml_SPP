@extends('layouts.master')
@section('title', 'Laporan Peminjaman')
@section('pagetitle')
    <h1>Laporan Pinjaman</h1>
@endsection
@section('content')
    
    <div class="row" class="form-control">
        <div class="col-lg-12 margin-tb">
                <form action="/laporan/cari" method="GET">
                    @csrf
                    <div class="form-row align-items-center">
                        <div class="col-auto">
                            <p>Tanggal Awal</p>
                            <input type="date" ¬ss="form-control @error('startDate') is-invalid @enderror mb-3" name="startDate" id="startDate">
                            @error('starDate')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                                @enderror
                    </div>
                        <div class="col-auto">
                            <label class="col-sm-2 mb-3"><b>-</b></label>
                        </div>
                        <div class="col-auto">
                            <p>Tanggal Akhir</p>
                            <input type="date" class="form-contorl @error('endDate')is-invalid @enderror mb-3" name="endDate" id="endDate">
                            @error('endDate')
                            <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                        </div>
                        <div class="col-auto">
                        <br>
                        <br>
                            <button type="submit" class="btn btn-primary mb-3">Cari</button>
                        </div>

                </form>
        </div>
    </div>
    <div class="table-responsive">
           <table id="example" class="table table-striped table-bordered table-md">
               <thead>
                <tr>
                    <th>No</th>
                    <th>petugas</th>
                    <th>nisn</th>
                    <th>tgl bayar</th>
                    <th>Bulan Bayar</th>
                    <th>tahun dibayar</th>
                    <th>spp</th>
                    <th>pembayaran</th>
                    <th>tanggal masuk</th>
                    <th>Status Pembayaran</th>
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
                    <td>{{ $item->created_at }}</td>
                    <td>
                    <div class="alert alert-{{  $item->status == 'SudahBayar'  ? 'success' : 'danger' }} alert-dismissible show fade">
                        <div class="alert-body">
                        {{ $item->status }}
                        </div>
                    </div>
                    </td>
                </tr>
                @endforeach
               </tbody>
           </table>
           </div>
     	
   </section>
@endsection

@push('page-scripts')
  
@endpush

@push('after-script')
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy',
            'csv',
            'excel',
            'pdf',
            {
                extend: 'print',
                text: 'Print all (not just selected)',
                exportOptions: {
                    modifier: {
                        selected: null
                    }
                }
            }
        ],
        select: true
    } );
} );
</script>
@endpush