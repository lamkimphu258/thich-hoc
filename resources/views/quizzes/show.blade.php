<x-app-layout>
  <x-slot:title>
    Quiz
    </x-slot>
    <x-slot:description>
      Thich Hoc Quiz
      </x-slot>
      <x-slot:keywords>
        Thich Hoc, Quiz, Quiz Detail
        </x-slot>

        <x-slot name="header">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($quiz->title) }}
          </h2>
        </x-slot>

        <div class="py-12">
          <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6" action="{{ route('quizzes.submitAnswers', ['course' => $course, 'quiz' => $quiz]) }}" method="POST">
              @csrf
              @error('msg')
              <div class="alert alert-danger" role="alert">
                <span class="">{{ $message }}</span>
              </div>
              @enderror
              @foreach ($quiz->questions()->with('answers')->get() as $index => $question)
              @if ($index !== 0)
              <x-horizontal-line />
              @endif
              <div>
                <p class="question @error($question->id) text-red-500 @enderror">
                  <b class="text-xl">{!! __($question->question) !!}</b>
                </p>
                @foreach ($question->answers->shuffle() as $answer)
                <input id="{{ $answer->id }}" type="radio" class="mr-2" value="{{ $answer->id }}" name="{{ $question->id }}" {{ old($question->id) === $answer->id ? "checked" : "" }} />
                <label for="{{ $answer->id }}">{{ __($answer->answer) }}</label><br>
                @endforeach
              </div>
              @endforeach
              <x-horizontal-line />
              <input type="submit" value="Finish" class="btn btn-primary text-center w-full">
            </form>
          </div>
        </div>
</x-app-layout>
