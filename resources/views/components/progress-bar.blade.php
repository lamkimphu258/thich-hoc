  <div class="w-full bg-gray-200 rounded-full dark:bg-gray-700 {{ $percent > 0 ? '' : 'h-6' }}">
    @if ($percent > 0)
    <div class="bg-violet-700 text-xs font-medium text-blue-100 text-center p-1.5 leading-none rounded-full" style="width: {{ $percent }}%">

      {{ $percent }}%
    </div>
    @endif
  </div>
