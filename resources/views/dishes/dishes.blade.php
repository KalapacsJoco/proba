<x-layout>
    <style>
        .horizontal {
            margin-left: calc(100vw * 0.2);
            /* 20%-os margó a bal oldalon */
            margin-right: calc(100vw * 0.2);
            /* 20%-os margó a jobb oldalon */
        }

        .vertical {
            height: calc(100vh / 1.5);
            /* 1.5 elem férjen el egy képernyőn */
        }
    </style>
    <section class="dishes flex flex-col items-center space-y-4 horizontal vertical  overflow-auto">
        @if($dishes->isNotEmpty())
        @foreach ($dishes as $index => $dish)
        <div class="border border-gray-100 text-gray-100   rounded-lg shadow w-auto mx-auto flex">
            <div class="w-1/2 h-full">
                <img src="{{ asset('storage/' . $dish->image) }}" alt="{{ $dish->name }}">
            </div>

            <div class="w-1/2 pl-4 flex flex-col justify-center items-center">
                <h2 class="text-xl font-bold mb-2 text-gray-100">{{ $dish->name }}</h2>
                <p class="text-gray-100 mb-2">{{ $dish->description }}</p>
                <p class="text-gray-100 font-bold">{{ number_format($dish->price, 2) }} Ft</p>

                @if(Auth::guest())
                <div>
                    Kérünk lépj be vagy regisztrálj a rendeléshez.
                </div>
                @elseif(Auth::check() && Auth::user()->isAdmin)
                <div class="flex justify-center items-center space-x-4 h-20">
                    <form action="" method="GET">
                        @csrf
                        <x-primary-link href="{{route('dishes.edit', ['dish' => $dish])}}">
                            Módosítás
                        </x-primary-link>

                    </form>

                    <form action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-danger-button type="submit" class="mt-3" >
                            Törlés
                        </x-danger-button>
                    </form>
                </div>
                @else
                <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                    <x-primary-button type="submit">
                        Kosárba
                    </x-primary-button>
                    <input type="number" value="1" name="qty" min="1" max="99" class="qty text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-2 py-1 text-base w-16">
                    <span>db</span>
                </form>
                @endif
            </div>
        </div>
        @endforeach
        @else
        <p>Nincsenek elérhető ételek.</p>
        @endif
    </section>

</x-layout>