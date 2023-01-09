<x-layout>
    <x-slot:title>
        Homepage
        </x-slot>

        <img src="images/banner.png" class="h-screen w-screen" />
        <div class="absolute text-center w-screen bottom-24 text-white">
            <h1 class="text-2xl">Thich Hoc</h1>
            <p class="mb-4">
                This is a website which help you to test your knowledge after you learn courses or lessons from
                <a href="https://www.youtube.com/channel/UCu3Dx6gL3mJ8hf5NTPOXTpw">Thich Hoc Channel</a>
            </p>
            @livewire('button', ['href' => '/courses', 'content' => 'Get Started'])
        </div>
</x-layout>
