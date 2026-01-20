<!DOCTYPE html> 
<html class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog App</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="min-h-full">
    <header class="bg-gray-800 text-white p-4">
        <div class="container mx-auto">
            <h1 class="text-2xl font-bold">My Blog</h1>
        </div>
    </header>
    <main class="min-h-full">
        <?= $content ?>
    </main>
    <footer class="bg-gray-800 text-white p-4 mt-8">
        <div class="container mx-auto text-center">
            &copy; <?= date('Y') ?> My Blog. All rights reserved.
        </div>
    </footer>
</body>
</html>