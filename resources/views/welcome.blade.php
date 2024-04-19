<x-layout>

    <h1>Hey Tony</h1>

    <div class="pt-15 w-4/5 m-auto">
        <p>sök</p>
        <form action="/search/query" method="GET">
            @csrf
            <input type="text" name="search" placeholder="Search..."
                class="pl-4 pr-10 py-3 loading-none rounded-lg shadow-sm focus:outline-none focus:shadow-outline font-medium text-gray-600">

            <button type="submit"
                class="bg-green-500 uppercase bg-transparent text-gray-100 text-xs font-extrabold py-3 px-5 rounded-3xl">
                Search</button>
        </form>

        <div>

            @foreach ($posts as $post)
                <div
                    class="max-w-sm m-4 p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <a href="#">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
                            {{ $post->title }}</h5>
                    </a>
                    <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                        {{ $post->content }}</p>
                    <a href="/posts/{{ $post->id }}"
                        class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Read more
                        <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 5h12m0 0L9 1m4 4L9 9" />
                        </svg>
                    </a>
                </div>
            @endforeach

        </div>
    </div>





</x-layout>
