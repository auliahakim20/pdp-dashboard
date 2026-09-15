<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
            <h3 class="text-lg font-semibold mb-4">Tabel Hasil Pengujian</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Percobaan</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Akurasi (%)</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Recall (%)</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">F1 Score (%)</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($data as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $row->name }}</td>
                            <td class="px-4 py-2">{{ $row->tanggal }}</td>
                            <td class="px-4 py-2">{{ $row->accuracy }}</td>
                            <td class="px-4 py-2">{{ $row->recall }}</td>
                            <td class="px-4 py-2">{{ $row->f_score }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-4 text-center text-gray-400">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('chartPengujian');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($data->pluck('nama_percobaan')),
                    datasets: [{
                            label: 'Akurasi',
                            data: @json($data->pluck('akurasi')),
                            borderColor: '#6366f1',
                            tension: 0.3
                        },
                        {
                            label: 'Recall',
                            data: @json($data->pluck('recall')),
                            borderColor: '#10b981',
                            tension: 0.3
                        },
                        {
                            label: 'F1 Score',
                            data: @json($data->pluck('f1_score')),
                            borderColor: '#f59e0b',
                            tension: 0.3
                        },
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
        </script>
    @endpush
</div>
