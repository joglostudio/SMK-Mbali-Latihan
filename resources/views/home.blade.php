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
                            <th scope="col">Isi Laporan</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>

                        <tbody>
                            @foreach($model as $key => $value) 
                            <tr>
                                <td>{{$value->isi_laporan}}</td>
                                <td>{{$value->status}}</td>
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
