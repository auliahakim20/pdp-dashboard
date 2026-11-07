<div>
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800">
        <div class="max-w-7xl mx-auto py-14 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-indigo-200 text-xs sm:text-sm font-semibold tracking-widest uppercase">Research Data Sources
            </p>
            <h1 class="mt-3 text-3xl sm:text-4xl font-bold text-white">Dataset Region</h1>
            <p class="mt-3 max-w-2xl mx-auto text-indigo-100 text-sm sm:text-base">
                Water dataset samples were collected from eight sub-districts in Kendal Regency. The sampling locations
                were the sub-districts of Gemuh, Cepiring, Ringinarum, Weleri, Pegandon and Ngampel.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16 space-y-10">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
            <div class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Area</p>
                <p class="mt-2 text-2xl sm:text-3xl font-bold text-indigo-600">{{ $data->count() }}</p>
            </div>
            <div
                class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100 sm:col-span-2 flex items-center">
                <div class="w-full" style="height:160px; position:relative;">
                    <canvas id="chartWilayah" width="400" height="160" style="width:100%; height:100%;"></canvas>
                </div>
            </div>
        </div>

        <div class="fx-card bg-white rounded-xl p-5 sm:p-6 shadow-sm border border-gray-100 overflow-x-auto"
            data-tilt="off">
            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-4">List of Locations</h3>
            <table class="min-w-full text-sm divide-y divide-gray-200">
                <thead>
                    <tr class="text-left text-xs font-medium text-gray-500 uppercase">
                        <th class="py-2 pr-4">Location</th>
                        <th class="py-2 pr-4">District</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($data as $row)
                        <tr>
                            <td class="py-2 pr-4 font-medium">{{ $row->nama_kecamatan }}</td>
                            <td class="py-2 pr-4 text-gray-500">{{ $row->wilayah }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="py-4 text-center text-gray-400">No data is available yet</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.4/dist/chart.umd.min.js"></script>
    <script>
        (function() {
            function initChart() {
                var el = document.getElementById('chartWilayah');
                if (!el || typeof Chart === 'undefined') return;

                var rows = @json(
                    $data->map(function ($r) {
                            return ['id' => $r->id, 'nama' => $r->nama_kecamatan];
                        })->values());

                // Palet unik: 12 warna pilihan, sisanya sudut warna "golden angle", jadi tidak pernah ada yang kembar
                var dasar = ['#e11d48', '#2563eb', '#16a34a', '#f59e0b', '#9333ea', '#06b6d4',
                    '#ea580c', '#db2777', '#84cc16', '#1e3a8a', '#0d9488', '#92400e'
                ];
                var terang = [38, 55, 46];

                function warnaKe(i) {
                    if (i < dasar.length) return dasar[i];
                    var k = i - dasar.length;
                    var hue = Math.round((20 + k * 137.508) % 360);
                    return 'hsl(' + hue + ', 72%, ' + terang[k % 3] + '%)';
                }

                // warna dikunci ke urutan id, jadi tidak bergeser kalau nama diurutkan abjad atau ada kecamatan baru
                var urutId = rows.map(function(r) {
                    return r.id;
                }).sort(function(a, b) {
                    return a - b;
                });
                var colors = rows.map(function(r) {
                    return warnaKe(urutId.indexOf(r.id));
                });

                new Chart(el.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: rows.map(function(r) {
                            return r.nama;
                        }),
                        datasets: [{
                            data: rows.map(function() {
                                return 1;
                            }),
                            backgroundColor: colors,
                            borderColor: '#ffffff',
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right'
                            },
                            tooltip: {
                                callbacks: {
                                    title: function() {
                                        return '';
                                    },
                                    label: function(ctx) {
                                        return ctx.label;
                                    } // hanya nama kecamatan, tanpa angka 1
                                }
                            }
                        }
                    }
                });
            }

            if (document.readyState === 'complete') {
                initChart();
            } else {
                window.addEventListener('load', initChart);
            }
        })();
    </script>
</div>
