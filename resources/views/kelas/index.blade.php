@extends('layouts.master')
@section('title', 'Kelas')
@section('pagetitle')
    <h1>Data Kelas</h1>
@endsection
@section('content')
<div class="section-body">
<div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Kelas</h4>
          </div>

          <div class="card-body">

            <div>
              <form action="{{route('kelas.create')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
            
                <div class="form-group">
                  <label for="exampleInputPassword1">Nama Kelas</label>
                  <input name="nama_kelas" type="text" class="form-control" id="name">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Kompetensi Keahlian</label>
                  <input name="kompetensi_keahlian" type="text" class="form-control" id="name">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>



            <div class="row">
              <div class="col-12 col-md-6 col-lg-12">
                <div class="card">


                  <div class="section-title">Table Tugas</div>
                  <div class="table-responsive">
                    <table class="table table-sm">
                      <thead>
                        <tr>
                          <th scope="col">id</th>
                          <th scope="col">Nama Kelas</th>
                          <th scope="col">Kompetensi Keahlian</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($kelas as $kelas)
                        <tr>
                          <td>{{$kelas->id}}</td>
                          <td>{{$kelas->nama_kelas}}</td>
                          <td>{{$kelas->kompetensi_keahlian}}</td>
                         
                          <td>
                            <a class="btn btn-info" href="{{ route('kelas.edit', $kelas->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('kelas.delete', $kelas->id)}}" onclick="return confirm('yakin akan di hapus?')">Delete</a>
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
