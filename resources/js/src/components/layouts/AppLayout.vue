<template>
    <div>
      <AppSidebar />
      <div class="wrapper d-flex flex-column min-vh-100">
        <AppHeader />
        <div class="body flex-grow-1">
          <CContainer class="px-4" lg>
            <router-view />
          </CContainer>
        </div>
        <AppFooter />
      </div>
    </div>
  </template>
  <script>
  import { CContainer } from '@coreui/vue'
  import AppFooter from '../AppFooter.vue'
  import AppHeader from '../AppHeader.vue'
  import AppSidebar from '../AppSidebar.vue'
  
  export default {
    name: 'DefaultLayout',
    components: {
      AppFooter,
      AppHeader,
      AppSidebar,
      CContainer,
    },
  }
  </script>
  