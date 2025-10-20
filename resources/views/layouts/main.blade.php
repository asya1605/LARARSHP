<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'RSHP Universitas Airlangga')</title>

  <!-- ✅ Tailwind CSS CDN Resmi -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- Font modern -->
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

  <style>
    body { font-family: 'Inter', sans-serif; }
    a, button { transition: all 0.2s ease-in-out; }
    .hover-up:hover { transform: translateY(-3px); }
  </style>
</head>
<body class="bg-gray-50">
  <x-navbar />
  <main class="pt-20">
    @yield('content')
  </main>
  <x-footer />
</body>
</html>
