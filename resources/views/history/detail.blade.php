@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ url('produk') }}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
        <div class="col-md-12 mt-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Riwayat Pemesanan</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Detail Pemesanan</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3>Sukses Check Out</h3>
                    <h5>Pesanan Anda berhasil dicheck out, selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}
                    </strong> : <strong>Rp. {{ number_format($pesanan->total) }}</strong>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i>Detail Pemesanan</h3>
                    @if(!empty($pesanan))
                    <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                    <p align="right">Nama Penyewa : {{ $pesanan->user->username }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            
                            </tr>
                        </thead>  
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img width="150px" src="{{asset('storage/')}}/{{ $pesanan_detail->alat_musiks->image }}" alt="...">
                                </td>
                                <td>{{ $pesanan_detail->alat_musiks->name }}</td>
                                <td>{{ $pesanan_detail->jumlah }} barang</td>
                                <td>Rp. {{ number_format($pesanan_detail->alat_musiks->price) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->subtotal) }}</td>
                                
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" align="right"><strong>Total Harga :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total) }}</strong></td>
                     
                            </tr>
                            
                                <td colspan="5" align="right"><strong>Total yang harus dibayar :</strong></td>
                                <td align="right"><strong>Rp. {{ number_format($pesanan->total) }}</strong></td>
                     
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection