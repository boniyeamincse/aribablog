@props(['model' => null])

@php
    $seo = $model ? $model->seo : null;
    $title = $seo->title ?? ($model->title ?? config('app.name'));
    $description = $seo->description ?? ($model->excerpt ?? 'Abriba - A premium Laravel blog experience.');
    $url = $seo->canonical_url ?? Request::url();
    $image = $seo->og_image ?? asset('images/og-default.jpg');
@endphp

<!-- Primary Meta Tags -->
<title>{{ $title }}</title>
<meta name="title" content="{{ $title }}">
<meta name="description" content="{{ $description }}">
@if($seo && $seo->keywords)
<meta name="keywords" content="{{ $seo->keywords }}">
@endif

<!-- Open Graph / Facebook -->
<meta property="og:type" content="website">
<meta property="og:url" content="{{ $url }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:image" content="{{ $image }}">

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $url }}">
<meta property="twitter:title" content="{{ $title }}">
<meta property="twitter:description" content="{{ $description }}">
<meta property="twitter:image" content="{{ $image }}">

<!-- Canonical -->
<link rel="canonical" href="{{ $url }}">
