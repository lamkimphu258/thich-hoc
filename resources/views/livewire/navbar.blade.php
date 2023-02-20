<nav class="py-2.5 px-4 flex items-center justify-between w-full text-black">
  <div class="nav-brand">
    <a href="{{ route($routeName) }}" class="flex items-center">
      <x-nav-brand />
      <span class="self-center text-2xl whitespace-nowrap ml-3 font-extrabold">Thich Hoc</span>
    </a>
  </div>
  <ul class="flex flex-row rounded-lg space-x-4">
    @foreach ($items as $k => $v)
    <li>
      @livewire('button', ['href' => route($k), 'content' => $v])
      @endforeach
  </ul>
</nav>
