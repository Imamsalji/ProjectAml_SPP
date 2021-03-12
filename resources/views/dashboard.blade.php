@extends('layouts.master')
@section('title', 'Dashboard')
@section('pagetitle')
    <h1>Dashboard</h1>
@endsection
@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Partisipan Petugas</h4>
              </div>
              <div class="card-body">
                {{ $petugas }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-columns"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah kelas</h4>
              </div>
              <div class="card-body">
                {{ $kelas }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-clipboard-list"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>SPP Siswa</h4>
              </div>
              <div class="card-body">
                {{ $spp }}
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-comments-dollar"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Entri Transaksi</h4>
              </div>
              <div class="card-body">
                {{ $pembayaran }}
              </div>
            </div>
          </div>
        </div>
        
        <div class="col-12">
          <div class="card card-statistic-1" style="width: 100%;height: 500px">
            <canvas id="myChart"></canvas>
          </div>
        </div>

</div>
@endsection

@push('page-scripts')
    
@endpush

@push('after-script')
<script type="text/javascript" src="{{ asset('../assets/js/Chart.js') }}"></script>
<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: ["Petugas", "Siswa", "SPP", "Jumlah entri transaksi", "Siswa Sudah Bayar Spp", "Siswa Belum Bayar Spp"],
				datasets: [{
					label: '# of Votes',
					data: [{{ $petugas }}, {{ $siswa }}, {{ $spp }}, {{ $pembayaran }}, {{ $sudah }}, {{ $belum }}],
					backgroundColor: [
					'rgba(255, 99, 132, 0.2)',
					'rgba(54, 162, 235, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
					'rgba(153, 102, 255, 0.2)',
					'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
					'rgba(255,99,132,1)',
					'rgba(54, 162, 235, 1)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
					'rgba(153, 102, 255, 1)',
					'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
@endpush