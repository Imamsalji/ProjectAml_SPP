@extends('layouts.master')
@section('title', 'Data Siswa')
@section('pagetitle')
    <h1>Data User</h1>
@endsection
@section('content')
<div class="section-body">
<div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <h4>Buat SPP</h4>
          </div>

          <div class="card-body">

            <div>
              <form action="{{route('spp.create')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                  <label for="exampleInputPassword1">Tahun</label>
                  <input name="tahun" type="text" class="form-control" id="name">
                </div>
               
                <div class="form-group">
                  <label for="exampleInputPassword1">Nominal</label>
                  <input name="nominal" type="text" class="form-control" id="name">
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
                          <th scope="col">Tahun</th>
                          <th scope="col">Nominal</th>
                        
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($spp as $spp)
                        <tr>
                          <td>{{$spp->id}}</td>
                          <td>{{$spp->tahun}}</td>
                          <td>{{$spp->nominal}}</td>
                         
                          <td>
                            <a class="btn btn-info" href="{{ route('spp.edit', $spp->id)}}">Edit</a>
                            <a class="btn btn-danger" href="{{ route('spp.delete', $spp->id)}}" onclick="return confirm('yakin akan di hapus?')">Delete</a>
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