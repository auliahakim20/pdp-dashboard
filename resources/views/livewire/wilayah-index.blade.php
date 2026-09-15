<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6 overflow-x-auto">
            <h3 class="text-lg font-semibold mb-4">Daftar Wilayah Pengambilan Data</h3>
            <table class="min-w-full divide-y divide-gray-200">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Kecamatan</th>
                        <th class="px-4 py-2 text-left text-xs font-medium text-gray-500 uppercase">Wilayah</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($data as $row)
                        <tr>
                            <td class="px-4 py-2">{{ $row->nama_kecamatan }}</td>
                            <td class="px-4 py-2">{{ $row->wilayah }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="2" class="px-4 py-4 text-center text-gray-400">Belum ada data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
