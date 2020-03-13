manager.store = new Vuex.Store({
    state: {
        modelLayout: {},
    },
    getters: {
        modelLayout(state) {
            return state.modelLayout
        },
    },
    mutations: {
        modelLayout(state, value) {
            state.modelLayout = value;
        },
        node(state, value) {
            state.modelLayout.node = value;
        },
    },
    actions: {
    }
})

