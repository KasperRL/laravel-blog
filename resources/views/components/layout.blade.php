<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.5.0/dist/cdn.min.js"></script>

<body style="font-family: Open Sans, sans-serif">
    <section class="bg-gray-700 h-screen">
        <nav class="p-5 bg-gray-800 md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <h1 class="text-3xl font-bold text-white">Kasper.</h1>
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs text-white font-bold uppercase">Welcome, {{ auth()->user()->name }}!</button>
                        </x-slot>

                        @can('admin')
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">All posts</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">New post</x-dropdown-item>
                        @endcan

                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#logout-form').submit()">Log Out</x-dropdown-item>

                        <form id="logout-form" method="POST" action="/logout" class="hidden">
                            @csrf
                        </form>
                    </x-dropdown>

                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Log In</a>
                @endauth
            </div>
        </nav>

        {{ $slot }}
    </section>

    <x-flash />
</body>
