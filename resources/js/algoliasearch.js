const { default: instantsearch } = require("instantsearch.js");

const { default: algoliasearch } = require("algoliasearch")

(function() {
        const search = instantsearch({
        appId: 'OT9ZYS1BVJ',
        apiKey: 'c04ca3408059af0dc4d734795a6918a1',
        indexName: 'posts',
        urlSync: true
    });

    search.addWidget(
        instantsearch.widgets.hits({
            container: '#hits',
            templates: {
                empty: 'No results',
                item: '<em> Hit {{objectID}}</em>'
            }
        })
    );

    search.addWidget(
        instantsearch.widgets.searchBox({
            container: '#search-box',
            placeholder: 'Placeholder for search results'
        })
    );

    search.start();
})