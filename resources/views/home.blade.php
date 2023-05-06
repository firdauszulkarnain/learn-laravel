@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Selamat Datang User</div>

                <div class="card-body">
                    Selamat Datang User : {{ $token }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
