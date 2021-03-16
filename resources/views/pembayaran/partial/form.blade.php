    <div class="card-body">
      <div class="form-group">
          <label for="id_petugas">id_petugas</label>
            <select class="form-control" name="id_petugas" id="id_petugas">
                <option value disable>Pilih Petugas</option>
                @foreach ($petugas as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
      @error('id_petugas')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="nisn">nisn</label>
            <select class="form-control" name="nisn" id="nisn">
                <option value disable>Pilih Siswa</option>
                @foreach ($siswa as $item)
                <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->nisn }}</option>
                @endforeach
            </select>
      @error('nisn')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="tgl_bayar">Tanggal Pembayaran</label>
          <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control"
              value="{{ old('tgl_bayar') ?? $pembayaran->tgl_bayar }}">
      @error('tgl_bayar')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="bulan_dibayar">Bulan dibayar</label>
          <input type="mounth" name="bulan_dibayar" id="bulan_dibayar" class="form-control"
              value="{{ old('bulan_dibayar') ?? $pembayaran->bulan_dibayar }}">
      @error('bulan_dibayar')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="tahun_dibayar">tahun_dibayar</label>
          <input type="text" name="tahun_dibayar" id="tahun_dibayar" class="form-control"
              value="{{ old('tahun_dibayar') ?? $pembayaran->tahun_dibayar }}">
      @error('tahun_dibayar')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="id_spp">nominal spp</label>
          <select class="form-control" name="id_spp" id="id_spp">
                <option value disable>Nominal</option>
                @foreach ($spp as $item)
                <option value="{{ $item->id }}">{{ $item->nominal }}</option>
                @endforeach
            </select>
            @error('id_spp')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
      

      <div class="form-group">
          <label for="jumlah_pembayaran">jumlah_pembayaran</label>
          <input type="text" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control"
              value="{{ old('jumlah_pembayaran') ?? $pembayaran->jumlah_pembayaran }}">
            @error('jumlah_pembayaran')
                <span class=" text-danger">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
      </div>
      

      <div class="form-group">
          <label for="status">status Pembayaran</label>
        <select class="form-control" name="status" id="status">
            <option value disable>Pilih Status Pembayaran</option>
            <option value="BelumBayar">Belum bayar</option>
            <option value="SudahBayar">Sudah Bayar</option>
        </select>
        @error('status')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>
      

    


  </div>
  <div class="card-footer">
      <a href="{{ route('pembayaran.index') }}" class="btn btn-danger mr-2" style="border-radius: 0;">Back</a>
      <button type="submit" class="btn btn-success">{{ $submit ?? 'Update' }}</button>
  </div>
