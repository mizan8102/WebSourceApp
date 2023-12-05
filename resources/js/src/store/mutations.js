export function toggleSidebar(state) {
    state.sidebarVisible = !state.sidebarVisible
}

export function toggleUnfoldable(state) {
    state.sidebarUnfoldable = !state.sidebarUnfoldable
}

export function updateSidebarVisible(state, payload) {
    state.sidebarVisible = payload.value
}

export function setUser(state, user) {
    state.user.data = user;
}


export function setToken(state, token) {
    state.user.token = token;
    if (token) {
        localStorage.setItem('TOKEN', token);
    } else {
        localStorage.removeItem('TOKEN')
    }
}
