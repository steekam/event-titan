<x-guest-layout>
    <div class="min-h-screen bg-white">
        <header class="relative pb-24 bg-light-blue-800 sm:pb-32">
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-l from-light-blue-800 to-cyan-700"
                    style="mix-blend-mode: multiply;" aria-hidden="true"></div>
            </div>
            <div class="relative z-10">
                <nav class="relative flex items-center justify-between px-4 pt-6 pb-2 mx-auto max-w-7xl sm:px-6 lg:px-8"
                    aria-label="Global">
                    <div class="flex items-center justify-between w-full lg:w-auto">
                        <a href="/">
                            <span class="sr-only">Event Titan</span>
                            <x-jet-application-mark class="w-auto h-8 sm:h-10" />
                        </a>
                    </div>

                    <div class="flex items-center space-x-6">
                        @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-6 py-2 text-base font-medium text-white bg-white border border-transparent rounded-md bg-opacity-10 hover:bg-opacity-20">Dashboard</a>
                        @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-2 text-base font-medium text-white bg-white border border-transparent rounded-md bg-opacity-10 hover:bg-opacity-20">
                            Login
                        </a>

                        @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="px-6 py-2 text-base font-medium text-white bg-white bg-opacity-50 border border-transparent rounded-md hover:bg-opacity-10">Register</a>
                        @endif
                        @endauth
                    </div>
                </nav>
            </div>

            <div class="relative max-w-md px-4 mx-auto mt-24 sm:max-w-3xl sm:mt-32 sm:px-6 lg:max-w-7xl lg:px-8">
                <h1 class="text-4xl font-extrabold tracking-tight text-white sm:text-5xl lg:text-6xl">Event Titan</h1>
                <p class="max-w-3xl mt-6 text-xl text-cyan-100">Simple Event Booking Platform.</p>
            </div>
        </header>

        <main>
            <div class="pb-10 bg-gray-50">
                <div class="px-4 pt-16 pb-8 mx-auto max-w-7xl sm:py-24 sm:px-6 lg:px-8">
                    <div class="text-center">
                        <h2
                            class="text-3xl font-extrabold text-indigo-500 uppercase sm:text-5xl sm:tracking-tight lg:text-6xl">
                            Upcoming Events</h2>
                        <p class="max-w-lg mx-auto mt-5 text-xl text-gray-500">Check out what is happening soon and book
                            your ticket to attend.</p>
                    </div>
                </div>

                <x-container class="max-w-4xl py-6 mx-auto bg-white rounded-md shadow-md">
                    @if($upcoming_events->isEmpty())
                    <x-container class="max-w-lg mx-auto text-center">
                        <p class="text-lg font-medium">
                            There aren't any upcoming events yet.
                        </p>
                    </x-container>
                    @else
                    <div class="overflow-hidden bg-white shadow sm:rounded-md">
                        <ul class="divide-y divide-gray-200">
                            @foreach ($upcoming_events as $event)
                            <x-event-card :event="$event" :showEventActions="false" />
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </x-container>
            </div>
        </main>
    </div>
</x-guest-layout>
