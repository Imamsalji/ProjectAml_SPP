<div class="card-body">

      <div class="form-group">
          <label for="nisn">NISN</label>
          <input type="number" name="nisn" id="nisn" class="form-control"
              value="{{ Request::is('Siswa/create') ? '' : $siswa->nisn }}">
      @error('nisn')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="nama">nama</label>
          <input type="text" name="nama" id="nama" class="form-control"
              value="{{ old('nama') ?? $siswa->nama }}">
      @error('nama')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="alamat">alamat</label>
          <input type="text" name="alamat" id="alamat" class="form-control"
              value="{{ old('alamat') ?? $siswa->alamat }}">
      @error('alamat')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="no_telp">no_telp</label>
          <input type="number" name="no_telp" id="no_telp" class="form-control"
              value="{{ old('no_telp') ?? $siswa->no_telp }}">
      @error('no_telp')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="id_kelas">id_kelas</label>
          <select class="form-control" name="id_kelas" id="id_kelas">
                <option value="{{ Request::is('Siswa/create') ? '' : $siswa->kelas->id }}">{{ Request::is('Siswa/create') ? 'Pilih Kelas' : $siswa->kelas->nama_kelas }}</option>
                @foreach ($kelas as $item)
                <option value="{{ $item->id }}">{{ $item->nama_kelas }} </option>
                @endforeach
            </select>
      @error('id_kelas')
          <span class=" text-danger">
              <strong>{{ $message }}</strong>
          </span>
      @enderror
      </div>

      <div class="form-group">
          <label for="id_spp">id_spp</label>
          <select class="form-control" name="id_spp" id="id_spp">
                <option value="{{ Request::is('Siswa/create') ? '' : $siswa->spp->id }}">{{ Request::is('Siswa/create') ? 'pilih nominal spp' : $siswa->spp->nominal }}</option>
                @foreach ($spp as $item)
                <option value="{{ $item->id }}">{{ $item->tahun }} - {{ $item->nominal }}</option>
                @endforeach
            </select>
      @error('id_spp')
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
