<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-gray-100 justify-center" style="background: url('https://img.freepik.com/premium-photo/black-stone-food-background-cooking-ingredients-top-view-free-space-your-text_187166-12991.jpg?w=740') repeat-y center top / 100% auto;">

    <nav>
        <div>
            @auth
            <a
                href="{{ url('/dishes') }}"
                class="rounded-md px-3 py-2 text-gray-100 ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white">
            </a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                @method('POST')
                <input type="submit" value="Kijelentkezés">
            </form>

            @else
            <a href="{{ route('register') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3">Regisztrálás</a>
            <a href="{{ route('login') }}" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3">Bejelentkezés</a>
            @endauth
        </div>
    </nav>

    <main class="flex-grow flex items-center">
        {{$slot}}
    </main>

    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>

</body>

</html>