<!DOCTYPE html>
<html>
<head>
    <title>Laporan Peminjaman</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    
    <style>
p {
  align:justivy;
   padding-top: 20px;
   padding-right: 50px;
   padding-bottom: 800px;
   padding-left: 0px;
}
</style>
</head>
<body onafterprint="redirect()">
    <br>
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-dark">
            <tr>
                    <th>No</th>
                    <th>id_petugas</th>
                    <th>nisn</th>
                    <th>tgl_bayar</th>
                    <th>Bulan Bayar</th>
                    <th>tahun_dibayar</th>
                    <th>id_spp</th>
                    <th>jumlah_pembayaran</th>
                    <th>tanggal data masuk</th>
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
                    <td>{{ $item->status }}</td>

            </tr>
            @endforeach
        </table>
    </div>
</body>
 <br>
 <br>
 
 
 <h6 align="right">
@php $tgl=date('d-m-Y'); @endphp
   Bogor,{{$tgl}} 
   </br>
Kepala Sekolah

</h6>
</br>
</br>
</br>
</br>
</br>

<h6 align="right"> 
Mohamad Imam Salji S.Kom

</h6>
<script type="text/javascript">
    window.print();
</script>


<script type="text/javascript">
    function redirect() {
        window.location.href = '@php echo $redirect; @endphp';
    }
</script>
</html>