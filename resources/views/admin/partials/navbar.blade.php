<header class="bg-gray-700 text-white flex flex-col gap-5 py-4 px-10">
  <div class="flex justify-between items-center">
    <a href="/">
      <img src="{{ asset('img/logo-navbar.svg') }}" alt="">
    </a>
    <div class="flex items-center gap-6">
      <button id="userDropdown" data-dropdown-toggle="dropdown" type="button">
        <img src="{{ asset('img/profile-picture.png') }}" alt="">
      </button>
      <div id="dropdown"
        class="z-10 hidden bg-black divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <form method="GET">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="userDropdown">
            <li class="hover:bg-gray-800">
              <a type="submit" href="/logout" class="block px-4 py-2 text-white">
                Logout
              </a>
            </li>
          </ul>
        </form>
      </div>
    </div>
  </div>
  <hr>
  <nav class="mb-5">
    <div
      class="flex lg:flex-row flex-col gap-4 justify-between {{ request()->is('/') ? 'mb-24' : 'mb-[2.6rem]' }}">
      <ul class="flex my-auto justify-between md:justify-start md:gap-10">
        <li>
          <a href="/"
            class="no-underline {{ request()->is('/') ? 'text-white' : 'text-white/40 hover:text-white' }}">
            <span>Home</span>
          </a>
        </li>
        <li>
          <a href="/reservation"
            class="no-underline {{ request()->is('reservation*') ? 'text-white' : 'text-white/40 hover:text-white' }}">
            <span>Peminjaman</span>
          </a>
        </li>
        @if (Auth::user()->isAdmin())
          <li>
            <a href="/approval"
              class="no-underline {{ request()->is('admin*') ? 'text-white' : 'text-white/40 hover:text-white' }}">
              <span>Ruangan</span>
            </a>
          </li>
        @endif
      </ul>
    </div>
  </nav>
  @if (request()->is('/'))
    <div class="grid md:grid-cols-2 xl:grid-cols-4 gap-4 -my-20">
      <div class="flex gap-4 p-6 bg-white border rounded-lg shadow-md">
        <img src="{{ asset('img/logo-total.svg') }}" alt="logo-total">
        <div class="flex flex-col gap-3 my-auto">
          <p class="font-bold text-black">
            {{ $roomcount }} Peminjaman
          </p>
          <p class="font-normal text-black">
            Jumlah Jumlah Peminjaman
          </p>
        </div>
      </div>
      <div class="flex gap-4 p-6 bg-white border rounded-lg shadow-md">
        <img src="{{ asset('img/logo-terpakai.svg') }}" alt="logo-total">
        <div class="flex flex-col gap-3 my-auto">
          <p class="font-bold text-black">
            {{ $roomsData['unavailable'] }} Peminjaman
          </p>
          <p class="font-normal text-black">
            Jumlah Peminjaman Selesai
          </p>
        </div>
      </div>
      <div class="flex gap-4 p-6 bg-white border rounded-lg shadow-md">
        <img src="{{ asset('img/logo-kosong.svg') }}" alt="logo-total">
        <div class="flex flex-col gap-3 my-auto">
          <p class="font-bold text-black">
            {{ $roomsData['available'] }} Menunggu
          </p>
          <p class="font-normal text-black">
            Jumlah Peminjaman Menunggu
          </p>
        </div>
      </div>
      <a href="/peminjaman"
        class="p-6 bg-gray-800 rounded-lg hover:bg-gray-900 flex items-center justify-center">
        <span class="text-2xl font-semibold">List Peminjaman <i class="bx bx-right-arrow-alt"></i></span>
      </a>
    </div>
  @endif
</header>
