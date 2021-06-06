@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div class="card" style="width: 24rem;">
                <div class="card-header">
                    Detail Produk
                </div>

                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item" align="middle">
                        <img width="150px" src="{{asset('storage/'.$alat_musiks->image)}}" align="middle"></li>
                        <li class="list-group-item"><b>Id: </b>{{$alat_musiks->id}}</li>
                        <li class="list-group-item"><b>Name: </b>{{$alat_musiks->name}}</li>
                        <li class="list-group-item"><b>Description: </b>{{$alat_musiks->description}}</li>
                        <li class="list-group-item"><b>Price: </b>{{$alat_musiks->price}}</li>
                    </ul>
                </div>

                <a class="btn btn-success mt3" href="{{ route('produk.index') }}">Kembali</a>
            </div>
        </div>
    </div>
@endsection