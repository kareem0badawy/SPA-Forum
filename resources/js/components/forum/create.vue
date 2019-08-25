<template>
    <v-app id="inspire">
        <v-content>
            <v-container class="fill-height" fluid>
                <v-row align="center" justify="center">
                    <v-col cols="12" sm="8" md="6" >
                        <v-card class="elevation-12">
                            <v-toolbar dark flat>
                                <v-toolbar-title>Ask Question</v-toolbar-title>
                                <v-spacer></v-spacer>
                            </v-toolbar>
                            <v-card-text>
                                <v-form @submit.prevent="create">
                                    <span class="red--text" v-if="errors.title">{{ errors.title[0] }}</span>
                                    <v-text-field
                                    label="Title"
                                    v-model="form.title"
                                    type="text"
                                    required
                                    ></v-text-field>

                                    <span class="red--text" v-if="errors.category_id">{{ errors.category_id[0] }}</span>
                                    <v-select
                                    :items="categories"
                                    item-text="name"
                                    item-value="id"
                                    v-model="form.category_id"
                                    label="Category"
                                    autocomplete
                                    ></v-select>

                                    <span class="red--text" v-if="errors.body">{{ errors.body[0] }}</span>
                                    <vue-simplemde v-model="form.body" ref="markdownEditor" />

                                    <v-btn
                                    color="green"
                                    type="submit"
                                    :disabled="disabled"
                                    >Create</v-btn>
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
  data() {
    return {
      form: {
        title: null,
        category_id: null,
        body: null
      },
      categories: {},
      errors: {}
    };
  },
  created() {
    axios.get("/api/category").then(res => (this.categories = res.data.data));
  },
  methods: {
    create() {
      axios
        .post("/api/question", this.form)
            .then(res => this.$router.push(res.data.path))
            .catch(error => (this.errors = error.response.data.errors));
    }
  },
  computed: {
    disabled() {
      return !(this.form.title && this.form.category_id && this.form.body);
    }
  }
};
</script>

<style>
</style>