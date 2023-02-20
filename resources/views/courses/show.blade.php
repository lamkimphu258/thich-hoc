<x-app-layout>
  <x-slot:title>
    Course
    </x-slot>

    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Quizzes') }}
      </h2>
    </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
          <div class="post">
            @if (session('quiz-notification'))
            <div class="alert alert-success" role="alert">
              <span class="">{{ session('quiz-notification') }}</span>
            </div>
            @endif
            <h1 class="post-title">{{ __($course->title) }}</h1>
            <div>
              @if (count($quizzes) === 0)
              <p>This course have not had any quizzes yet! Please comeback later.</p>
              @endif
              @foreach($quizzes as $quiz)
              <a href="{{ route('quizzes.show', ['course' => $course->slug, 'quiz' => $quiz->slug]) }}">
                <div class="quiz">
                  @if ($quizEnrollments->contains($quiz->id))
                  <x-heroicon-o-check class="w-8 h-6" />
                  @endif
                  {{ $quiz->title }}
                </div>
              </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
