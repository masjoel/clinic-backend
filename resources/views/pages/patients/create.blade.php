@extends('layouts.app')

@section('title', $title)

@push('style')
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                @include('pages.patients.breadcrumb')
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('patients.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-2">
                                        <label>Nama</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>NIK</label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror" name="nik"
                                                    value="{{ old('nik') }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>KK</label>
                                                <input type="text" class="form-control @error('kk') is-invalid @enderror"
                                                    name="kk" value="{{ old('kk') }}">
                                                @error('kk')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nomor HP</label>
                                                <input type="number"
                                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                    value="{{ old('phone') }}">
                                                @error('phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                                    value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Jenis Kelamin</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="gender" value="Laki-laki"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Laki-laki</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="gender" value="Perempuan"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Perempuan</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control @error('birth_place') is-invalid @enderror"
                                                    name="birth_place" value="{{ old('birth_place') }}">
                                                @error('birth_place')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tgl. Lahir</label>
                                                <input type="date"
                                                    class="form-control @error('birth_date') is-invalid @enderror"
                                                    name="birth_date" value="{{ old('birth_date') }}">
                                                @error('birth_date')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="control-label float-left">Status Kematian</div>
                                        <label class="custom-switch mt-0">
                                            <input type="checkbox" id="is_deceased" class="custom-switch-input">
                                            <span class="custom-switch-indicator"></span>
                                        </label>
                                        <input type="hidden" name="is_deceased" value="0">
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Alamat lengkap</label>
                                        <textarea data-height="50" class="form-control @error('address_line') is-invalid @enderror" name="address_line">{{ old('address_line') }}</textarea>
                                        @error('address_line')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>RT</label>
                                                <input type="number" class="form-control @error('rt') is-invalid @enderror"
                                                    name="rt" value="{{ old('rt') }}">
                                                @error('rt')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>RW</label>
                                                <input type="number"
                                                    class="form-control @error('rw') is-invalid @enderror" name="rw"
                                                    value="{{ old('rw') }}">
                                                @error('rw')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kode Pos</label>
                                                <input type="number"
                                                    class="form-control @error('postal_code') is-invalid @enderror"
                                                    name="postal_code" value="{{ old('postal_code') }}">
                                                @error('postal_code')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Provinsi</label>
                                        <select class="form-control select2  @error('province_code') is-invalid @enderror"
                                            id="provinsi">
                                            <option value="">- pilih Provinsi -</option>
                                            @foreach ($provinsi as $item)
                                                <option value="{{ $item->code . '-' . $item->name }}">{{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('province_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Kabupaten/Kota</label>
                                        <select class="form-control select2 @error('city_code') is-invalid @enderror"
                                            id="kabupaten">
                                        </select>
                                        @error('city_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Kecamatan</label>
                                        <select class="form-control select2 @error('district_code') is-invalid @enderror"
                                            id="kecamatan">
                                        </select>
                                        @error('district_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Kelurahan</label>
                                        <select class="form-control select2 @error('village_code') is-invalid @enderror"
                                            id="kelurahan">
                                        </select>
                                        @error('village_code')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label class="form-label">Status Pernikahan</label>
                                        <div class="selectgroup w-100">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="marital_status" value="Menikah"
                                                    class="selectgroup-input" checked="">
                                                <span class="selectgroup-button">Menikah</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="marital_status" value="Lajang"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Lajang</span>
                                            </label>
                                            <label class="selectgroup-item">
                                                <input type="radio" name="marital_status" value="Cerai"
                                                    class="selectgroup-input">
                                                <span class="selectgroup-button">Cerai</span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group mb-2">
                                        <label>Nama Pasangan</label>
                                        <input type="text"
                                            class="form-control @error('relationship_name') is-invalid @enderror"
                                            name="relationship_name" value="{{ old('relationship_name') }}"
                                            autocomplete="off">
                                        @error('relationship_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Nomor HP Pasangan</label>
                                        <input type="number"
                                            class="form-control @error('relationship_phone') is-invalid @enderror"
                                            name="relationship_phone" value="{{ old('relationship_phone') }}"
                                            autocomplete="off">
                                        @error('relationship_phone')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <input type="hidden" name="province_code">
                            <input type="hidden" name="city_code">
                            <input type="hidden" name="district_code">
                            <input type="hidden" name="village_code">
                            <input type="hidden" name="province" value="Jawa Tengah">
                            <input type="hidden" name="city" value="Kota Semarang">
                            <input type="hidden" name="district" value="Tembalang">
                            <input type="hidden" name="village" value="Meteseh">
                            <button class="btn btn-lg btn-primary"><i class="fas fa-save"></i>
                                SIMPAN</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('library/select2/dist/js/select2.full.min.js') }}"></script>

    <script type="text/javascript">
        $(document).on("change", "#is_deceased", function(e) {
            e.preventDefault()
            var isChecked = $('#is_deceased').is(':checked');
            $('input[name=is_deceased]').val(0)

            if ($('#is_deceased').is(':checked')) {
                $('input[name=is_deceased]').val(1)
            } else {
                $('input[name=is_deceased]').val(0)
            }
        });
        $(document).on("change", "#provinsi", function(e) {
            e.preventDefault()
            // let token = $(this).data('token');
            let dataProv = this.value.split('-');
            let provinsiId = dataProv[0];
            $('input[name=province_code]').val(provinsiId)
            $('input[name=province]').val(dataProv[1])
            $('input[name=city_code]').val('')
            $('input[name=district_code]').val('')
            $('input[name=village_code]').val('')
            let kabupatenSelect = document.getElementById('kabupaten');
            kabupatenSelect.innerHTML = '<option value="">Pilih Kabupaten/Kota</option>';

            if (!provinsiId) {
                return;
            }
            fetch('/api/cities?province_codes=' + provinsiId, {
                    method: 'GET',
                    // headers: {
                    //     'Authorization': 'Bearer '+token, 
                    // }
                })
                .then(response => response.json())
                .then(data => {
                    data.data.forEach(item => {
                        var option = document.createElement('option');
                        option.value = item.code + '-' + item.name;
                        option.textContent = item.name;
                        kabupatenSelect.appendChild(option);
                        // $('input[name=city]').val(item.name)
                    });
                })
                .catch(error => console.error('Error:', error));
        });
        $(document).on("change", "#kabupaten", function(e) {
            e.preventDefault()
            let dataKab = this.value.split('-');
            let kabupatenId = dataKab[0];
            $('input[name=city_code]').val(kabupatenId)
            $('input[name=city]').val(dataKab[1])
            $('input[name=district_code]').val('')
            $('input[name=village_code]').val('')
            let kecamatanSelect = document.getElementById('kecamatan');
            kecamatanSelect.innerHTML = '<option value="">Pilih Kecamatan</option>';

            if (!kabupatenId) {
                return;
            }
            fetch('/api/districts?city_codes=' + kabupatenId, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    data.data.forEach(item => {
                        var option = document.createElement('option');
                        option.value = item.code + '-' + item.name;
                        option.textContent = item.name;
                        kecamatanSelect.appendChild(option);
                        // $('input[name=district]').val(item.name)
                    });
                })
                .catch(error => console.error('Error:', error));
        });
        $(document).on("change", "#kecamatan", function(e) {
            e.preventDefault()
            let dataKec = this.value.split('-');
            let kecamatanId = dataKec[0];
            $('input[name=district_code]').val(kecamatanId)
            $('input[name=district]').val(dataKec[1])
            $('input[name=village_code]').val('')
            let kelurahanSelect = document.getElementById('kelurahan');
            kelurahanSelect.innerHTML = '<option value="">Pilih Kelurahan</option>';

            if (!kecamatanId) {
                return;
            }
            fetch('/api/sub-districts?district_codes=' + kecamatanId, {
                    method: 'GET',
                })
                .then(response => response.json())
                .then(data => {
                    data.data.forEach(item => {
                        var option = document.createElement('option');
                        option.value = item.code + '-' + item.name;
                        option.textContent = item.name;
                        kelurahanSelect.appendChild(option);
                        // $('input[name=village]').val(item.name)
                    });
                })
                .catch(error => console.error('Error:', error));
        });
        $(document).on("change", "#kelurahan", function(e) {
            e.preventDefault()
            let dataKel = this.value.split('-');
            let kelurahanId = dataKel[0];
            $('input[name=village_code]').val(kelurahanId)
            $('input[name=village]').val(dataKel[1])
        });
    </script>
@endpush
