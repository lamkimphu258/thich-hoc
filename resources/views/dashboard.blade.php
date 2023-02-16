<x-app-layout>
    <x-slot:title>
        Dashboard
        </x-slot>

        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white shadow-sm sm:rounded-lg p-4">
                    <div class="flex justify-between">
                        <div class="w-5/12">
                            {!! $courseChart->container() !!}

                            <script src="{{ $courseChart->cdn() }}"></script>

                            {{ $courseChart->script() }}
                        </div>

                        <div class="w-5/12">
                            {!! $quizChart->container() !!}

                            <script src="{{ $quizChart->cdn() }}"></script>

                            {{ $quizChart->script() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>
