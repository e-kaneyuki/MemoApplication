<header class="navbar navbar-dark header" style="background-color: #C7B2D6; margin-bottom:100px;">

    <a class="navbar-brand text-dark" style="font-size:x-large;" href="/">
        セルフ管理ツール
    </a>

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

    @endif

</header>
