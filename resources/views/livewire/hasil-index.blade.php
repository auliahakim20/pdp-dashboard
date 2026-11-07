<div>
    <style>
        .fx-card {
            position: relative;
            transition: transform .35s cubic-bezier(.2, .8, .2, 1), box-shadow .35s ease;
            will-change: transform;
        }

        .fx-card.is-moving {
            transition: transform .08s linear, box-shadow .35s ease;
        }

        .fx-card:hover {
            z-index: 5;
            transform: translateY(-6px);
            box-shadow: 0 18px 38px -12px rgba(79, 70, 229, 0.28) !important;
        }

        .fx-card::after {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: inherit;
            pointer-events: none;
            opacity: 0;
            transition: opacity .3s ease;
            background: radial-gradient(260px circle at var(--mx, 50%) var(--my, 50%), rgba(99, 102, 241, 0.14), transparent 60%);
        }

        .fx-card:hover::after {
            opacity: 1;
        }

        @media (prefers-reduced-motion: reduce) {

            .fx-card,
            .fx-card.is-moving {
                transition: none;
            }

            .fx-card:hover {
                transform: none;
            }
        }
    </style>

    <!-- Hero -->
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800">
        <div class="max-w-7xl mx-auto py-14 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-indigo-200 text-xs sm:text-sm font-semibold tracking-widest uppercase"> Water Monitoring and
                Evaluation using K-Nearest Neighbor in Kendal </p>
            <h1 class="mt-3 text-3xl sm:text-4xl font-bold text-white">Test Results Dashboard</h1>
            <p class="mt-3 max-w-2xl mx-auto text-indigo-100 text-sm sm:text-base">
                This is an application based on Artificial Intelligence (AI) and the Internet of Things (IoT)
                technologies, designed to monitor and assess water quality in Kendal Regency.
                In this evaluation process, the K-Nearest Neighbour (KNN) algorithm is applied as a machine
                learning-based classification method. This algorithm is used to determine water quality categories based
                on the characteristics of measured parameters by comparing them against historical data or datasets that
                have already been labelled with classifications.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16 space-y-10">

        <!-- Summary Cards -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-8">
            <div class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Accuracy</p>
                <p class="mt-8 text-2xl sm:text-3xl font-bold text-indigo-600">99,26<span class="text-base">%</span></p>
                <p class="mt-1 text-xs text-gray-400"> </p>
            </div>
            <div class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Precision</p>
                <p class="mt-8 text-2xl sm:text-3xl font-bold text-sky-600">98,25<span class="text-base">%</span></p>
                <p class="mt-1 text-xs text-gray-400"> </p>
            </div>
            <div class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Recall</p>
                <p class="mt-8 text-2xl sm:text-3xl font-bold text-emerald-600">99,54<span class="text-base">%</span>
                </p>
                <p class="mt-1 text-xs text-gray-400"> </p>
            </div>
            <div class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">F1 Score</p>
                <p class="mt-8 text-2xl sm:text-3xl font-bold text-amber-500">98,88<span class="text-base">%</span></p>
                <p class="mt-1 text-xs text-gray-400"> </p>
            </div>
        </div>
        <!-- Tren TDS -->
        <div wire:ignore class="fx-card" data-tilt="soft"
            style="background:#fff; border:1px solid #bae6fd; border-radius:28px; padding:24px; box-shadow:0 1px 3px rgba(15,23,42,0.06);">
            <div
                style="display:flex; flex-wrap:wrap; align-items:flex-start; justify-content:space-between; gap:12px; margin-bottom:20px;">
                <div>
                    <p
                        style="margin:0; font-size:12px; font-weight:700; letter-spacing:0.22em; text-transform:uppercase; color:#0891b2;">
                        Tren TDS</p>
                    <h3 style="margin:6px 0 0 0; font-size:26px; font-weight:800; color:#0f172a;">Total Dissolved Solids
                    </h3>
                </div>
                <span
                    style="background:#ecfeff; color:#0e7490; font-weight:700; font-size:15px; padding:10px 18px; border-radius:16px; white-space:nowrap;">
                    Average {{ $tdsAvg }} ppm
                </span>
            </div>
            <div style="overflow-x:auto;">
                <div style="min-width:520px; height:280px; position:relative;">
                    <canvas id="chartTds"></canvas>
                </div>
            </div>
        </div>

        <!-- Tren Turbidity & Temperature -->
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(340px, 1fr)); gap:24px;">

            <!-- Tren Turbidity -->
            <div wire:ignore class="fx-card" data-tilt="soft"
                style="background:#fff; border:1px solid #fde68a; border-radius:28px; padding:24px; box-shadow:0 1px 3px rgba(15,23,42,0.06);">
                <div
                    style="display:flex; flex-wrap:wrap; align-items:flex-start; justify-content:space-between; gap:12px; margin-bottom:20px;">
                    <div>
                        <p
                            style="margin:0; font-size:12px; font-weight:700; letter-spacing:0.22em; text-transform:uppercase; color:#d97706;">
                            Tren Turbidity</p>
                        <h3 style="margin:6px 0 0 0; font-size:26px; font-weight:800; color:#0f172a;">Turbidity</h3>
                    </div>
                    <span
                        style="background:#fffbeb; color:#b45309; font-weight:700; font-size:15px; padding:10px 18px; border-radius:16px; white-space:nowrap;">
                        Average {{ $turbidityAvg }} NTU
                    </span>
                </div>
                <div style="overflow-x:auto;">
                    <div style="min-width:300px; height:260px; position:relative;">
                        <canvas id="chartTurbidity"></canvas>
                    </div>
                </div>
            </div>

            <!-- Tren Temperature -->
            <div wire:ignore class="fx-card" data-tilt="soft"
                style="background:#fff; border:1px solid #fecdd3; border-radius:28px; padding:24px; box-shadow:0 1px 3px rgba(15,23,42,0.06);">
                <div
                    style="display:flex; flex-wrap:wrap; align-items:flex-start; justify-content:space-between; gap:12px; margin-bottom:20px;">
                    <div>
                        <p
                            style="margin:0; font-size:12px; font-weight:700; letter-spacing:0.22em; text-transform:uppercase; color:#e11d48;">
                            Tren Temperature</p>
                        <h3 style="margin:6px 0 0 0; font-size:26px; font-weight:800; color:#0f172a;">Temperature</h3>
                    </div>
                    <span
                        style="background:#fff1f2; color:#be123c; font-weight:700; font-size:15px; padding:10px 18px; border-radius:16px; white-space:nowrap;">
                        Average {{ $temperatureAvg }} °C
                    </span>
                </div>
                <div style="overflow-x:auto;">
                    <div style="min-width:300px; height:260px; position:relative;">
                        <canvas id="chartTemperature"></canvas>
                    </div>
                </div>
            </div>

        </div>

        <!-- Riwayat Pengukuran -->
        <div class="fx-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden" data-tilt="off">

            <div class="px-5 sm:px-6 py-4 border-b border-gray-200"
                style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:12px;">

                <div>
                    <h3 class="text-base sm:text-lg font-semibold text-gray-800">Measurement History</h3>
                    <p class="text-xs text-gray-400 mt-0.5">Water quality sensor data for each sample</p>
                </div>

                <div
                    style="display:flex; flex-wrap:wrap; align-items:center; justify-content:flex-end; gap:12px; margin-left:auto;">
                    <div class="relative">
                        <svg class="w-4 h-4 text-gray-400 absolute left-3 top-1/2 -translate-y-1/2" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-4.35-4.35M17 11a6 6 0 11-12 0 6 6 0 0112 0z" />
                        </svg>
                        <input type="text" wire:model.debounce.300ms="search" placeholder="Seacrh location sample..."
                            style="width: 14rem;"
                            class="pl-9 pr-3 py-1.5 text-sm border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <select wire:model="kualitas" style="width: 11.5rem;"
                        class="py-1.5 pl-3 pr-8 text-sm border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">All Qualities</option>
                        <option value="1">Safe</option>
                        <option value="0">Unsafe</option>
                    </select>

                    <span
                        class="text-xs font-medium text-gray-600 bg-gray-100 rounded-full px-3 py-1 whitespace-nowrap">
                        {{ $pengukuran->total() }} data
                    </span>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr class="text-xs font-semibold text-gray-500 uppercase tracking-wider">
                            <th class="px-5 py-3 text-left w-12">No</th>
                            <th class="px-5 py-3 text-left">Location</th>
                            <th class="px-5 py-3 text-left">Date and Time</th>
                            <th class="px-5 py-3 text-right">TDS (ppm)</th>
                            <th class="px-5 py-3 text-right">Turbidity (NTU)</th>
                            <th class="px-5 py-3 text-right">Temperature (°C)</th>
                            <th class="px-5 py-3 text-center">Water Quality</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($pengukuran as $row)
                            <tr
                                class="hover:bg-indigo-50/40 transition-colors {{ $loop->even ? 'bg-gray-50/50' : 'bg-white' }}">
                                <td class="px-5 py-3 text-gray-400">{{ $pengukuran->firstItem() + $loop->index }}
                                </td>
                                <td class="px-5 py-3 font-medium text-gray-800 whitespace-nowrap">
                                    {{ $row->name }}
                                </td>
                                <td class="px-5 py-3 text-gray-500 whitespace-nowrap">
                                    {{ $row->tanggal->format('d M Y, H:i') }}</td>
                                <td class="px-5 py-3 text-right tabular-nums text-gray-700">
                                    {{ number_format($row->tds, 2) }}</td>
                                <td class="px-5 py-3 text-right tabular-nums text-gray-700">
                                    {{ number_format($row->turbidity, 2) }}</td>
                                <td class="px-5 py-3 text-right tabular-nums text-gray-700">
                                    {{ number_format($row->temperature, 2) }}</td>
                                <td class="px-5 py-3 text-center">
                                    @if ($row->kualitas == 1)
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-blue-100 text-blue-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-600"></span>
                                            Safe
                                        </span>
                                    @else
                                        <span
                                            class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-700">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-600"></span>
                                            Unsafe
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="px-5 py-10 text-center text-gray-400">
                                    @if ($search !== '' || $kualitas !== '')
                                        No results match your search or filters
                                    @else
                                        No measurement data is available yet
                                    @endif
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div
                class="px-5 sm:px-6 py-3 border-t border-gray-200 bg-gray-50 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
                <p class="text-xs text-gray-500">
                    @if ($pengukuran->total() > 0)
                        {{ $pengukuran->total() }} Data
                    @endif
                </p>
                <div>
                    {{ $pengukuran->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Script grafik + efek kartu (di dalam root div, wajib untuk Livewire v2) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        // ===== Efek hover kartu (event delegation, tetap jalan setelah Livewire re-render) =====
        (function() {
            if (window.__fxCardsReady) return;
            window.__fxCardsReady = true;

            var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var active = null;

            function reset(card) {
                card.classList.remove('is-moving');
                card.style.transform = '';
            }

            document.addEventListener('pointermove', function(e) {
                if (e.pointerType && e.pointerType !== 'mouse') return;

                var card = e.target.closest ? e.target.closest('.fx-card') : null;

                if (active && active !== card) {
                    reset(active);
                    active = null;
                }
                if (!card) return;
                active = card;

                var r = card.getBoundingClientRect();
                var x = e.clientX - r.left;
                var y = e.clientY - r.top;

                card.style.setProperty('--mx', x + 'px');
                card.style.setProperty('--my', y + 'px');

                if (reduce) return;

                var mode = card.getAttribute('data-tilt') || 'normal';
                var max = mode === 'off' ? 0 : (mode === 'soft' ? 3 : 6);
                var lift = mode === 'off' ? 3 : 6;

                var rx = ((y / r.height) - 0.5) * -2 * max;
                var ry = ((x / r.width) - 0.5) * 2 * max;

                card.classList.add('is-moving');
                card.style.transform =
                    'perspective(900px) rotateX(' + rx.toFixed(2) + 'deg) rotateY(' + ry.toFixed(2) +
                    'deg) translateY(-' + lift + 'px)';
            });

            document.documentElement.addEventListener('mouseleave', function() {
                if (active) {
                    reset(active);
                    active = null;
                }
            });
        })();

        // ===== Grafik =====
        (function() {
            var labels = @json($grafikLabels);
            var tooltipTitles = @json($grafikTooltip);

            function buatGrafik(canvasId, values, warna, rgb, satuan, tinggi) {
                var el = document.getElementById(canvasId);
                if (!el) return;

                var ctx = el.getContext('2d');
                var gradient = ctx.createLinearGradient(0, 0, 0, tinggi);
                gradient.addColorStop(0, 'rgba(' + rgb + ',0.22)');
                gradient.addColorStop(1, 'rgba(' + rgb + ',0.02)');

                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: satuan,
                            data: values,
                            borderColor: warna,
                            backgroundColor: gradient,
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 3.5,
                            pointHoverRadius: 6,
                            pointBackgroundColor: warna,
                            pointBorderColor: warna
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                callbacks: {
                                    title: function(items) {
                                        return tooltipTitles[items[0].dataIndex];
                                    },
                                    label: function(c) {
                                        return c.parsed.y.toLocaleString('id-ID') + ' ' + satuan;
                                    }
                                }
                            }
                        },
                        scales: {
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#64748b',
                                    maxTicksLimit: 8,
                                    maxRotation: 0
                                }
                            },
                            y: {
                                beginAtZero: true,
                                border: {
                                    display: false
                                },
                                grid: {
                                    color: '#e8eef3'
                                },
                                ticks: {
                                    color: '#64748b'
                                }
                            }
                        }
                    }
                });
            }

            function initSemuaGrafik() {
                if (typeof Chart === 'undefined') {
                    console.error('Chart.js gagal dimuat dari CDN.');
                    return;
                }
                buatGrafik('chartTds', @json($tdsValues), '#0891b2', '8,145,178', 'ppm', 280);
                buatGrafik('chartTurbidity', @json($turbidityValues), '#f59e0b', '245,158,11', 'NTU', 260);
                buatGrafik('chartTemperature', @json($temperatureValues), '#e11d48', '225,29,72', '°C', 260);
            }

            if (document.readyState === 'complete') {
                initSemuaGrafik();
            } else {
                window.addEventListener('load', initSemuaGrafik);
            }
        })();
    </script>
</div>
