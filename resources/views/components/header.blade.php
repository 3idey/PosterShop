@props(['title'])
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="PosterShop - Discover, collect, and share creative posters.">
    <meta name="theme-color" content="#6366f1">
    <title>{{ $title }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:ital,wght@0,400..800;1,400..800&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/css/style.css', 'resources/css/filmsstyle.css', 'resources/css/sportsstyle.css', 'resources/css/randomsstyle.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
</head>
