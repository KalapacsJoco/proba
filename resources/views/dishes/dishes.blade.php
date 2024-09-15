<x-layout>
    <section class="dishes flex flex-col items-center space-y-4 horizontal vertical">
        @if($dishes->isNotEmpty())
            @foreach ($dishes as $index => $dish)
                <div class="border border-gray-100 text-gray-100  rounded-lg shadow w-auto mx-auto flex">
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
                            <form action="" method="GET">
                                @csrf
                                <button type="submit" class="text-green-100 bg-transparent border border-green-100 rounded-lg shadow-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-400 focus:ring-opacity-75 px-6 py-3">
                                    Módosítás
                                </button>
                            </form>

                            <form action="" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-100 bg-transparent border border-red-100 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 px-6 py-3">
                                    Törlés
                                </button>
                            </form>
                        @else
                            <form method="POST" action="">
                                @csrf
                                <input type="hidden" name="dish_id" value="{{ $dish->id }}">
                                <button type="submit" class="order-button text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-1">
                                    Kosárba
                                </button>
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
