    <div class="card-body">
      <div class="form-group">
          <label for="id_petugas">id_petugas</label>
            <select class="form-control" name="id_petugas" id="id_petugas">
                <option value disable>Pilih Petugas</option>
                @foreach ($petugas as $item)
                <option value="{{ $item->id }}">{{ $item->username }}</option>
                @endforeach
            </select>
      </div>
      @error('id_petugas')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="nisn">nisn</label>
            <select class="form-control" name="nisn" id="nisn">
                <option value disable>Pilih Petugas</option>
                @foreach ($siswa as $item)
                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                @endforeach
            </select>
      </div>
      @error('nisn')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="tgl_bayar">Tanggal Pembayaran</label>
          <input type="date" name="tgl_bayar" id="tgl_bayar" class="form-control"
              value="{{ old('tgl_bayar') ?? $pembayaran->tgl_bayar }}">
      </div>
      @error('tgl_bayar')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="bulan_dibayar">Bulan dibayar</label>
          <input type="text" name="bulan_dibayar" id="bulan_dibayar" class="form-control"
              value="{{ old('bulan_dibayar') ?? $pembayaran->bulan_dibayar }}">
      </div>
      @error('bulan_dibayar')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="tahun_dibayar">tahun_dibayar</label>
          <input type="text" name="tahun_dibayar" id="tahun_dibayar" class="form-control"
              value="{{ old('tahun_dibayar') ?? $pembayaran->tahun_dibayar }}">
      </div>
      @error('tahun_dibayar')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="id_spp">id_spp</label>
          <select class="form-control" name="id_spp" id="id_spp">
                <option value disable>Pilih Petugas</option>
                @foreach ($spp as $item)
                <option value="{{ $item->id }}">{{ $item->id_spp }}</option>
                @endforeach
            </select>
      </div>
      @error('id_spp')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="jumlah_pembayaran">jumlah_pembayaran</label>
          <input type="text" name="jumlah_pembayaran" id="jumlah_pembayaran" class="form-control"
              value="{{ old('jumlah_pembayaran') ?? $pembayaran->jumlah_pembayaran }}">
      </div>
      @error('jumlah_pembayaran')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
  </div>
  <div class="card-footer">
      <a href="{{ route('pembayaran.index') }}" class="btn btn-danger mr-2" style="border-radius: 0;">Back</a>
      <button type="submit" class="btn btn-success">{{ $submit ?? 'Update' }}</button>
  </div>
