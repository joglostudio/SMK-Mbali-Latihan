@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard Laporan') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th scope="col">Nama</th>
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($model as $key => $value) 
                            <tr>
                                <td>{{$value->user->nama}}</td>
                                <td>{{$value->isi_laporan}}</td>
                                <td>{{$value->status}}</td>
                                <td>
                                    @if($value->status == '0')
                                    <a class="btn btn-primary" href="{{route('pengaduan.edit', ['pengaduan' => $value->id])}}" >Edit</a>
                                    <a class="btn btn-danger" href="{{route('pengaduan.destroy', ['pengaduan' => $value->id])}}" >Hapus</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                    
                    {{ $model->links('pagination.home') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
