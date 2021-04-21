<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
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
            errors: []
        };
    },
    methods: {
        submit() {
            this.$auth.loginWith("local", {
                data: {
                    email: this.form.email,
                    password: this.form.password
                }
            });
            // .then(res => {
            //   this.$router.push(
            //     this.$route.query.redirect ? this.$route.query.redirect : "/"
            //   );
            // })
            // .catch(res => {
            //   this.errors = res.response.data.errors;
            // });
        }
    }
};
</script>
