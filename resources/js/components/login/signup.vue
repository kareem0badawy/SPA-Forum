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
                <v-toolbar-title>Signup form</v-toolbar-title>
                <v-spacer></v-spacer>
                
              </v-toolbar>
              <v-card-text>
                <v-form @submit.prevent="signup">
                 <v-text-field
                    label="Name"
                    v-model="form.name"
                    type="text"
                    required
                    >
                 </v-text-field>
                    <span class="red--text" v-if="errors.name">{{errors.name[0]}}</span>
                    
                    
                <v-text-field
                    label="E-mail"
                    v-model="form.email"
                    type="email"
                    required
                    >
                </v-text-field>
                    <span class="red--text" v-if="errors.email">{{errors.email[0]}}</span>

                <v-text-field
                    label="Password"
                    v-model="form.password"
                    type="password"
                    required
                    >
                </v-text-field>
                    <span class="red--text" v-if="errors.password">{{errors.password[0]}}</span>
                    
                <v-text-field
                    label="Confirm Password"
                    v-model="form.password_confirmation"
                    type="password"
                    required
                    >
                </v-text-field>

                    <v-card-actions>
                        <v-spacer></v-spacer>
                            <v-btn type="submit" color="success ma-5">Signup</v-btn>
                        <router-link to="/login">
                            <v-btn color="primary">Login</v-btn>
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
                name:null,
                email:null,
                password:null,
                password_confirmation:null
            },
            errors:{}
        }
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({name:'forum'})
        }
    },
    methods:{
        signup(){
            axios.post('/api/auth/signup',this.form)
            .then(res => {
                User.responseAfterLogin(res)
                this.$router.push({name:'forum'})
            })
            .catch(error => this.errors = error.response.data.errors)
        }
    }
}
</script>

<style>
</style>
