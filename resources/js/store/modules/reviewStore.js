import axios from "axios"

export default {
  state: {
    names: null,
    review: null
  },
  actions: {

    async fetchReview(ctx, slug) {

      let res = await axios.get('/api/get-review', { params: { slug: slug } })
      if (res.status == 200) {
        ctx.commit('storeReview', res.data.data)
      } else {
        alert('Error, try again')
      }
    },

    async fetchNames(ctx) {
      let res = await axios.get('/api/get-names')
      if (res.data.status == 200) {
        ctx.commit('storeNames', res.data.data)
      } else {
        alert('Error, try again')
      }
    }
  },
  mutations: {
    storeReview(state, data) {
      state.review = data
    },
    storeNames(state, data) {
      state.names = data
    }
  },
  getters: {
    getReview(state) {
      return state.review
    },
    getNames(state) {
      return state.names
    }
  }
}

