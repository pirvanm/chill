<template></template>
<script>
export default {
  layout: "login",
  middleware: "guest",
  data() {
    return {
      form: {
        email: "",
        password: "",
        remember: false,
      },
      errors: [],
      fbLogin: process.env.baseUrl,
    };
  },
};
</script>
