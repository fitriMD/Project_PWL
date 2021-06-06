@extends('layouts.app')

@section('content')

    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Edit Produk
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form method="post" action="{{ route('produk.update', $alat_musiks->id) }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    

                    <div class="form-group">
                        <label for="name">Nama Produk</label>
                        <input type="text" name="name" class="form-control" id="id" value="{{ $alat_musiks->name }}" ariadescribedby="name" >
                    </div>

                    <div class="form-group">
                        <label for="description">Deskripsi</label>
                        <input type="text" name="description" class="form-control" id="description" value="{{ $alat_musiks->description }}" ariadescribedby="description" >
                    </div>

                    <div class="form-group">
                        <label for="image">Gambar</label>
                        <input type="file" name="image" class="form-control" id="image" value="{{ $alat_musiks->image }}" required="required" ariadescribedby="image" ><br>
                        <img width="150px" src="{{asset('storage/'.$alat_musiks->image)}}">
                    </div>

                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="text" name="price" class="form-control" id="price" value="{{ $alat_musiks->price }}" ariadescribedby="price" >
                    </div>

                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
