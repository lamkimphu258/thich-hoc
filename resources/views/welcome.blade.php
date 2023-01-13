<x-layout>
    <x-slot:title>
        Thich Hoc
        </x-slot>

        <img src="{{ Vite::asset('/resources/images/banner.png') }}" class="h-screen w-screen" alt="thich-hoc-banner" />
        <div class="absolute text-center w-screen top-28 text-white">
            <h1 class="text-9xl font-pacifico">Thich Hoc</h1>
        </div>
        <div class="absolute text-center w-screen bottom-40 text-white">
            <p class="mb-10 text-2xl">
                Provide you quizzes to test your knowledge after each video, each course from
                <a href="https://www.youtube.com/channel/UCu3Dx6gL3mJ8hf5NTPOXTpw" class="hover:bg-indigo-500">Thich Hoc Channel</a><br />
            </p>
            @livewire('button', ['href' => '/courses', 'content' => 'Get Started'])
        </div>
</x-layout>
