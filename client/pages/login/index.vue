<template>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form @submit.prevent="submit">
                    <div class="form-group">
                        <label>Email or Username</label>
                        <input
                            id="email"
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
                            id="password"
                            type="password"
                            class="form-control"
                            required
                            autocomplete="current-password"
                            v-model="form.password"
                        />
                    </div>
                    <div class="checkbox">
                        <input
                            class="form-check-input"
                            type="checkbox"
                            id="remember"
                            v-model="form.remember"
                        />

                        <label class="form-check-label" for="remember"
                            >Remember Me</label
                        >
                    </div>
                    <button type="submit" class="btn btn-primary">
                        Sign In
                    </button>
                </form>
                <br />
                <hr />
                <div class="text-center">
                    Or
                    <br />
                    <button @click.prevent="login">Login</button>
                    <!-- <a
                        :href="`${fbLogin}social-login/facebook`"
                        class="btn btn-primary btn-sm"
                        >Login with facebook</a
                    > -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    layout: "login",
    middleware: "guest",
    data() {
        return {
            form: {
                email: "",
                password: "",
                remember: false
            },
            errors: [],
            fbLogin: process.env.baseUrl
        };
    },
    mounted() {},
    methods: {
        submit() {
            this.$auth.loginWith("local", {
                data: {
                    email: this.form.email,
                    password: this.form.password
                }
            });
        },
        login() {
            this.$axios
                .get(`${this.fbLogin}social-login/facebook`)
                .then(response => {
                    console.log(response);
                });
        }
    }
};
</script>
