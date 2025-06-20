<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin-Dashboard</title>
    @vite('resources/css/app.css')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body class="bg-gray-100 font-sans">

    <div class="min-h-screen flex flex-col">
      <header class="bg-purple-800 text-blue-400 px-6 py-4 shadow-md flex items-center justify-between">
   <h1 class="text-4xl font-bold tracking-tight">
    Teteng<span class="text-yellow-400">Finance.</span>
    </h1>
    <div class="flex items-center gap-4">
        <!-- Elemen untuk Jam -->
        <div id="clock" class="text-sm font-mono bg-white text-black px-3 py-1 rounded-md shadow"></div>

        <!-- Tombol Logout --> 
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold px-6 py-2 rounded-full transition">
                Logout
            </button>
        </form>
    </div>
</header>



        <main class="flex-1 p-8 bg-gray-100 min-h-screen">
    <!-- Ringkasan -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">
        <div class="bg-white shadow rounded-lg p-5">
            <p class="text-sm text-gray-500">Total Transaksi User</p>
            <p class="text-2xl font-bold text-purple-800 mt-2">{{ $totalTransactions }}</p>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <p class="text-sm text-gray-500">Total Pengeluaran User</p>
            <p class="text-2xl font-bold text-red-600 mt-2">Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <p class="text-sm text-gray-500">Total Pemasukan User</p>
            <p class="text-2xl font-bold text-green-600 mt-2">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <p class="text-sm text-gray-500">Saldo Kumulatif</p>
            <p class="text-2xl font-bold text-blue-600 mt-2">Rp {{ number_format($totalBalance, 0, ',', '.') }}</p>
        </div>

        <div class="bg-white shadow rounded-lg p-5">
            <p class="text-sm text-gray-500">Jumlah User</p>
            <p class="text-2xl font-bold text-yellow-600 mt-2">{{ $totalUsers }}</p>
        </div>
    </div>

    <!-- Grafik Tren Keuangan -->
  <div class="bg-white shadow rounded-xl p-6">
    <h2 class="text-2xl font-bold text-gray-800 ">📈 Tren Keuangan 30 Hari Terakhir</h2>
    <div class="h-[350px] relative">
        <canvas id="financialChart" class="absolute top-0 left-0 w-full h-full"></canvas>
    </div>
</div>

<!-- CDN Chart.js-->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const ctx = document.getElementById('financialChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: @json($dates),
            datasets: [
                {
                    label: 'Pemasukan',
                    data: @json($incomes),
                    borderColor: '#22c55e',
                    backgroundColor: 'rgba(34, 197, 94, 0.1)',
                    pointBackgroundColor: '#22c55e',
                    pointRadius: 4,
                    fill: true,
                    tension: 0.3
                },
                {
                    label: 'Pengeluaran',
                    data: @json($expenses),
                    borderColor: '#ef4444',
                    backgroundColor: 'rgba(239, 68, 68, 0.1)',
                    pointBackgroundColor: '#ef4444',
                    pointRadius: 4,
                    fill: true,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            interaction: {
                mode: 'index',
                intersect: false
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        color: '#333',
                        font: {
                            weight: 'bold'
                        }
                    }
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function (ctx) {
                            return `${ctx.dataset.label}: Rp ${ctx.raw.toLocaleString('id-ID')}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: '#666',
                        maxRotation: 45,
                        minRotation: 45,
                        autoSkip: true,
                        maxTicksLimit: 10
                    }
                },
                y: {
                    ticks: {
                        callback: function (val) {
                            return 'Rp ' + val.toLocaleString('id-ID');
                        },
                        color: '#666'
                    },
                    beginAtZero: true
                }
            }
        }
    });
});
</script>
</div>
<!-- Daftar Pengguna Terdaftar -->
<div class="bg-white shadow rounded-xl p-6 ">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">👥 Pengguna Terdaftar</h2>

    @if($users->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left border border-gray-200">
            <thead class="bg-gray-100 text-gray-700 font-semibold">
                <tr>
                    <th class="px-4 py-2 border-b">#</th>
                    <th class="px-4 py-2 border-b">Nama</th>
                    <th class="px-4 py-2 border-b">Email</th>
                    <th class="px-4 py-2 border-b">Tanggal Registrasi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $i => $user)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border-b">{{ $i + 1 }}</td>
                    <td class="px-4 py-2 border-b">{{ $user->name }}</td>
                    <td class="px-4 py-2 border-b">{{ $user->email }}</td>
                    <td class="px-4 py-2 border-b">{{ $user->created_at->format('d M Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-gray-500">Belum ada pengguna yang terdaftar.</p>
    @endif
</div>

</main>
</div>

<script>
    function updateClock() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        const waktu = `${jam}:${menit}:${detik}`;
        document.getElementById('clock').textContent = waktu;
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateClock(); // Inisialisasi awal
        setInterval(updateClock, 1000); // Update tiap detik
    });
</script>


</body>
</html>
