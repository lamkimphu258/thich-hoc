<nav class="py-2.5 px-4 flex items-center justify-between w-full text-black flex-wrap" x-data="navbar">
  <div class="nav-brand">
    <a href="{{ route($routeName) }}" class="flex items-center">
      <x-nav-brand />
      <span class="self-center text-2xl whitespace-nowrap ml-3 font-extrabold">Thich Hoc</span>
    </a>
  </div>
  <button @click="handleOnClickMenu" data-collapse-toggle="main-navbar" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="main-navbar" aria-expanded="false">
    <span class="sr-only">Open main menu</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
    </svg>
  </button>
  <div class="hidden w-full md:block md:w-auto" id="main-navbar">
    <ul class="flex flex-col border-gray-100 rounded-lg bg-gray-50 mt-2 p-4 content-center md:bg-transparent md:flex-row md:space-x-4">
      @foreach ($items as $k => $v)
      <li class="text-center mb-2">
        @livewire('button', ['href' => route($k), 'content' => $v])
        @endforeach
      </li>
    </ul>
  </div>
</nav>
