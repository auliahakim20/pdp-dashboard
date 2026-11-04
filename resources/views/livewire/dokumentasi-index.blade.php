<div>
    <!-- Hero -->
    <div class="bg-gradient-to-br from-indigo-600 to-indigo-800">
        <div class="max-w-7xl mx-auto py-14 px-4 sm:px-6 lg:px-8 text-center">
            <p class="text-indigo-200 text-xs sm:text-sm font-semibold tracking-widest uppercase">Penelitian Kualitas Air Berbasis IoT</p>
            <h1 class="mt-3 text-3xl sm:text-4xl font-bold text-white">Dokumentasi</h1>
            <p class="mt-3 max-w-2xl mx-auto text-indigo-100 text-sm sm:text-base">
                Foto kegiatan di lapangan: pengambilan sampel air dan proses kerja tim peneliti.
            </p>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 pb-16 space-y-10">

        @foreach ([
            ['kunci' => 'air', 'judul' => 'Pengambilan Air dan Sampel', 'sub' => 'Foto saat pengambilan air dan sampel air di lokasi.', 'foto' => $fotoAir, 'folder' => 'pengambilan-air'],
            ['kunci' => 'tim', 'judul' => 'Proses Tim Bekerja', 'sub' => 'Foto saat tim melakukan pengujian dan pengerjaan penelitian.', 'foto' => $fotoTim, 'folder' => 'tim-bekerja'],
        ] as $g)
            <div class="fx-card bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
                <div class="px-5 sm:px-6 py-4 border-b border-gray-200"
                    style="display:flex; align-items:center; justify-content:space-between; gap:12px; flex-wrap:wrap;">
                    <div>
                        <h3 class="text-base sm:text-lg font-semibold text-gray-800">{{ $g['judul'] }}</h3>
                        <p class="text-xs text-gray-400 mt-0.5">{{ $g['sub'] }}</p>
                    </div>
                    <span class="text-xs font-medium text-gray-600 bg-gray-100 rounded-full px-3 py-1 whitespace-nowrap">
                        {{ $g['foto']->count() }} foto
                    </span>
                </div>

                @if ($g['foto']->isEmpty())
                    <div style="padding:48px 24px; text-align:center; color:#94a3b8; font-size:14px;">
                        Belum ada foto. Taruh file gambar di <code>public/images/dokumentasi/{{ $g['folder'] }}/</code>.
                    </div>
                @else
                    <div style="display:grid; grid-template-columns:repeat(auto-fill,minmax(180px,1fr)); gap:12px; padding:16px 20px 20px;">
                        @foreach ($g['foto'] as $f)
                            <button type="button" class="dok-thumb" data-galeri="{{ $g['kunci'] }}"
                                data-src="{{ $f['url'] }}" data-judul="{{ $f['judul'] }}"
                                aria-label="Perbesar foto: {{ $f['judul'] }}"
                                style="position:relative; display:block; padding:0; border:0; background:#e2e8f0; border-radius:10px; overflow:hidden; cursor:zoom-in; aspect-ratio:4/3;">
                                <img src="{{ $f['url'] }}" alt="{{ $f['judul'] }}" loading="lazy"
                                    style="width:100%; height:100%; object-fit:cover; display:block; transition:transform .3s;">
                                <span
                                    style="position:absolute; left:0; right:0; bottom:0; padding:18px 10px 8px; font-size:12px; color:#fff; text-align:left; background:linear-gradient(to top, rgba(15,23,42,.75), rgba(15,23,42,0)); white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    {{ $f['judul'] }}
                                </span>
                            </button>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>

    <!-- Lightbox -->
    <div id="dokBox" role="dialog" aria-modal="true" aria-label="Pratinjau foto"
        style="display:none; position:fixed; inset:0; z-index:99999; background:rgba(15,23,42,.92); align-items:center; justify-content:center; flex-direction:column; padding:24px;">
        <button type="button" id="dokClose" aria-label="Tutup"
            style="position:absolute; top:14px; right:18px; font-size:34px; line-height:1; color:#fff; background:none; border:0; cursor:pointer;">&times;</button>
        <button type="button" id="dokPrev" aria-label="Foto sebelumnya"
            style="position:absolute; left:12px; top:50%; transform:translateY(-50%); font-size:40px; color:#fff; background:none; border:0; cursor:pointer; padding:8px 14px;">&#8249;</button>
        <button type="button" id="dokNext" aria-label="Foto berikutnya"
            style="position:absolute; right:12px; top:50%; transform:translateY(-50%); font-size:40px; color:#fff; background:none; border:0; cursor:pointer; padding:8px 14px;">&#8250;</button>
        <img id="dokImg" src="" alt=""
            style="max-width:92vw; max-height:78vh; border-radius:8px; box-shadow:0 20px 50px rgba(0,0,0,.5);">
        <p id="dokCap" style="margin-top:14px; color:#e2e8f0; font-size:14px; text-align:center;"></p>
    </div>

    <script>
        (function () {
            var box = document.getElementById('dokBox');
            var img = document.getElementById('dokImg');
            var cap = document.getElementById('dokCap');
            var items = [];
            var idx = 0;

            function tampil() {
                var el = items[idx];
                img.src = el.getAttribute('data-src');
                img.alt = el.getAttribute('data-judul');
                cap.textContent = el.getAttribute('data-judul') + '  (' + (idx + 1) + ' / ' + items.length + ')';
                box.style.display = 'flex';
                document.body.style.overflow = 'hidden';
            }
            function tutup() {
                box.style.display = 'none';
                document.body.style.overflow = '';
            }
            function geser(arah) {
                idx = (idx + arah + items.length) % items.length;
                tampil();
            }

            document.querySelectorAll('.dok-thumb').forEach(function (btn) {
                btn.addEventListener('mouseenter', function () { btn.firstElementChild.style.transform = 'scale(1.06)'; });
                btn.addEventListener('mouseleave', function () { btn.firstElementChild.style.transform = 'scale(1)'; });
                btn.addEventListener('click', function () {
                    var kunci = btn.getAttribute('data-galeri');
                    items = Array.prototype.slice.call(document.querySelectorAll('.dok-thumb[data-galeri="' + kunci + '"]'));
                    idx = items.indexOf(btn);
                    tampil();
                });
            });

            document.getElementById('dokClose').addEventListener('click', tutup);
            document.getElementById('dokPrev').addEventListener('click', function () { geser(-1); });
            document.getElementById('dokNext').addEventListener('click', function () { geser(1); });
            box.addEventListener('click', function (e) { if (e.target === box) tutup(); });

            if (!window.__dokKeyReady) {
                window.__dokKeyReady = true;
                document.addEventListener('keydown', function (e) {
                    if (document.getElementById('dokBox').style.display !== 'flex') return;
                    if (e.key === 'Escape') tutup();
                    if (e.key === 'ArrowLeft') geser(-1);
                    if (e.key === 'ArrowRight') geser(1);
                });
            }
        })();
    </script>
</div>
