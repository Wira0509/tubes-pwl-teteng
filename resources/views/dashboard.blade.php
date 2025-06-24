<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    @vite('resources/css/app.css')
   <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body class="bg-gray-900 text-white font-sans antialiased">

<div class="min-h-screen flex flex-col">

    <!-- HEADER DARK MODE -->
    <header class="bg-gray-800 text-white px-6 py-4 shadow-md flex items-center justify-between">
        <h1 class="text-3xl font-bold tracking-tight">
            <span class="text-blue-400">Teteng</span><span class="text-yellow-400">Finance.</span>
        </h1>
        <div id="clock" class="text-sm font-mono bg-gray-700 text-white px-3 py-1 rounded-md shadow"></div>
        <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit"
            class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 font-semibold px-4 py-2 rounded shadow">
            Logout
        </button>
    </form>
    </header>

    <!-- KONTEN -->
    <main class="flex-1 p-8 space-y-8">

        <!-- Ringkasan -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6">
            <div class="bg-gray-800 shadow rounded-lg p-5">
                <p class="text-sm text-gray-300">Total User Transaction</p>
                <p class="text-2xl font-bold text-purple-400 mt-2">{{ $totalTransactions }}</p>
            </div>

            <div class="bg-gray-800 shadow rounded-lg p-5">
                <p class="text-sm text-gray-300">Total User Expense</p>
                <p class="text-2xl font-bold text-red-400 mt-2">Rp {{ number_format($totalExpense, 0, ',', '.') }}</p>
            </div>

            <div class="bg-gray-800 shadow rounded-lg p-5">
                <p class="text-sm text-gray-300">Total User Income</p>
                <p class="text-2xl font-bold text-green-400 mt-2">Rp {{ number_format($totalIncome, 0, ',', '.') }}</p>
            </div>

            <div class="bg-gray-800 shadow rounded-lg p-5">
                <p class="text-sm text-gray-300">Cumulative Balance</p>
                <p class="text-2xl font-bold text-blue-400 mt-2">Rp {{ number_format($totalBalance, 0, ',', '.') }}</p>
            </div>

            <div class="bg-gray-800 shadow rounded-lg p-5">
                <p class="text-sm text-gray-300">Total User</p>
                <p class="text-2xl font-bold text-yellow-400 mt-2">{{ $totalUsers }}</p>
            </div>
        </div>

        <!-- Grafik -->
        <div class="bg-gray-800 shadow rounded-xl p-6">
            <h2 class="text-2xl font-bold text-white mb-4">Financial Trends Last 30 Days</h2>
            <div class="h-[350px] relative">
                <canvas id="financialChart" class="absolute top-0 left-0 w-full h-full"></canvas>
            </div>
        </div>

        <!-- Daftar Pengguna -->
        <div class="bg-gray-800 shadow rounded-xl p-6">
            <h2 class="text-2xl font-bold text-white mb-6">Registered User</h2>

            @if($users->count() > 0)
            <div class="overflow-x-auto rounded-lg border border-gray-700">
                <table class="min-w-full text-sm text-left bg-gray-800 text-white">
                    <thead class="bg-gray-700 text-gray-300 font-semibold">
                        <tr>
                            <th class="px-4 py-3 border-b border-gray-600">#</th>
                            <th class="px-4 py-3 border-b border-gray-600">Name</th>
                            <th class="px-4 py-3 border-b border-gray-600">Email</th>
                            <th class="px-4 py-3 border-b border-gray-600">Registration Date</th>
                            <th class="px-4 py-3 border-b border-gray-600">Status</th>
                            <th class="px-4 py-3 border-b border-gray-600 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $i => $user)
                        <tr class="hover:bg-gray-700">
                            <td class="px-4 py-2 border-b border-gray-700">{{ $i + 1 }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">{{ $user->name }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">{{ $user->email }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">{{ $user->created_at->format('d M Y') }}</td>
                            <td class="px-4 py-2 border-b border-gray-700">
                                @if($user->is_active)
                                    <span class="text-green-400 font-semibold">Active</span>
                                @else
                                    <span class="text-red-400 font-semibold">Blocked</span>
                                @endif
                            </td>
                            <td class="px-4 py-2 border-b border-gray-700 text-center">
                                <form method="POST" action="{{ route('admin.toggle-user', $user->id) }}">
                                    @csrf
                                    <button type="submit"
                                        class="text-white text-xs px-3 py-1 rounded {{ $user->is_active ? 'bg-red-600 hover:bg-red-700' : 'bg-green-600 hover:bg-green-700' }}">
                                        {{ $user->is_active ? 'Block' : 'Active' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <p class="text-gray-400">No User Have Registered Yet</p>
            @endif
        </div>

            <!-- Pesan Contact Us -->
<div class="bg-gray-800 shadow rounded-xl p-6">
    <h2 class="text-2xl font-bold text-white mb-6">Messages</h2>

    @if (count($messages) > 0)
    <div class="overflow-x-auto rounded-lg border border-gray-700">
        <table class="min-w-full text-sm text-left bg-gray-800 text-white">
            <thead class="bg-gray-700 text-gray-300 font-semibold">
                <tr>
                    <th class="px-4 py-3 border-b border-gray-600">Name</th>
                    <th class="px-4 py-3 border-b border-gray-600">Email</th>
                    <th class="px-4 py-3 border-b border-gray-600">Subject</th>
                    <th class="px-4 py-3 border-b border-gray-600">Message</th>
                </tr>
            </thead>
            <tbody>
                @foreach(array_reverse($messages) as $msg)
                <tr class="hover:bg-gray-700">
                    <td class="px-4 py-2 border-b border-gray-700">{{ $msg['name'] }}</td>
                    <td class="px-4 py-2 border-b border-gray-700">{{ $msg['email'] }}</td>
                    <td class="px-4 py-2 border-b border-gray-700">{{ $msg['subject'] }}</td>
                    <td class="px-4 py-1 border-b border-gray-700">{{ $msg['message'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
        <p class="text-gray-400">No Incoming Message Yet</p>
    @endif
</div>



    </main>
</div>

<!-- Jam -->
<script>
    function updateClock() {
        const now = new Date();
        const jam = now.getHours().toString().padStart(2, '0');
        const menit = now.getMinutes().toString().padStart(2, '0');
        const detik = now.getSeconds().toString().padStart(2, '0');
        document.getElementById('clock').textContent = `${jam}:${menit}:${detik}`;
    }

    document.addEventListener('DOMContentLoaded', function () {
        updateClock();
        setInterval(updateClock, 1000);
    });
</script>

<!-- Chart.js -->
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
                        label: 'Income',
                        data: @json($incomes),
                        borderColor: '#4ade80',
                        backgroundColor: 'rgba(74, 222, 128, 0.1)',
                        pointBackgroundColor: '#4ade80',
                        pointRadius: 4,
                        fill: true,
                        tension: 0.3
                    },
                    {
                        label: 'Expense',
                        data: @json($expenses),
                        borderColor: '#f87171',
                        backgroundColor: 'rgba(248, 113, 113, 0.1)',
                        pointBackgroundColor: '#f87171',
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
                            color: '#ccc',
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (ctx) {
                                return `${ctx.dataset.label}: Rp ${ctx.raw.toLocaleString('id-ID')}`;
                            }
                        }
                    }
                },
                scales: {
                    x: {
                        ticks: { color: '#aaa' }
                    },
                    y: {
                        ticks: {
                            callback: function (val) {
                                return 'Rp ' + val.toLocaleString('id-ID');
                            },
                            color: '#aaa'
                        },
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
</body>
</html>