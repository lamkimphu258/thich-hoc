<x-layout>
    <x-slot:title>
        Thich Hoc
        </x-slot>

        <h1 class="text-9xl font-extrabold">Thich Hoc</h1>
        <p class="mb-4 text-2xl text-gray-500">
            Thich Hoc is a website where you can do unlimited quizzes after each lesson. </br>
            Help you to improve your skill and strengthen your knowlegde. </br>
        </p>
        @livewire('button', ['href' => 'https://www.youtube.com/@thichhoc123', 'content' => 'Go to channel', 'className' => 'mr-2'])
        @livewire('button', ['href' => '/courses', 'content' => 'Get Started'])
</x-layout>
