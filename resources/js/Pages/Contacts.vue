<template>
    <layout>
        <div class="container mt-5 bg-white shadow p-4 pl-1 pr-1 mt-4">
            <div class="row"> 
                
                <div class="col-md-6 align-self-center">
                    <h2>Disse Ivan Teorilang</h2>
                    <p class="text-justify text-blue font-18">"Somente a sabedoria aliada ao conhecimento, 
                    pode significar felicidade, pois aprendemos como ocupar nossas mentes, 
                    eliminando o supérfluo."
                    </p>
                </div>
                <div class="col-md-6">
                    <h3>Contato</h3>
                    <h6>preencha todos os campos</h6>
                    <form class="mt-5" @submit.prevent="handleForm" method="POST" action="" enctype="multipart/form-data">
                        <div>
                            <div class="form-group">
                                <label>{{ errors.name }}</label>
                                <label for="name">Nome</label>
                                <input type="text" class="form-control" v-model="form.name" required name="name" id="name">
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>{{ errors.email }}</label>
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" v-model="form.email" required name="email" id="email">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>{{ errors.phone }}</label>
                                    <label for="phone">
                                        Telefone
                                        <small class="text-muted"> Opcional</small>
                                    </label>
                                    <input type="text" v-mask="'(##) #####-####'" class="form-control" v-model="form.phone" name="phone" id="phone">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>{{ errors.message }}</label>
                                <label for="message">Mensagem</label>
                                <textarea class="form-control" required rows="5" v-model="form.message" name="message" id="message"></textarea>
                            </div>
                            <div class="form-group">
                                <label>{{ errors.archive }}</label>
                                <label for="archive">Anexo</label>
                                <input type="file" accept=".doc, .docx, application/pdf, application/vnd.oasis.opendocument.text, .txt" ref="archive" @change="updatePhotoPreview" class="form-control" name="archive" id="archive">
                            </div>
                            <div class="form-group align-self-end">
                                <button type="submit" class="pl-5 pr-5 float-right btn btn-primary">Enviar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </layout>
</template>

<script> 
import Layout from '../Layout.vue';
import {mask} from 'vue-the-mask'
export default {

    props: {
        errors: Object,
    },

    components:{
        Layout,
    },

    directives: {
        mask
    },

    data: () => {
        return {
            form: {
                name: null,
                email: null,
                phone: null,
                message: null,
                archive: null
            }
        }
    },
     methods:{
        handleForm(){ 

            if (this.$refs.archive) {
                this.form.archive = this.$refs.archive.files[0]
            }

            this.$inertia.post('/contatos', this.form)
        },
    }

}
</script>