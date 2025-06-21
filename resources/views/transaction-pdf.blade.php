<!DOCTYPE html>
<html>
<head>
    <title>Export Transaksi</title>
    <style>
        body { font-family: sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; border: 1px solid #ccc; font-size: 12px; }
    </style>
</head>
<body>
    <h2>Daftar Transaksi</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Tanggal</th>
                <th>Jumlah</th>
                <th>Catatan</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($transactions as $trx)
                <tr>
                    <td>{{ $trx->id }}</td>
                    <td>{{ $trx->name }}</td>
                    <td>{{ optional($trx->category)->name ?? '-' }}</td>
                    <td>{{ $trx->date_transaction }}</td>
                    <td>Rp {{ number_format($trx->amount, 0, ',', '.') }}</td>
                    <td>{{ $trx->note }}</td>
                    <td>{{ $trx->created_at }}</td>
                    <td>{{ $trx->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
