<nav class="flex items-center justify-between align-center p-4 text-white h-20">
    @auth
        @if(auth()->user()->isAdmin)

        @php
        // Ellenőrzi az aktuális URL-t
        $isOnDishesPage = request()->is('dishes');
        $buttonText = $isOnDishesPage ? 'Új eledel felvétele' : 'Vissza';
        $buttonRoute = $isOnDishesPage ? route('createDish') : route('dishes');
        @endphp

        <form action="{{ $buttonRoute }}" method="GET">
            <x-primary-button type="submit">
                {{ $buttonText }}
            </x-primary-button>
        </form>

        @endif

<div></div>
        <div class="flex justify-center items-center space-x-4 h-20">
            <span>Üdv újra {{ auth()->user()->lastName }}</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <x-danger-button type="submit">
                    Kijelentkezés
                </x-danger-button>
            </form>
        </div>

    @else
        <div></div>
        <div>
            <x-primary-link href="{{ route('login') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 mx-3 px-6 py-3">Bejelentkezés</x-primary-link>
            <x-primary-link href="{{ route('register') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 mx-3 px-6 py-3">Regisztrálás</x-primary-link>
        </div>
    @endauth
</nav>
