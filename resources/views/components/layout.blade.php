<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-gray-100 justify-center" style="background: url('https://img.freepik.com/premium-photo/black-stone-food-background-cooking-ingredients-top-view-free-space-your-text_187166-12991.jpg?w=740') repeat-y center top / 100% auto;">

    <nav>
        <div class="flex items-center space-x-4">
            @auth
            <span>Üdv újra {{ auth()->user()->lastName }}</span>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <input type="submit" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700  px-6 py-3" value="Kijelentkezés">
            </form>
            @if(auth()->user()->isAdmin)
            <a href="{{ route('admin') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 px-6 py-3">Új eledel felvétele</a>


            @endif
        </div>

        @else
        <div>
            <a href="{{ route('register') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700  px-6 py-3">Regisztrálás</a>
            <a href="{{ route('login') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700  px-6 py-3">Bejelentkezés</a>
        </div>

        @endauth
    </nav>

    <main class="flex-grow flex items-center">
        {{$slot}}
    </main>

    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>

</body>

</html>