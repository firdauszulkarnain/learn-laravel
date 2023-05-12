@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">Data Post</div>
                <div class="card-body">
                    @livewire('post-index')
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="card">
                <div class="card-header">
                    API Information
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" value="{{ auth()->user()->email }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="apikey">Auth Api Key</label>
                        <input type="text" class="form-control" id="apikey" value="{{ $token }}" readonly>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
