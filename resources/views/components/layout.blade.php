<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-gray-100 justify-center" style="background: url('https://img.freepik.com/premium-photo/black-stone-food-background-cooking-ingredients-top-view-free-space-your-text_187166-12991.jpg?w=740') repeat-y center top / 100% auto;">

    @include('components.nav') <!-- Itt hívod be a nav.blade.php-t -->

    <main class="flex-grow flex items-center justify-center">
        {{$slot}}
    </main>

    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>



</body>

</html>