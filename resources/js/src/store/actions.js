import axiosClient from '../axios/index'


export function login({ commit }, data) {
  return axiosClient.post('/login', data)
    .then(({ data }) => {
      commit('setUser', data?.data?.user);
      commit('setToken', data?.data?.token)
      return data;
    })
}

export function register({ commit }, data) {
  return axiosClient.post('/register', data)
    .then(({ data }) => {
      return data;
    })
}


export function getCurrentUser({ commit }, data) {
  return axiosClient.get('/user', data)
    .then(({ data }) => {
      commit('setUser', data);
      return data;
    })
}


export function logout({ commit }) {
  return axiosClient.post('/logout')
    .then((response) => {
      commit('setToken', null)

      return response;
    })
}