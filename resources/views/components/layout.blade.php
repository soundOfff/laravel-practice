<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/app.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>


</head>

<body>
    <div class="content w-3/4 flex justify-center flex-col items-center">
        <x-utils.header></x-utils.header>
        {{ $slot }}
        <x-utils.footer></x-utils.footer>
    </div>

    <x-utils.flash></x-utils.flash>

</body>

</html>
