@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kirim Laporan') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.dashboard.pengaduan.update', ['pengaduan' => $pengaduan->id]) }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
                            <div class="col-md-6">
                                <select name="status" class="form-control @error('status') is-invalid @enderror">
                                    <option value="" >==Pilih Status==</option>
                                    <option value="prosess"  @if($pengaduan->status == "prosess") checked @endif >Prosess</option>
                                    <option value="selesai" @if($pengaduan->status == "selesai") checked @endif >Selesai</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Isi Laporan') }}</label>

                            <div class="col-md-6">
                                <div class="alert alert-primary" role="alert">
                                    {{$pengaduan->isi_laporan}}
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Foto Laporan') }}</label>
                            <div class="col-md-6">
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
