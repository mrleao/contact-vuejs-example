<template>
  <div class="bg-blue">
    <nav class="container fixed navbar navbar-expand-lg">
        <inertia-link class="col-3 navbar-brand text-white" :href="route('home')">
          eSocial Brasil
        </inertia-link> 

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse col-9 navbar-collapse justify-content-end" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                  <nav-link :href="route('home')" :active="route().current('home')">
                    Home
                  </nav-link>
                </li>
                <li class="nav-item">
                  <nav-link :href="route('contacts')" :active="route().current('contacts')">
                    Contato
                  </nav-link>
                </li>
                <li class="nav-item">
                  <nav-link :href="route('list.contacts')" :active="route().current('list.contacts')">
                    Lista de Contatos
                  </nav-link>
                </li>
            </ul>
        </div>
    </nav>
  </div> 
  <div>
    <main class="">
      <slot />
      <p class="text-center mt-5 text-gray">eSocial &copy 2021.</p>
    </main>
  </div>
    
</template>

<script>
import NavLink from './components/NavLink.vue'
  export default {
    components: { 
      NavLink 
    },
  }
</script>