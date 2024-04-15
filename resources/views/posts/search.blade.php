@section('extra-css')
    <link rel="stylesheet" href="{{ asset('css/algolia.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0/dist/instantsearch-theme-algolia.min.css">
@endsection


<x-layout>
    <h1>Search Page</h1>
    
    <div class="container">
        <div class="search-results-container-algolia">
            <div>
                <h2>Searchbox</h2>
                <div id="search-box">
                    <!-- SearchBox widget will appear here -->
                </div>

                <div id="stats-container"></div>

                <div class="spacer"></div>
                <h2>Categories</h2>
                <div id="refinement-list">
                    <!-- RefinementList widget will appear here -->
                </div>
            </div>

            <div>
                <div id="hits">
                    <!-- Hits widget will appear here -->
                </div>

                <div id="pagination">
                    <!-- Pagination widget will appear here -->
                </div>
            </div>
        </div> <!-- end search-results-container-algolia -->
    </div> <!-- end container -->

    <div>
        <input type="text" id="search">
        <div id="results" style="margin-top:50px"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/meilisearch@latest/dist/bundles/meilisearch.umd.js"></script>
    <script>
        const client = new MeiliSearch({
            host: 'http://127.0.0.1:7700',
        })

        const index = client.getIndex('users')

        const input = document.querySelector('#search')

        input.addEventListener('keyup', event => {
            index.search(event.target.value)
                .then(response => {
                    // console.log(response.hits);
                    let nodes = response.hits.map(user => {
                        let div = document.createElement('div');
                        div.textContent = user.name;
                        return div;
                    });

                    let results = document.querySelector('#results');
                    results.innerHTML = '';
                    results.append(...nodes);
                })
        })


    </script>
    
</x-layout>

@section('extra-js')
    <script src="https://cdn.jsdelivr.net/algoliasearch/3/algoliasearch.min.js"></script>
    <script src="https://cdn.jsdelivr.net/autocomplete.js/0/autocomplete.min.js"></script>
    <script src="{{ asset('js/algolia.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/instantsearch.js@2.6.0"></script>
    <script src="{{ asset('js/algolia-instantsearch.js') }}"></script>
@endsection