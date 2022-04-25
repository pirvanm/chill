<template>
  <div class="container">
    <form @submit.prevent="submit">
      <div class="form-group">
        <label>Name</label>
        <input
          type="text"
          class="form-control"
          required
          autocomplete="name"
          autofocus
          v-model="form.name"
        />
      </div>
      <div class="form-group">
        <label>Email</label>
        <input
          type="text"
          class="form-control"
          required
          autocomplete="email"
          autofocus
          v-model="form.email"
        />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input
          type="password"
          class="form-control"
          required
          autofocus
          v-model="form.password"
        />
      </div>
      <div class="form-group">
        <label>Confirm Password</label>
        <input
          type="password"
          class="form-control"
          required
          autocomplete="password_confirmation"
          v-model="form.password_confirmation"
        />
      </div>
      <div class="checkbox">
        <input
          class="form-check-input"
          type="checkbox"
          id="remember"
          v-model="form.remember"
        />

        <label class="form-check-label" for="remember">Remember Me</label>
      </div>
      <button type="submit" class="btn btn-primary">Sign In</button>
    </form>
  </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
  layout: "login",
  middleware: "guest",
  data() {
    return {
      form: {
        email: "",
        name: "",
        password_confirmation: "",
        password: "",
      },
      errors: [],
    };
  },
  methods: {
    submit() {
      this.$axios
        .post("/register", this.form)
        .then((response) => {
          Swal.fire({
            title: "Registration Success",
            text: "You Can Login Now",
            icon: "success",
          }).then(() => {
            this.$router.push("/login");
          });
        })
        .catch((error) => {
          this.errors = error.response;
        });
    },
  },
};
</script>
