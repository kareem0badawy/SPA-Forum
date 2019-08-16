  <template>
    <v-toolbar dark>
      <v-toolbar-title>SPA - Forum</v-toolbar-title>

      <v-spacer></v-spacer>
      <div class="hidden-sm-and-down">
        <router-link to="/forum">
          <v-btn text>Forum</v-btn>
        </router-link>
        <v-btn text>Ask Question</v-btn>
        <v-btn text>Categories</v-btn>
        <router-link to="/login">
          <v-btn text>Login</v-btn>
        </router-link>      
      </div>
      <v-btn icon>
          <v-icon>mdi-export</v-icon>
      </v-btn>
  </v-toolbar>
</template>

<script>
export default {
}
</script>

<style>
</style>