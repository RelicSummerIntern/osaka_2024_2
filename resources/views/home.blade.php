<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>なごみネット</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>
<body>
    <div class="container-wrapper">
        <header>
            <h1>なごみネット</h1>
        </header>
        <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>

        <main>
            <section class="button-section">
                <a href="{{ route('login') }}" class="button">
                    ログイン
                </a>
            </section>
            <section class="button-section">
                <a href="{{ route('register') }}" class="button">
                    新規登録
                </a>
            </section>
        </main>

        <footer>
            <!-- <p>&copy; 2024 なごみネット</p> -->
        </footer>
    </div>
</body>
</html>
