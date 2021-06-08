@extends('layouts.app')
@section('content')
    <!-- Page Heading -->
    <div class="page-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Data Produk</h1>
                </div>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <!-- Tables -->
    <section class="tables">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <a class="btn btn-success" href="{{ route('produk.create') }}">Input Produk</a>
                </div>
                <div class="mx-auto pull-right">
                    <div class="float-left">
                        <form action="{{ route('produk.index') }}" method="GET" role="search">
                            <div class="input-group">
                                <a href="{{ route('produk.index') }}" class="mr-4 mt-1">
                                    <span class="input-group-btn">
                                        <button class="btn btn-danger" type="button" title="Refresh page">
                                            <span class="fas fa-sync-alt">Refresh</span>
                                        </button>
                                    </span>
                                </a>
                                <input type="text" class="form-control mr-4 mt-1" name="term" placeholder="Search"
                                    id="term">
                                <span class="input-group-btn mr-2 mt-1">
                                    <input type="submit" value="Cari" class="btn btn-primary">
                                </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="default-table">
                        <table>
                            <caption></caption>
                            <thead>
                                <tr>
                                    <th scope="">Id</th>
                                    <th scope="">Name</th>
                                    <th scope="">Description</th>
                                    <th scope="">Image</th>
                                    <th scope="">Price</th>
                                    <th width="400px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($alat_musiks as $alat_musik)
                                    <tr>

                                        <td>{{ $alat_musik->id }}</td>
                                        <td>{{ $alat_musik->name }}</td>
                                        <td>{{ $alat_musik->description }}</td>
                                        <td><img width="100px" src="{{ asset('storage/' . $alat_musik->image) }}"></td>
                                        <td>{{ $alat_musik->price }}</td>
                                        <td>
                                            <form action="{{ route('produk.destroy', $alat_musik->id) }}" method="POST"
                                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus data barang?')">
                                                <a class="btn btn-info"
                                                    href="{{ route('produk.show', $alat_musik->id) }}">Show</a>
                                                <a class="btn btn-primary"
                                                    href="{{ route('produk.edit', $alat_musik->id) }}">Edit</a>
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        
                        {{ $alat_musiks->links() }}
                        <!-- TARUH LINKS DISINI-->
                        <br><br>
                        <div class="text-center my-2">
                            <a href="{{ route('produk.cetak_pdf', $alat_musik->id) }}" class="btn btn-warning">Cetak PDF</a>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
