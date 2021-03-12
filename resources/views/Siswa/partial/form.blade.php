<div class="card-body">

      <div class="form-group">
          <label for="nisn">NISN</label>
          <input type="number" name="nisn" id="nisn" class="form-control"
              value="{{ $siswa->nisn }}">
      </div>
      @error('nisn')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="nama">nama</label>
          <input type="text" name="nama" id="nama" class="form-control"
              value="{{ old('nama') ?? $siswa->nama }}">
      </div>
      @error('nama')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="alamat">alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control"
              value="{{ old('alamat') ?? $siswa->alamat }}">
      </div>
      @error('alamat')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="no_telp">no_telp</label>
          <input type="number" name="no_telp" id="no_telp" class="form-control"
              value="{{ old('no_telp') ?? $siswa->no_telp }}">
      </div>
      @error('no_telp')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="id_kelas">id_kelas</label>
          <select class="form-control" name="id_kelas" id="id_kelas">
                <option value disable>Pilih Kelas</option>
                @foreach ($kelas as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kelas }} </option>
                @endforeach
            </select>
      </div>
      @error('id_spp')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <div class="form-group">
          <label for="id_spp">id_spp</label>
          <select class="form-control" name="id_spp" id="id_spp">
                <option value disable>Pilih Petugas</option>
                @foreach ($spp as $item)
                <option value="{{ $item->id }}">{{ $item->tahun }} - {{ $item->nominal }}</option>
                @endforeach
            </select>
      </div>
      @error('id_spp')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

  </div>
  <div class="card-footer">
      <a href="{{ route('pembayaran.index') }}" class="btn btn-danger mr-2" style="border-radius: 0;">Back</a>
      <button type="submit" class="btn btn-success">{{ $submit ?? 'Update' }}</button>
  </div>
