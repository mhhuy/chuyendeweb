<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? 'Shop' }}</title>
    @vite('resources/css/app.css')
    {{ $header ?? '' }}
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" type="image/x-icon" href="./public/assets/logo-nike-icolorBranding-1024x661.jpg">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <x-header/>
    <main>
        {{ $slot }}
    </main>
    <!-- footer -->
    <x-footer/>
    {{ $footeer ?? '' }}
</body>

</html>
