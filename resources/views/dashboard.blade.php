<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
{{--                <div class="p-6 text-gray-900 dark:text-gray-100">--}}
{{--                    {{ __("You're logged in!") }}--}}
{{--                </div>--}}
                <a href="{{ route('services') }}" class="inline-block px-6 py-3 bg-blue-500 hover:bg-blue-600 text-white font-semibold rounded-lg shadow-md transition duration-300 ease-in-out">
                    Make order!
                </a>

                <div class="bg-white">
                    You are:
                    @if(Auth::user()->isManager())
                        Manager
                    @endif
                    @if(Auth::user()->isAdmin())
                        Admin
                    @endif
                    @if(Auth::user()->isAssistant())
                        Assistant
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
