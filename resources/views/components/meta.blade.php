<title>{{ $meta['title'] ?? env('APP_NAME') }}</title>
<meta name="title" content="{{ $meta['title'] ?? env('APP_NAME') }}">
<meta name="description" content="{{ $meta['description'] ?? env('APP_DESCRIPTION') }}">

<meta property="og:type" content="website">
<meta property="og:url" content="{{ $meta['url'] ?? env('APP_URL') }}">
<meta property="og:title" content="{{ $meta['title'] ?? env('APP_NAME') }}">
<meta property="og:description" content="{{ $meta['description'] ?? env('APP_DESCRIPTION') }}">
<meta property="og:image" content="{{ $meta['image'] ?? asset('img/meta.png') }}">
<meta property="og:image:alt" content="{{ $meta['title'] ?? env('APP_NAME') }}" />
<meta property="og:site_name" content="{{ env('APP_NAME') }}" />
<meta property=" og:locale" content="en_US" />

<!-- Twitter -->
<meta property="twitter:card" content="summary_large_image">
<meta property="twitter:url" content="{{ $meta['url'] ?? env('APP_URL') }}">
<meta property="twitter:image" content="{{ $meta['image'] ?? asset('img/meta.png') }}">
<meta property="twitter:title" content="{{ $meta['title'] ?? env('APP_NAME') }}">
<meta property="twitter:description" content="{{ $meta['description'] ?? env('APP_DESCRIPTION') }}">
<meta name="theme-color" content="#ff541a">
