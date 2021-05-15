<template>
    <inertia-link :class="classes" class="nav-link text-white" :href="href">
        <slot></slot>
    </inertia-link>
    <div :class="selectedClass">
    </div>
</template>

<script>
    export default {
        props: ['href', 'active'],

        computed: {
            classes() {
               return this.active
                            ? 'active'
                            : ''
            },
            selectedClass() {
               return this.active
                            ? 'nav-active'
                            : ''
            }
        }
    }
</script>
