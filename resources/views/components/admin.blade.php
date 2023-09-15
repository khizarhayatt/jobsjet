<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>{{ ' | ' . config('app.name') }}</title>
    <script src="{{ asset('js/app.min.js') }}"></script>
    @vite(['resources/js/app.js'])
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />


</head>

<body>
    <div class="loader"></div>
    <div id="app">
        {{ $slot }}
    </div>
</body>

</html>
