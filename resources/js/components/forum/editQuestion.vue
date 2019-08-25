<template>
    <v-app>
        <v-content>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="6" >
                        <v-card class="elevation-12">
                            <v-toolbar dark flat>
                                <v-toolbar-title>Edit {{form.title}} Question</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-card-text>
                                <v-form @submit.prevent="update">
                                    <v-text-field
                                        label="Title"
                                        v-model="form.title"
                                        type="text"
                                        required
                                        >
                                    </v-text-field>

                                        <v-select
                                            :items="categories"
                                            item-text="name"
                                            item-value="id"
                                            v-model="form.category_id"
                                            label="Category"
                                            autocomplete
                                        >
                                        </v-select>

                                        <vue-simplemde v-model="form.body" ref="markdownEditor" />

                                        <v-card-actions>
                                            <v-btn icon small type="submit">
                                                <v-icon color="teal">save</v-icon>
                                            </v-btn>
                                            
                                            <v-btn icon small @click="cancel">
                                                <v-icon>cancel</v-icon>
                                            </v-btn>
                                        </v-card-actions>
                                </v-form>
                            </v-card-text>
                        </v-card>
                    </v-col>
                </v-row>
            </v-container>
        </v-content>
    </v-app>
</template>

<script>
export default {
    props:['data'],
    data(){
        return {
            form : {
                title : null,
                category_id: null,
                body : null
            },
            categories: {},
        }
    },
    methods:{
        cancel(){
            EventBus.$emit('cancelEditing')
        },
        update(){
            axios.patch(`/api/question/${this.form.slug}`,this.form)
            .then(res => this.cancel())
        }
    },
    created(){
        axios.get("/api/category").then(res => (this.categories = res.data.data));
        this.form = this.data
    }
}
</script>

<style>
</style>