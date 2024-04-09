<x-layout>
    <h1>Posts index page</h1>
    <div>My name is {{ $username }}</div>
    <ul>
        @foreach ($posts as $post)
        <li>{{ $post }}</li>
    @endforeach
</ul>
</x-layout>