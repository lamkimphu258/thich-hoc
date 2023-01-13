<nav class="py-2.5 px-4 flex items-center justify-between mx-auto fixed w-full text-white">
  <div class="nav-brand">
    <a href="{{ route($routeName) }}" class="flex items-center">
      <!-- <img src="{{ Vite::asset('/resources/images/brand.png') }}" class="h-16 w-full" alt="Thich Hoc Logo" /> -->
      <x-nav-brand/>
      <span class="self-center text-2xl font-semibold whitespace-nowrap ml-3 font-pacifico">Thich Hoc</span>
    </a>
  </div>
  <div class="nav-item-container">
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex p-4 rounded-lg space-x-8">
        @foreach ($items as $k => $v)
        @livewire('button', ['href' => route($k), 'content' => $v])
        @endforeach
      </ul>
    </div>
  </div>
</nav>
