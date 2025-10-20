<nav class="bg-white shadow-md fixed top-0 left-0 w-full z-50">
  <div class="max-w-7xl mx-auto flex items-center justify-between px-6 py-4">
    <div class="flex items-center gap-3">
      <img src="https://rshp.unair.ac.id/wp-content/uploads/2024/06/UNIVERSITAS-AIRLANGGA-scaled.webp"
           alt="Logo Unair"
           class="h-10 w-auto">
      <span class="text-[#002080] font-semibold text-lg">RSHP Universitas Airlangga</span>
    </div>

    <ul class="hidden md:flex space-x-6 font-medium text-gray-700">
      <li><a href="{{ url('/') }}" class="hover:text-[#002080] transition">Home</a></li>
      <li><a href="{{ url('/layanan') }}" class="hover:text-[#002080] transition">Layanan</a></li>
      <li><a href="{{ url('/struktur') }}" class="hover:text-[#002080] transition">Struktur</a></li>
      <li><a href="{{ url('/lokasi') }}" class="hover:text-[#002080] transition">Lokasi</a></li>
      <li><a href="{{ url('/visi') }}" class="hover:text-[#002080] transition">Visi & Misi</a></li>
      <li><a href="{{ route('login') }}" class="text-[#00BFA6] hover:underline">Login</a></li>
    </ul>

    <!-- tombol menu mobile -->
    <div class="md:hidden">
      <button id="menu-btn" class="text-[#002080] focus:outline-none">
        ☰
      </button>
    </div>
  </div>

  <!-- menu mobile -->
  <div id="mobile-menu" class="md:hidden hidden bg-white border-t border-gray-100 shadow-md">
    <ul class="flex flex-col space-y-3 p-4 text-gray-700 font-medium">
      <li><a href="{{ url('/') }}" class="hover:text-[#002080]">Home</a></li>
      <li><a href="{{ url('/layanan') }}" class="hover:text-[#002080]">Layanan</a></li>
      <li><a href="{{ url('/struktur') }}" class="hover:text-[#002080]">Struktur</a></li>
      <li><a href="{{ url('/lokasi') }}" class="hover:text-[#002080]">Lokasi</a></li>
      <li><a href="{{ url('/visi') }}" class="hover:text-[#002080]">Visi & Misi</a></li>
      <li><a href="{{ route('login') }}" class="text-[#00BFA6] hover:underline">Login</a></li>
    </ul>
  </div>

  <script>
    document.getElementById('menu-btn').addEventListener('click', () => {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });
  </script>
</nav>
