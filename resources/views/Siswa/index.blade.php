@extends('layouts.master')
@section('title', 'Siswa')
@section('pagetitle')
    <h1>Keterangan Siswa</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
           <a href="{{ route('Siswa.create') }}" class="btn btn-outline-primary"><i class="far fa-edit"></i>Masukan Siswa</a>
           <hr>
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
                    <th>NISN</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Alamat</th>
                    <th>Nomor telepon</th>
                    <th>SPP</th>
                    <th>Action</th>
                </tr>
               </thead>
               <tbody>
                @foreach ($siswa as $item)
                <tr> 
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->nisn }}</td>
                    <td>{{ $item->nama }}</td>
                    <td>{{ $item->kelas->nama_kelas }}</td>
                    <td>{{ $item->alamat }}</td>
                    <td>{{ $item->no_telp }}</td>
                    <td>{{ $item->spp->nominal }}</td>
                    <td>
                        <a href="{{route('Siswa.edit', $item->id)}}" class="btn btn-outline-warning">Edit </a>
                        <form action="{{ route('Siswa.destroy',$item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Yakin hapus data?')" class="btn btn-outline-danger">Delete</button>
                        </form>
                    </td>
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
