import { createStore } from 'vuex';


import reviewStore from '@/store/modules/reviewStore.js'

const store = createStore({
  modules: {
    reviewStore,
  }
})

export default store;