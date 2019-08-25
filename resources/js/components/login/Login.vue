<template>
  <v-app id="inspire">
    <v-content>
      <v-container
        class="fill-height"
        fluid
      >
        <v-row
          align="center"
          justify="center"
        >
          <v-col
            cols="12"
            sm="8"
            md="6"
          >
            <v-card class="elevation-12">
              <v-toolbar
                dark
                flat
              >
                <v-toolbar-title>Login form</v-toolbar-title>
                <v-spacer></v-spacer>
                
              </v-toolbar>
              <v-card-text>
                <v-form @submit.prevent="login">
                  <v-text-field
                   label="E-mail"
                    v-model="form.email"
                    type="email"
                    required
                  ></v-text-field>

                  <v-text-field
                    label="Password"
                    v-model="form.password"
                    type="password"
                    required
                  ></v-text-field>
              <v-card-actions>
                <v-spacer></v-spacer>
                    <v-btn type="submit" color="primary ma-5">Login</v-btn>
                <router-link to="/signup">
                    <v-btn color="primary">Sign Up</v-btn>
                </router-link>
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
    data(){
        return {
            form :{
                email:null,
                password:null
            }
        }
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({name:'forum'})
        }
    },
    methods:{
        login(){
            User.login(this.form)
        }
    }
}
</script>

<style>
</style>