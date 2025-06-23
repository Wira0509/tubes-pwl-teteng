@extends('dashboard') {{-- Sesuaikan jika pakai layout lain --}}

@section('content')
<div class="container mt-5">
    <h2>Pesan dari Contact Us</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (count($messages) > 0)
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th>Pesan</th>
                    <th>Waktu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($messages as $msg)
                    <tr>
                        <td>{{ $msg['name'] }}</td>
                        <td>{{ $msg['email'] }}</td>
                        <td>{{ $msg['subject'] }}</td>
                        <td>{{ $msg['message'] }}</td>
                        <td>{{ $msg['time'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="mt-4">Belum ada pesan yang masuk.</p>
    @endif
</div>
@endsection
