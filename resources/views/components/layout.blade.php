

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/style.css">
</head>

<body class="min-h-screen flex flex-col bg-gray-100 text-gray-100 justify-center" style="background: url('https://img.freepik.com/premium-photo/black-stone-food-background-cooking-ingredients-top-view-free-space-your-text_187166-12991.jpg?w=740') repeat-y center top / 100% auto;">

    <div class="fixed top-0 right-20 h-screen p-4 flex flex-col  items-end bg-transparent text-white">

            <div class="flex items-center space-x-4">
                <span class="pr-4"><?php echo htmlspecialchars("Üdv újra "); ?></span>

                <a href="/etterem/includes/logout" class="text-red-100 bg-transparent border border-red-100 rounded-lg shadow-md hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-opacity-75 px-6 py-1">Kijelentkezés</a>
            </div>

            <a href="/etterem/view/order" id="toggleCartButton" class="mt-64 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3">
                Kosár tartalma<span id="cartNumber" class="text-sm">
                    <script>
                        // PHP által generált adat beillesztése egy globális változóba
                        let totalItemsInCart = <?php echo !empty($_SESSION['cart']) ? array_sum(array_column($_SESSION['cart'], 'qty')) : 0; ?>;
                    </script>
                </span>
            </a>



            <a href="/etterem/login" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3">Bejelentkezés</a>
            <a href="/etterem/register" class="mt-12 text-grey-100 bg-transparent border border-gray-100 rounded-lg shadow-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-opacity-75 px-6 py-3">Regisztrálás</a>
    </div>

    <main class="flex-grow flex items-center">
       {{$slot}}
    </main>

    <footer>
        <p>&copy; 2024 My Website</p>
    </footer>

    <script src="/assets/navbar.js"></script>
</body>

</html>