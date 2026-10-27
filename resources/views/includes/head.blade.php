<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- google font playfait --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    {{-- Google font didac gothic --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Didact+Gothic&display=swap" rel="stylesheet">

    {{-- Bootstrap icon --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/Yovi Tenda Logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jqueryui@1.11.1/jquery-ui.min.css">
    {{-- Toastify --}}
    <link rel="stylesheet" href="{{ asset('css/toastify.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.css') }}">
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title"
        content="{{ config('app.name') . ': Sewa Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah' ?? config('app.name') }}" />
    <meta property="og:url" content="https://yovitenda.com" />
    <meta property="og:site_name"
        content="{{ config('app.name') . ': Sewa Paket Tenda, Makeup, Katering dan Aksesoris Jakarta Barat Murah' ?? config('app.name') }}" />
    <link rel="canonical" href="https://yovitenda.com" />
    <meta name="robots" content="index,follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="Bahasa">
    <meta name="author" content="Yovi Wedding Organizer Tenda">
    <meta name="revisit-after" content="1 days">


    <title>Sewa Tenda Jakarta Barat - Yovi Tenda - {{ $titlePage }}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!--<meta name="description" content="Yovi Tenda, sewa tenda, tenda murah, tenda terpercaya, Jakarta, Jakarta Selatan, Jakarta Pusat, Jakarta Barat, Jakarta Timur, Bogor, Depok, Tangerang, tenda pernikahan, panggung, tenda rigging, tenda kerucut, AC standing, Genset, kursi futura, meja bulat, meja persegi, misty fan, kipas angin embun, karpet, permadani, pelaminan, mini garden, sound system, organ tunggal, gambus, band akustik, lighting" />-->
    <!--<meta name="description" content="Yovi Tenda menyediakan jasa sewa tenda murah dan terpercaya di Jakarta. Menyediakan berbagai perlengkapan acara seperti panggung, dekorasi, sound system, dan lainnya." />-->
    <meta name="description"
        content="Yovi Tenda menyediakan jasa sewa tenda murah dan terpercaya di Jakarta Barat. Menyediakan berbagai perlengkapan acara seperti panggung, dekorasi, sound system, dan lainnya dengan harga yang murah dan bersahabat." />

    <meta name="keywords"
        content="sewa tenda, tenda murah, tenda terpercaya, Jakarta, Jakarta Selatan, Jakarta Pusat, Jakarta Barat, Jakarta Timur, Bogor, Depok, Tangerang, tenda pernikahan, panggung, tenda rigging, tenda kerucut, AC standing, Genset, kursi futura, meja bulat, meja persegi, misty fan, kipas angin embun, karpet, permadani, pelaminan, mini garden, sound system, organ tunggal, gambus, band akustik, lighting" />
    @yield('heads')

</head>

<body>
