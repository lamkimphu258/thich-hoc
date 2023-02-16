<nav class="py-2.5 px-4 flex items-center justify-between w-full text-black">
  <div class="nav-brand">
    <a href="{{ route($routeName) }}" class="flex items-center">
      <x-nav-brand />
      <span class="self-center text-2xl font-semibold whitespace-nowrap ml-3 font-extrabold">Thich Hoc</span>
    </a>
  </div>
  <div class="nav-item-container">
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex p-4 rounded-lg space-x-4">
        @foreach ($items as $k => $v)
        @livewire('button', ['href' => route($k), 'content' => $v])
        @endforeach
      </ul>
    </div>
  </div>
</nav>
