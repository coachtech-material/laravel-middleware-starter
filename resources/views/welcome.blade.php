<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ミドルウェア学習用アプリ</title>

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
            text-align: center;
        }

        h1 {
            color: #1f2937;
            margin-bottom: 1rem;
            font-size: 1.5rem;
        }

        .description {
            color: #6b7280;
            margin-bottom: 1.5rem;
        }

        .user-info {
            background: #eff6ff;
            border: 1px solid #bfdbfe;
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1.5rem;
            color: #1e40af;
        }

        .links {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .links a,
        .links button {
            display: block;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
            cursor: pointer;
        }

        .btn-primary {
            background: #3b82f6;
            color: white;
            border: none;
        }

        .btn-primary:hover {
            background: #2563eb;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
            border: none;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .btn-danger {
            background: #ef4444;
            color: white;
            border: none;
            width: 100%;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        .admin-link {
            background: #8b5cf6;
            color: white;
        }

        .admin-link:hover {
            background: #7c3aed;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>ミドルウェア学習用アプリ</h1>
        <p class="description">カスタムミドルウェアで管理者専用ページを保護しましょう</p>

        @auth
            <div class="user-info">
                <p><strong>ログイン中:</strong> {{ auth()->user()->name }}</p>
                <p><strong>権限:</strong> {{ auth()->user()->is_admin ? '管理者' : '一般ユーザー' }}</p>
            </div>

            <div class="links">
                <a href="/admin" class="admin-link">管理者ページにアクセス</a>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn-danger">ログアウト</button>
                </form>
            </div>
        @else
            <div class="links">
                <a href="{{ route('login') }}" class="btn-primary">ログイン</a>
                <a href="{{ route('register') }}" class="btn-secondary">新規登録</a>
            </div>
        @endauth
    </div>
</body>

</html>
