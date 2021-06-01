export const state = () => ({
    videos: []
});

export const getters = {
    getVideos(state) {
        return state.videos;
    }
};

export const mutations = {
    addVideo(state, data) {
        if (state.videos.length > 100) {
            return;
        } else {
            state.videos.push(data);
            var jStringify = JSON.stringify(state.videos);
            this.$auth.$storage.setUniversal("videos", jStringify);
        }
    },

    incrementVideo(state, data) {
        var index = state.videos.findIndex(pr => pr.slug === data.slug);
        state.videos[index].qty++;
        var jStringify = JSON.stringify(state.videos);
        this.$auth.$storage.setUniversal("videos", jStringify);
    },

    decrementVideo(state, data) {
        var index = state.videos.findIndex(pr => pr.slug === data.slug);
        state.videos[index].qty--;
        var jStringify = JSON.stringify(state.videos);
        this.$auth.$storage.setUniversal("videos", jStringify);
    },

    deleteVideo(state, data) {
        var index = state.videos.findIndex(pr => pr.slug === data.slug);
        state.videos.splice(index, 1);
        var jStringify = JSON.stringify(state.videos);
        this.$auth.$storage.setUniversal("videos", jStringify);
    }
};

export const actions = {
    addVideoToHistory({ commit, state }, video) {
        return new Promise((resolve, reject) => {
            commit("addVideo", video);
            resolve(state.videos);
        });
    },

    incrementVideoFromHistory({ commit }, data) {
        commit("incrementVideo", data);
    },

    decrementVideoFromHistory({ commit }, data) {
        commit("decrementVideo", data);
    },

    deleteVideoFromHistory({ commit }, data) {
        commit("deleteVideo", data);
    }
};
