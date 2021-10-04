import AuthService from '@/services/AuthService.js'

const token = AuthService.getToken()
const initialState = token ? { loggedIn: true , token : token } : { loggedIn: false , token : null }

export const user = {
  namespaced: true,
  state: initialState,
  actions: {
    login({ commit }, data) {
      return AuthService.login(data).then(
        data => {
          return Promise.resolve(data);
        },
        error => {
          commit('loginFailure');
          return Promise.reject(error);
        }
      );
    },

    logout({ commit }) {
        AuthService.logout()
    }

  },
  mutations: {
    loginSuccess(state, data) {
      state.loggedIn = true;
      state.token = data;
    },
    loginFailure(state) {
      state.loggedIn = false;
      state.token = null;
    },
    logout(state) {
      state.loggedIn = false;
      state.token = null;
    }
  }
};