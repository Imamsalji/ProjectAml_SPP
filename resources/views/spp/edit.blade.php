@extends('layouts.master')
@section('title', 'Edit User')
@section('pagetitle')
    <h1>Edit User</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">
        <div class="card">
				<div class="card-header">
					<h4>Edit SPP</h4>
				</div>
				<div class="card-body">
					<div>
						<div class="row" style="margin-left: -150px;">
						</div>

						<div class="row" style="margin-left: -150px;">
							<div class="col-md-8 offset-sm-2">
								<form action="{{route('spp.update', $spp->id)}}" method="POST">
									{{csrf_field()}}

									<div class="form-group">
										
										<div class="form-group">
											<label for="exampleInputPassword1">tahun</label>
											<input name="tahun" type="text" class="form-control" id="exampleInputPassword1" value="{{$spp->tahun}}">
										</div>

										<div class="form-group">
											<label for="exampleInputPassword1">nominal</label>
											<input name="nominal" type="text" class="form-control" id="exampleInputPassword1" value="{{$spp->nominal}}">
										</div>




									</div>
							</div>


							<button type="submit" style="margin-left: 70%;" class="btn btn-primary mb-3">save</button>
							</form>

						</div>
					</div>
					<canvas id="myChart" height="158"></canvas>
				</div>
			</div>
    </div>
</div>
@endsection

@push('page-scripts')
    
@endpush
