<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="relative min-h-screen md:flex" x-data="{ open: false }">
            <!-- Sidebar -->
            <aside :class="{ '-translate-x-full': !open }" class="z-10 bg-blue-800 text-blue-100 w-64 px-2 py-4 absolute inset-y-0 left-0 md:relative transform md:translate-x-0 overflow-y-auto transition ease-in-out duration-200">
                <!-- Logo -->
                <div class="flex items-center justify-between px-2">
                    <div class="flex items-center space-x-2">
                        <a href="#">
                            <x-application-logo class="block h-10 w-auto fill-current text-blue-100"></x-application-logo>
                        </a>
                        <span class="text-2xl font-extrabold">Admin</span>
                    </div>
                    <button type="button" class="md:hidden inline-flex p-2 items-center justify-center rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none" @click="open = !open">
                        <svg xmlns="http://www.w3.org/2000/svg" 
                             fill="none" 
                             viewBox="0 0 24 24" 
                             stroke-width="1.5" 
                             stroke="currentColor" class="block w-6 h-6">
                            <path 
                                stroke-linecap="round" 
                                stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                          </svg>
                    </button>
                </div>
                <!-- Nav links -->
                <nav class="mt-5">
                    <x-side-nav-link 
                        href="{{ route('classroom.list') }}" 
                        :active="request()->routeIs('users.list')"
                        wire:navigate
                    >
                        Lista de Classes
                    </x-side-nav-link>
                    <x-side-nav-link 
                        href="{{ route('classroom.create') }}" 
                        :active="request()->routeIs('classroom.create')"
                        wire:navigate
                    >
                        Criar nova classe
                    </x-side-nav-link>
                    <x-side-nav-link 
                        href="{{ route('student.list') }}" 
                        :active="request()->routeIs('student.list')"
                        wire:navigate
                    >
                        Lista de alunos
                    </x-side-nav-link>
                </nav>
            </aside>
            <!-- Main content -->
            <main class="flex-1 bg-gray-100 h-screen">
                <nav class="bg-blue-900 shadow-lg">
                    <div class="mx-auto px-2 sm:px-6 lg:px-8">
                        <div class="relative flex items-center justify-between md:justify-end h-16">
                            <div class="absolute inset-y-0 left-0 flex items-center md:hidden">
                                <button 
                                    type="button" 
                                    @click="open = !open"
                                    @click.away="open = false"
                                    class="inline-flex items-center justify-center p-2 rounded-md text-blue-100 hover:bg-blue-700 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="block w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                      </svg>
                                      
                                </button>
                            </div>
                            <div class="flex flex-1 items-center justify-center md:hidden">
                                <div class="flex flex-shrink-0 items-center">
                                    <a href="{{ route('dashboard') }}">
                                        <x-application-logo class="block h-10 w-auto fill-current text-blue-100" />
                                    </a>
                                </div>
                            </div>
                            <div class="absolute inset-y-0 right-0 flex items-center">
                                <x-dropdown align="right" width="48">
                                    <x-slot name="trigger">
                                        <button class="flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium text-blue-100 hover:bg-blue-700 transition ease-in-out duration-200 p-2 rounded-md">
                                            <div>{{ Auth::user()->name }}</div>
                
                                            <div class="ms-1">
                                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                                </svg>
                                            </div>
                                        </button>
                                    </x-slot>
                
                                    <x-slot name="content">
                                        <x-dropdown-link :href="route('profile.edit')">
                                            {{ __('Profile') }}
                                        </x-dropdown-link>
                
                                        <!-- Authentication -->
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                
                                            <x-dropdown-link :href="route('logout')"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                                {{ __('Log Out') }}
                                            </x-dropdown-link>
                                        </form>
                                    </x-slot>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </nav>
                <div>
                    {{ $slot }}
                </div>
            </main>
        </div>
    </body>
</html>
