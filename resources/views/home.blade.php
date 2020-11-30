@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <personal-access-tokens-component />
        </div>
        <div class="col-md-8">
            <authorized-clients-component />
        </div>
        <div class="col-md-8">
            <clients-component />
        </div>
    </div>
</div>
@endsection
