<template>
        <div class=" container pl-1 pr-1 mt-4">
            <nav aria-label="Page navigation">
                <ul class="pagination justify-content-center">
                    <div v-if="data.prev_page_url" class="page-item" >
                        <inertia-link class="page-link text-blue" :href="data.prev_page_url" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </inertia-link>
                    </div>
            
                    <li class="page-item" v-for="link in cleanLinks" :key="link.label">
                        <inertia-link class="page-link text-blue" :href="link.url">
                            {{ link.label }}
                        </inertia-link>
                    </li>

                    <div  v-if="data.next_page_url" class="page-item">
                        <inertia-link class="page-link text-blue" :href="data.next_page_url" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </inertia-link>
                    </div>
                </ul>
            </nav>
        </div>
</template>

<script>
export default {
    props: {
        data: Object,
    },

    computed:{
        cleanLinks(){
            const cleanLinks = [...this.data.links];
            cleanLinks.shift();
            cleanLinks.pop();

            return cleanLinks;
        }
    },
}
</script>