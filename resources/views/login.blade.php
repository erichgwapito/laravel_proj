<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in - {{ config('app.name', 'Laravel') }}</title>
    <style>
        body {
            margin: 0;
            font-family: 'Consolas', 'Courier New', ui-sans-serif, monospace;
            background: radial-gradient(circle at top right, #1a1108 0%, #0a0a0a 60%);
            color: #e8e6e3;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .card {
            background: #141414;
            border: 1px solid #2a2a2a;
            border-radius: 14px;
            padding: 48px;
            width: 100%;
            max-width: 380px;
            box-shadow: 0 0 30px rgba(255,111,0,0.15);
        }
        h1 { color: #fff; font-size: 24px; margin: 0 0 24px 0; text-align: center; }
        label { display: block; color: #8a8a8a; font-size: 13px; margin-bottom: 6px; }
        input {
            width: 100%; box-sizing: border-box; padding: 10px 12px;
            background: #0a0a0a; border: 1px solid #2a2a2a; border-radius: 6px;
            color: #e8e6e3; font-family: inherit; margin-bottom: 18px;
        }
        input:focus { outline: none; border-color: #FF6F00; }
        button {
            width: 100%; padding: 12px; background: #FF6F00; color: #0a0a0a;
            border: none; border-radius: 6px; font-weight: 700; font-family: inherit;
            font-size: 14px; cursor: pointer;
        }
        .foot { text-align: center; margin-top: 20px; font-size: 13px; color: #8a8a8a; }
        .foot a { color: #FF6F00; text-decoration: none; }
        .back { display:block; text-align:center; margin-bottom:24px; color:#8a8a8a; text-decoration:none; font-size:13px; }
    </style>
</head>
<body>
    <div class="card">
        <a href="{{ url('/') }}" class="back">← Back to Home</a>
        <h1>Log in to your account</h1>
        <form onsubmit="event.preventDefault(); alert('Demo only — no backend auth yet.');">
            <label>Email address</label>
            <input type="email" placeholder="you@example.com">
            <label>Password</label>
            <input type="password" placeholder="••••••••">
            <button type="submit">Log in</button>
        </form>
        <div class="foot">Don't have an account? <a href="{{ url('/register') }}">Sign up</a></div>
    </div>
</body>
</html>