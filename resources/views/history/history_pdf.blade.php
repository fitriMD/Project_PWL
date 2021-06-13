<!DOCTYPE html>
<html lang="">

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="text-center card-header">
        <h3>PENYEWAAN ALAT MUSIK GALAXY MUSIC SURABAYA</h3>
        <h4>Invoice Transaksi</h4>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h3>Sukses Check Out</h3>
                <h5>Pesanan Anda berhasil dicheck out, selanjutnya untuk pembayaran silahkan transfer di rekening <strong>Bank BRI Nomer Rekening : 32113-821312-123</strong> dengan nominal : <strong>Rp. {{ number_format($pesanan->jumlah_harga) }}
                </strong>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-body">
                <h3><i class="fa fa-shopping-cart"></i>Detail Pemesanan</h3>
                @if(!empty($pesanan))
                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal }}</p>
                <p align="right">Nama Penyewa : {{ Auth::user()->name}}</p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
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
                            <td>{{ $pesanan_detail->alatmusik->name }}</td>
                            <td>{{ $pesanan_detail->jumlah }} barang</td>
                            <td>Rp. {{ number_format($pesanan_detail->alatmusik->price) }}</td>
                            <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                            
                        </tr>
                        @endforeach
                        
                            <td colspan="5" align="right"><strong>Total yang harus dibayar :</strong></td>
                            <td align="right"><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                 
                        </tr>
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</body>

</html>
