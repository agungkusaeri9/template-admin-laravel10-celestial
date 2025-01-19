@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <h3 class="mb-0 font-weight-bold">Hallo, {{ auth()->user()->name }}</h3>
        </div>
        
    </div>
@endsection
