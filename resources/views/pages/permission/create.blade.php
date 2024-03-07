@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-5">Tambah Permission</h4>
                    <form action="{{ route('permissions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class='form-group mb-3'>
                            <label for='name' class='mb-2'>Nama</label>
                            <input type='text' name='name' class='form-control @error('name') is-invalid @enderror'
                                value='{{ old('name') }}'>
                            @error('name')
                                <div class='invalid-feedback'>
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-right">
                            <a href="{{ route('permissions.index') }}" class="btn btn-warning">Batal</a>
                            <button class="btn btn-primary">Tambah Permission</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
