@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kirim Laporan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('pengaduan.update', ['pengaduan' => $pengaduan->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="isi_laporan" class="col-md-4 col-form-label text-md-right">{{ __('Isi Laporan') }}</label>

                            <div class="col-md-6">
                                <textarea id="isi_laporan" type="text" class="form-control @error('isi_laporan') is-invalid @enderror" name="isi_laporan"  autofocus>{{ old('isi_laporan', $pengaduan->isi_laporan) }}</textarea>

                                @error('isi_laporan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isi_laporan" class="col-md-4 col-form-label text-md-right">{{ __('Foto Laporan') }}</label>
                            <div class="col-md-6">
                                <input type="file" id="image" name="image" class="form-control @error('image') is-invalid @enderror">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                @if($pengaduan->foto)
                                    <br>
                                    <img src="{{asset('storage/pengaduan/' . $pengaduan->foto)}}" class="img-fluid" >
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Simpan') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
