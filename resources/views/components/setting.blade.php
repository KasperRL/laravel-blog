@props(['heading'])
<section class="py-8 max-w-4xl m-auto">
    <h1 class="text-xl font-bold uppercase mb-6 pb-4 text-center border-b text-white">
        {{ $heading }}
    </h1>
    <div class="flex text-white">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-red-500' : '' }}">All posts</a>
                </li>
            </ul>
            <ul>
                <li>
                    <a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-red-500' : '' }}">New post</a>
                </li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>