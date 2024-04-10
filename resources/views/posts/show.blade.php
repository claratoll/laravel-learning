<x-layout>
    <h1>{{ $post->title }}</h1>
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <p class="text-gray-700">{{ $post->content }} </p>
    </main>
</x-layout>