<div>
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800">
        <div class="max-w-7xl mx-auto py-14 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-indigo-200 text-xs sm:text-sm font-semibold tracking-widest uppercase">Sumber Data Penelitian
            </p>
            <h1 class="mt-3 text-3xl sm:text-4xl font-bold text-white">Wilayah Dataset</h1>
            <p class="mt-3 max-w-2xl mx-auto text-indigo-100 text-sm sm:text-base">
                Daftar kecamatan dan wilayah lokasi pengambilan sampel data kualitas air.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16 space-y-10">

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-6">
            <div class="fx-card bg-white rounded-xl p-5 shadow-sm border border-gray-100">
                <p class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Wilayah</p>
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
            <h3 class="text-base sm:text-lg font-semibold text-gray-800 mb-4">Daftar Kecamatan</h3>
            <table class="min-w-full text-sm divide-y divide-gray-200">
                <thead>
                    <tr class="text-left text-xs font-medium text-gray-500 uppercase">
                        <th class="py-2 pr-4">Kecamatan</th>
                        <th class="py-2 pr-4">Wilayah</th>
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
                            <td colspan="2" class="py-4 text-center text-gray-400">Belum ada data</td>
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
                //var counts = @json($data->groupBy('wilayah')->map->count());
                var counts = @json(
                    $data->pluck('nama_kecamatan', 'id')->mapWithKeys(function ($nama) {
                        return [$nama => 1];
                    }));
                new Chart(el.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: Object.keys(counts),
                        datasets: [{
                            data: Object.values(counts),
                            backgroundColor: ['#4f46e5', '#0ea5e9', '#10b981', '#f59e0b', '#f43f5e']
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'right'
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
