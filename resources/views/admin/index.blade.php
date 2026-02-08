<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ページ</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f3f4f6;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }

        h1 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .welcome {
            color: #4b5563;
            margin-bottom: 1rem;
        }

        .badge {
            display: inline-block;
            background: #10b981;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.875rem;
        }

        .info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 1rem;
            border-radius: 4px;
            margin-top: 1rem;
            color: #1e40af;
        }

        .links {
            margin-top: 1.5rem;
        }

        .links a {
            color: #3b82f6;
            text-decoration: none;
            margin-right: 1rem;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .logout-button {
            background: none;
            border: none;
            color: #3b82f6;
            cursor: pointer;
            font-size: 1rem;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>管理者ページ</h1>

        <p class="welcome">
            ようこそ、{{ auth()->user()->name }} さん！
        </p>

        <span class="badge">管理者</span>

        <div class="info">
            このページは管理者のみアクセスできます。
        </div>

        <div class="links">
            <a href="/">トップページ</a>

            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-button">
                    ログアウト
                </button>
            </form>
        </div>
    </div>
</body>

</html>
