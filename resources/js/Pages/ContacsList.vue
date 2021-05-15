<template>
    <layout>
        <div class="container mt-5 p-4 bg-white shadow pl-1 pr-1 mt-4">
            <form @submit.prevent="onSubmit()">
                <div class="row"> 
                    <div class="col-md-8"> 
                        <h3> 
                            Contatos
                        </h3>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="input-group mb-3">
                            <input v-model="searchterm" id="search" name="search" type="search" class="form-control" placeholder="Pesquisar">
                            <button class="btn btn-outline-secondary" type="submit" id="search-btn">ok</button>
                        </div>
                    </div> 
                </div> 
            </form>
                <div class="table-responsive">
                    <table class="table align-middle table-striped table-hover">
                        <thead>
                            <tr class="text-blue">
                                <th>Nome</th>
                                <th>Contato</th>
                                <th>Mensagem</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="c in contacts.data" :key="c.id">
                                <td>
                                    <div class="font-12">
                                         <b>{{ c.name }}</b>
                                    </div>
                                    <div class="font-10">
                                         IP: {{ c.ip }}
                                    </div>
                                </td>
                                <td>
                                    <div class="font-11">
                                         <b>{{ c.email }}</b>
                                    </div>
                                    <div class="font-11">
                                         {{ c.phone }}
                                    </div>
                                </td>
                                <td class="font-11">{{ c.message }}</td>
                                <td>
                                    <div class="font-13">
                                        <a v-if="c.archive" :href="'/storage/archives/'+c.archive">Baixar anexo</a>
                                    </div>
                                    <div class="font-10">
                                       Enviado: 
                                       {{ 
                                           moment(c.created_at)
                                          
                                            }}
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div v-if="!shouldHidePagination" >
                        <pagination :data="contacts"/>
                    </div>
                </div>
            
        </div>
    </layout>
</template>

<script>
import Layout from '../Layout.vue';
import Pagination from '../components/Pagination.vue';
import moment from 'moment'

export default {
    
    name: 'contactsList',
    props: {
        contacts: Object,
    },

    components:{
        Layout,
        Pagination,
        moment
    },

    data(){
        return{
            searchterm: ''
        }
    },

    computed:{
        shouldHidePagination(){
            return !this.contacts.prev_page_url && !this.contacts.next_page_url;
        },
    },

    methods:{
        onSubmit(){
            this.$inertia.get(
                this.route("list.contacts", {search: this.searchterm} )
            )
        },
        moment(date) {
            return moment(date).format('DD/MM/YYYY')+ ' às ' +moment(date).format('H:mm:ss');;
        }
    }
}
</script>