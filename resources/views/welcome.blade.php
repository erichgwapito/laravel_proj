<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <style>
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255,111,0,0.3); }
            50% { box-shadow: 0 0 35px rgba(255,111,0,0.55); }
        }
       body {
            margin: 0;
            font-family: 'Consolas', 'Courier New', ui-sans-serif, monospace;
            background: radial-gradient(circle at top right, #1a1108 0%, #0a0a0a 60%);
            color: #e8e6e3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            box-sizing: border-box;
            padding-bottom: 90px;
        }
        body::before {
            content: "";
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(255,111,0,0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(255,111,0,0.05) 1px, transparent 1px);
            background-size: 40px 40px;
            pointer-events: none;
        }
        .btn-outline:hover { border-color: #FF6F00 !important; color: #FF6F00 !important; }
        .link-item:hover { color: #FF9A3D !important; padding-left: 6px; }
        .link-item { transition: all 0.2s ease; }
    </style>
</head>
<body>

    <header style="position:absolute; top:24px; right:32px; z-index:2; display:flex; flex-direction:column; align-items:stretch; gap:10px;">
        @if (Route::has('login'))
            @auth
                <a href="{{ url('/dashboard') }}" class="btn-outline" style="display:inline-flex; align-items:center; justify-content:center; padding:9px 18px; border:1px solid #3a3a3a; border-radius:6px; text-decoration:none; color:#e8e6e3; font-size:14px; box-sizing:border-box; transition:all 0.2s ease;">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn-outline" style="display:inline-flex; align-items:center; justify-content:center; padding:9px 18px; border:1px solid #3a3a3a; border-radius:6px; text-decoration:none; color:#e8e6e3; font-size:14px; box-sizing:border-box; transition:all 0.2s ease;">Log in</a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-outline" style="display:inline-flex; align-items:center; justify-content:center; padding:9px 18px; border:1px solid #3a3a3a; border-radius:6px; text-decoration:none; color:#e8e6e3; font-size:14px; box-sizing:border-box; transition:all 0.2s ease;">Register</a>
                @endif
            @endauth
        @endif
    </header>

    <main style="position:relative; z-index:1; display:flex; max-width:920px; width:100%; margin:20px; border-radius:14px; overflow:hidden; background:#141414; border:1px solid #2a2a2a; flex-wrap:wrap; animation: glow 4s ease-in-out infinite;">

        <div style="flex:1; min-width:320px; padding:56px; box-sizing:border-box;">
            <div style="display:inline-block; padding:4px 12px; border:1px solid #FF6F00; border-radius:20px; color:#FF6F00; font-size:11px; letter-spacing:2px; text-transform:uppercase; margin-bottom:20px;">
                System Online
            </div>
            <h1 style="font-size:30px; margin:0 0 10px 0; color:#fff; font-weight:700;">Let's get started</h1>
            <p style="color:#8a8a8a; margin-bottom:28px; line-height:1.6; font-size:14px;">Laravel has an incredibly rich ecosystem.<br>We suggest starting with the following:</p>

            <ul style="list-style:none; padding:0; margin:0 0 28px 0;">
                <li class="link-item" style="padding:12px 0; border-bottom:1px solid #262626;">
                    <a href="https://laravel.com/docs" target="_blank" style="color:#FF6F00; text-decoration:none; font-weight:500; font-size:14px;">→ Read the Documentation</a>
                </li>
                <li class="link-item" style="padding:12px 0; border-bottom:1px solid #262626;">
                    <a href="https://laracasts.com" target="_blank" style="color:#FF6F00; text-decoration:none; font-weight:500; font-size:14px;">→ Watch video tutorials at Laracasts</a>
                </li>
                <li class="link-item" style="padding:12px 0; border-bottom:1px solid #262626;">
                    <a href="{{ url('/counter') }}" style="color:#FF6F00; text-decoration:none; font-weight:500; font-size:14px;">→ View Interactive Counter (Livewire Demo)</a>
                </li>
                <li class="link-item" style="padding:12px 0; border-bottom:1px solid #262626;">
                    <a href="{{ url('/todos') }}" style="color:#FF6F00; text-decoration:none; font-weight:500; font-size:14px;">→ View To-Do List (Livewire Demo)</a>
                </li>
            </ul>

            <a href="{{ url('/counter') }}" style="display:inline-block; padding:12px 28px; background:#FF6F00; color:#0a0a0a; text-decoration:none; border-radius:6px; font-weight:700; font-size:14px; letter-spacing:0.5px;">TRY THE DEMO →</a>
        </div>

        <div style="flex:1; min-width:280px; background:linear-gradient(160deg, #1a1108, #0a0a0a); display:flex; align-items:center; justify-content:center; padding:40px; box-sizing:border-box; border-left:1px solid #2a2a2a; position:relative;">
            <h1 style="font-size:52px; font-weight:800; color:#FF6F00; margin:0; text-align:center; line-height:1; text-shadow:0 0 30px rgba(255,111,0,0.5);">Laravel</h1>
        </div>

    </main>

@if (session('demo_logged_in'))
        <div x-data="{ open: false }" style="position:fixed; bottom:16px; left:16px; z-index:10; font-family:'Consolas','Courier New',ui-sans-serif,monospace;">


            <div @click="open = !open" style="display:flex; align-items:center; gap:8px; background:#141414; border:1px solid #2a2a2a; border-radius:8px; padding:6px 10px; box-shadow:0 4px 16px rgba(0,0,0,0.4); cursor:pointer; width:200px; box-sizing:border-box;">
                <div style="width:24px; height:24px; border-radius:50%; background:#FF6F00; color:#0a0a0a; display:flex; align-items:center; justify-content:center; font-weight:800; font-size:11px; flex-shrink:0;">
                    E
                </div>
                <div style="flex:1; min-width:0;">
                    <div style="color:#e8e6e3; font-size:11px; font-weight:700; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; line-height:1.2;">Erich</div>
                    <div style="color:#8a8a8a; font-size:9px; line-height:1.2;">Free plan</div>
                </div>
                <div style="color:#8a8a8a; font-size:10px; flex-shrink:0;" x-text="open ? '⌃' : '⌄'"></div>
            </div>

            <div x-show="open" @click.outside="open = false" x-cloak style="margin-top:6px; width:200px; background:#141414; border:1px solid #2a2a2a; border-radius:8px; overflow:hidden; box-shadow:0 4px 16px rgba(0,0,0,0.4);">
                <a href="{{ url('/logout') }}" style="display:block; padding:8px 12px; color:#e8e6e3; text-decoration:none; font-size:11px; border-bottom:1px solid #262626;">Sign out</a>
                <a href="{{ url('/login') }}" style="display:block; padding:8px 12px; color:#8a8a8a; text-decoration:none; font-size:11px;">Switch account</a>
            </div>

        </div>
    @endif

    @livewireScripts
</body>
</html>