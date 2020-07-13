import algoliasearch from 'algoliasearch/lite'
import {createInstantSearch} from 'vue-instantsearch'

export default ({app },inject) => {
    const searchClient = algoliasearch(
        'latency',
        'secret-key'
    )

    const {instantseach } = createInstantSearch({
        searchClient,
        indexName: 'instant_search'
    })

    inject('instantseach' , instantsearch)
}