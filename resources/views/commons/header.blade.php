<header class="navbar navbar-dark header sticky-top" style="background-color: #C7B2D6; margin-bottom:50px;">

    <a class="navbar-brand text-dark" style="font-size:x-large;" href="/">
        セルフ管理ツール
    </a>
    <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    @if (Auth::check())
        <div class="mt-3 space-y-1">
            <!-- Authentication -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    {{ __('ログアウト') }}
                </x-responsive-nav-link>
            </form>
        </div>
    @else
    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録</a>
        @endif
    @endif
    </div>
</header>
