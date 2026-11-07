<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <style>
        /* ===== Menu navbar ===== */
        .nav-menu {
            position: relative;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        .nav-link {
            position: relative;
            z-index: 1;
            padding: 8px 16px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
            text-decoration: none;
            transition: color .2s ease, transform .2s ease;
        }

        .nav-link:hover {
            color: #4338ca;
            transform: translateY(-1px);
        }

        .nav-link.is-active {
            color: #4338ca;
        }

        .nav-pill {
            position: absolute;
            z-index: 0;
            top: 0;
            bottom: 0;
            left: 0;
            width: 0;
            border-radius: 8px;
            background: #e0e7ff;
            opacity: 0;
            pointer-events: none;
            transition: left .3s cubic-bezier(.2, .8, .2, 1), width .3s cubic-bezier(.2, .8, .2, 1), opacity .2s ease;
        }

        .nav-pill.is-ready {
            opacity: 1;
        }

        /* ===== Efek kartu ===== */
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
            .fx-card.is-moving,
            .nav-pill,
            .nav-link {
                transition: none;
            }

            .fx-card:hover,
            .nav-link:hover {
                transform: none;
            }
        }
    </style>

    @livewireStyles

    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased bg-gray-100">

    <nav class="bg-white border-b border-gray-200 sticky top-0 z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">

                <!-- Brand -->
                <div class="flex items-center gap-2">

                    <span class="font-bold text-lg text-indigo-600">{{ config('app.name') }}</span>
                </div>

                <!-- Menu -->
                <div class="nav-menu" id="navMenu">
                    <span class="nav-pill" id="navPill"></span>

                    <a href="{{ route('pengujian.index') }}"
                        class="nav-link {{ request()->routeIs('pengujian.index') || request()->routeIs('home') ? 'is-active' : '' }}">
                        Result
                    </a>

                    <a href="{{ route('wilayah.index') }}"
                        class="nav-link {{ request()->routeIs('wilayah.index') ? 'is-active' : '' }}">
                        Dataset
                    </a>
                </div>

            </div>
        </div>
    </nav>

    <main>
        {{ $slot }}
    </main>

    <footer class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 text-center text-xs text-gray-400">
        © {{ date('Y') }} {{ config('app.name') }} — Water Monitoring and Evaluation using K-Nearest Neighbor in
        Kendal
    </footer>

    @livewireScripts

    <script>
        // ===== Pill geser pada menu navbar =====
        (function() {
            var menu = document.getElementById('navMenu');
            var pill = document.getElementById('navPill');
            if (!menu || !pill) return;

            var links = menu.querySelectorAll('.nav-link');

            function aktif() {
                return menu.querySelector('.nav-link.is-active');
            }

            function pindahKe(el) {
                if (!el) {
                    pill.classList.remove('is-ready');
                    return;
                }
                pill.style.left = el.offsetLeft + 'px';
                pill.style.width = el.offsetWidth + 'px';
                pill.classList.add('is-ready');
            }

            function tempatkanTanpaAnimasi() {
                pill.style.transition = 'none';
                pindahKe(aktif());
                pill.offsetWidth; // paksa browser menerapkan posisi
                pill.style.transition = '';
            }

            links.forEach(function(l) {
                l.addEventListener('pointerenter', function() {
                    pindahKe(l);
                });
                l.addEventListener('focus', function() {
                    pindahKe(l);
                });
            });
            menu.addEventListener('pointerleave', function() {
                pindahKe(aktif());
            });
            menu.addEventListener('focusout', function() {
                pindahKe(aktif());
            });

            tempatkanTanpaAnimasi();
            window.addEventListener('load', tempatkanTanpaAnimasi); // font Nunito mengubah lebar teks
            window.addEventListener('resize', tempatkanTanpaAnimasi);
        })();

        // ===== Efek hover kartu (berlaku di semua halaman) =====
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
    </script>
</body>

</html>
