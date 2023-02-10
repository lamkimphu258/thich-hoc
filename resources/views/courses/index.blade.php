<x-app-layout>
  <x-slot:title>
    Courses
    </x-slot>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Courses') }}
      </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="card-container overflow-hidden">
          @foreach ($courses as $index=>$course)
          <div class="card">
            <img src="{{ url('storage/'.$course->thumbnail) }}" class="card-img" alt="Course thumbnail" loading="lazy" />
            <a href="{{ route('courses.show', ['course' => $course->slug]) }}">
              <div class="mb-4">{{ __($course->title) }}</div>
              <x-progress-bar :percent="$percents[$index]" />
            </a>
          </div>
          @endforeach
        </div>
        {{ $courses->links() }}
      </div>
    </div>
</x-app-layout>
