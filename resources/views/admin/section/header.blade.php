<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    @vite(['resources/css/admin.css', 'resources/js/admin.js'])

    @yield('styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
