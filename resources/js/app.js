import './bootstrap';

import algoliasearch from 'algoliasearch/lite';
import InstantSearch from 'vue-instantsearch';

Vue.use(InstantSearch);

import { searchBox, hits } from 'instantsearch.js/es/widgets';

const searchClient = algoliasearch('OT9ZYS1BVJ', 'c04ca3408059af0dc4d734795a6918a1');

const search = instantsearch({
  indexName: 'posts_index',
  searchClient,
});

search.addWidgets([
    virtualSearchBox({}),
    instantsearch.widgets.hits({
      container: '#hits',
      templates: {
        item: (hit, { html, components }) => html`
          <article>
            <div>
              <h1>${components.Highlight({ hit, attribute: 'title' })}</h1>
            
              <p>${components.Highlight({ hit, attribute: 'content' })}</p>
            </div>
          </article>
        `,
      },
    }),

  hits({
    container: "#hits"
  })
]);

search.start();
