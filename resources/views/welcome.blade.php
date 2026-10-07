<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Bem-vindo') }} - {{ config('app.name', 'Agenda') }}</title>

    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,400;0,500;0,600;1,400&family=Work+Sans:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --paper: #FAF7F1;
            --paper-line: #DCD5C4;
            --ink: #1E2A28;
            --ink-soft: #52635F;
            --accent: #B8762F;
            --accent-deep: #8C5A22;
            --teal: #2F6B64;
            --amber: #C98A2C;
            --green: #5A7D4A;
            --card: #FFFFFF;
        }

        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: var(--paper);
            color: var(--ink);
            font-family: 'Work Sans', sans-serif;
            min-height: 100vh;
        }

        .page {
            max-width: 1120px;
            margin: 0 auto;
            padding: 28px 24px 60px;
        }

        /* ---------- top bar ---------- */
        .topbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 56px;
        }

        .brand {
            font-family: 'Newsreader', serif;
            font-size: 20px;
            font-style: italic;
            color: var(--ink);
        }

        .auth-links {
            display: flex;
            gap: 10px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            font-family: 'Work Sans', sans-serif;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            padding: 9px 18px;
            border-radius: 7px 7px 2px 2px;
            border: 1px solid transparent;
            transition: transform .15s ease, background-color .15s ease, border-color .15s ease;
        }

        .btn:focus-visible {
            outline: 2px solid var(--teal);
            outline-offset: 2px;
        }

        .btn-ghost {
            color: var(--ink);
            border-color: var(--paper-line);
            background: transparent;
        }

        .btn-ghost:hover { border-color: var(--ink-soft); }

        .btn-solid {
            color: #fff;
            background: var(--accent);
        }

        .btn-solid:hover { background: var(--accent-deep); }

        .btn-solid:active, .btn-ghost:active { transform: translateY(1px); }

        /* ---------- hero ---------- */
        .hero {
            display: grid;
            grid-template-columns: 1.1fr 0.9fr;
            gap: 48px;
            align-items: stretch;
        }

        @media (max-width: 860px) {
            .hero { grid-template-columns: 1fr; }
        }

        .hero-copy {
            padding-top: 8px;
            opacity: 0;
            animation: rise .7s ease-out forwards;
        }

        @media (prefers-reduced-motion: reduce) {
            .hero-copy { opacity: 1; animation: none; }
        }

        @keyframes rise {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stamp {
            display: inline-block;
            font-family: 'Work Sans', monospace;
            font-size: 12.5px;
            letter-spacing: .02em;
            color: var(--ink-soft);
            border: 1px solid var(--paper-line);
            border-radius: 4px;
            padding: 4px 10px;
            margin-bottom: 22px;
        }

        h1 {
            font-family: 'Newsreader', serif;
            font-weight: 500;
            font-size: clamp(32px, 4.2vw, 48px);
            line-height: 1.15;
            margin: 0 0 20px;
            max-width: 15ch;
        }

        .lede {
            font-size: 16px;
            line-height: 1.65;
            color: var(--ink-soft);
            max-width: 46ch;
            margin: 0 0 32px;
        }

        .cta-row {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .btn-lg {
            padding: 12px 22px;
            font-size: 15px;
        }

        /* ---------- planner mock card ---------- */
        .mock-wrap {
            position: relative;
            display: flex;
        }

        .mock-tab {
            writing-mode: vertical-rl;
            text-orientation: mixed;
            transform: rotate(180deg);
            font-family: 'Work Sans', sans-serif;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .04em;
            color: #fff;
            background: var(--teal);
            padding: 16px 8px;
            border-radius: 8px 0 0 8px;
        }

        .mock-card {
            flex: 1;
            background: var(--card);
            border: 1px solid var(--paper-line);
            border-radius: 2px 10px 10px 2px;
            padding: 28px 26px;
            background-image: repeating-linear-gradient(
                to bottom,
                transparent 0,
                transparent 38px,
                var(--paper-line) 39px
            );
            box-shadow: 0 1px 2px rgba(30, 42, 40, .04);
        }

        .mock-date {
            font-family: 'Newsreader', serif;
            font-style: italic;
            font-size: 18px;
            margin: 0 0 18px;
            color: var(--ink);
        }

        .mock-item {
            display: flex;
            align-items: baseline;
            gap: 12px;
            height: 39px;
        }

        .mock-dot {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .mock-time {
            font-family: 'Work Sans', monospace;
            font-size: 13px;
            color: var(--ink-soft);
            width: 42px;
            flex-shrink: 0;
        }

        .mock-title {
            font-size: 14.5px;
            color: var(--ink);
        }

        .mock-title span {
            display: block;
            font-size: 12px;
            color: var(--ink-soft);
        }

        .legend {
            display: flex;
            gap: 16px;
            margin-top: 20px;
            padding-top: 14px;
            border-top: 1px dashed var(--paper-line);
            font-size: 12px;
            color: var(--ink-soft);
        }

        .legend span {
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .legend i {
            width: 7px;
            height: 7px;
            border-radius: 50%;
            display: inline-block;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="topbar">
            <div class="brand">Agenda</div>

            @if (Route::has('login'))
                <div class="auth-links">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-solid">Abrir agenda</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-ghost">Entrar</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-solid">Criar conta</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>

        <div class="hero">
            <div class="hero-copy">
                <span class="stamp">{{ now()->locale('pt_BR')->translatedFormat('d \d\e F, Y') }}</span>
                <h1>Seus compromissos, organizados do seu jeito.</h1>
                <p class="lede">
                    Categorias, prioridades e locais em um só lugar. Monte sua rotina,
                    acompanhe seus horários e nunca mais perca um compromisso importante.
                </p>
                <div class="cta-row">
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-solid btn-lg">Abrir minha agenda</a>
                    @else
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-solid btn-lg">Criar minha conta</a>
                        @endif
                        <a href="{{ route('login') }}" class="btn btn-ghost btn-lg">Já tenho conta</a>
                    @endauth
                </div>
            </div>

            <div class="mock-wrap">
                <div class="mock-tab">AGENDA PESSOAL</div>
                <div class="mock-card">
                    <p class="mock-date">Hoje</p>

                    <div class="mock-item">
                        <span class="mock-dot" style="background: var(--teal)"></span>
                        <span class="mock-time">09:00</span>
                        <span class="mock-title">Reunião de equipe<span>Sala virtual</span></span>
                    </div>
                    <div class="mock-item">
                        <span class="mock-dot" style="background: var(--amber)"></span>
                        <span class="mock-time">13:30</span>
                        <span class="mock-title">Consulta médica<span>Clínica Central</span></span>
                    </div>
                    <div class="mock-item">
                        <span class="mock-dot" style="background: var(--green)"></span>
                        <span class="mock-time">19:00</span>
                        <span class="mock-title">Corrida no parque<span>Prioridade alta</span></span>
                    </div>

                    <div class="legend">
                        <span><i style="background: var(--teal)"></i> Trabalho</span>
                        <span><i style="background: var(--amber)"></i> Saúde</span>
                        <span><i style="background: var(--green)"></i> Pessoal</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>