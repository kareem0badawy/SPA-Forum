  <template>
    <v-toolbar dark>
      <v-toolbar-title>SPA - Forum</v-toolbar-title>

      <v-spacer></v-spacer>
      <div class="hidden-sm-and-down">
        <router-link  v-for="item in items" :key="item.title" :to="item.to" v-show="item.show">
          <v-btn text>{{ item.title }}</v-btn>
        </router-link>      
      </div>
      <v-btn icon>
          <v-icon>mdi-export</v-icon>
      </v-btn>
  </v-toolbar>
</template>

<script>
// import AppNotification from "./AppNotification";
export default {
  // components: { AppNotification },
  data() {
    return {
      // loggedIn: User.loggedIn(),
      items: [
        { title: "Forum", to: "/forum", show: true },
        { title: "Ask Question", to: "/ask", show: User.loggedIn() },
        { title: "Category", to: "/category", show: User.loggedIn() },
        { title: "Login", to: "/login", show: !User.loggedIn() },
        { title: "Logout", to: "/logout", show: User.loggedIn() }
      ]
    };
  },
  created() {
    EventBus.$on("logout", () => {
      User.logout();
    });
  }
};
</script>

<style>
</style>