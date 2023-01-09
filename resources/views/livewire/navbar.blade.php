<nav class="py-2.5 px-4 flex items-center justify-between mx-auto fixed w-full text-white">
  <div class="nav-brand">
    <a href="{{ route($routeName) }}" class="flex items-center">
      <img src="images/brand.png" class="h-16 w-full" alt="Flowbite Logo" />
      <span class="self-center text-2xl font-semibold whitespace-nowrap ml-3">Thich Hoc</span>
    </a>
  </div>
  <div class="nav-item-container">
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
      <ul class="flex p-4 rounded-lg space-x-8">
        @foreach ($items as $k => $v)
        <li>
          <a href="{{ route($k) }}" class="block py-2 pl-3 pr-4 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-gray-400 md:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">{{ $v }}</a>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
</nav>
