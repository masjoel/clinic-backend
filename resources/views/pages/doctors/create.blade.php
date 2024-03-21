@extends('layouts.app')

@section('title', $title)

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ $title }}</h1>
                @include('pages.doctors.breadcrumb')
            </div>

            <div class="section-body">

                <div class="card">
                    <form action="{{ route('doctors.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>{{ $title }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-2">
                                        <label>Name</label>
                                        <input type="text"
                                            class="form-control @error('doctor_name') is-invalid @enderror"
                                            name="doctor_name" value="{{ old('doctor_name') }}">
                                        @error('doctor_name')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-2">
                                        <label>Specialist</label>
                                        <input type="text"
                                            class="form-control @error('doctor_specialist') is-invalid @enderror"
                                            name="doctor_specialist"
                                            value="{{ old('doctor_specialist') }}">
                                        @error('doctor_specialist')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Phone</label>
                                                <input type="text"
                                                    class="form-control @error('doctor_phone') is-invalid @enderror"
                                                    name="doctor_phone"
                                                    value="{{ old('doctor_phone') }}"
                                                    autocomplete="off">
                                                @error('doctor_phone')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>Email</label>
                                                <input type="email"
                                                    class="form-control @error('doctor_email') is-invalid @enderror"
                                                    name="doctor_email"
                                                    value="{{ old('doctor_email') }}"
                                                    autocomplete="off">
                                                @error('doctor_email')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group mb-2">
                                                <label>SIP</label>
                                                <input type="number"
                                                    class="form-control @error('sip') is-invalid @enderror" name="sip"
                                                    value="{{ old('sip') }}" autocomplete="off">
                                                @error('sip')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-lg btn-primary"><i class="fas fa-save"></i> SIMPAN</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#username').on('input', function() {
                var inputValue = $(this).val();
                inputValue = inputValue.toLowerCase();
                inputValue = inputValue.replace(/[^a-z0-9]/g, '.');
                $(this).val(inputValue);
            });
        });
    </script>
@endpush
