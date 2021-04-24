<template>
 <div>

  <b-form @submit="onSubmit" @reset="onReset" v-if="show">
   <b-form-group
           id="input-group-1"
           label="Email address:"
           label-for="input-1"
           description="We'll never share your email with anyone else."
   >
    <b-form-input
            id="input-1"
            v-model="form.email"
            type="email"
            required
            placeholder="Enter email"
    ></b-form-input>
   </b-form-group>

   <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
    <b-form-input
            id="input-2"
            v-model="form.name"
            required
            placeholder="Enter name"
    ></b-form-input>
   </b-form-group>

   <b-form-group id="input-group-3" label="Topic:"
                 label-for="input-3">
    <b-form-select
            id="input-3"
            v-model="form.food"
            :options="foods"
            required
    ></b-form-select>


    <b-form-group id="input-group-2" label="Your Message:" label-for="input-2">
     <b-form-textarea
             id="input-2"
             v-model="form.message"
             required
             placeholder="Enter the message"
     ></b-form-textarea>
    </b-form-group>
   </b-form-group>



   <b-button type="submit" variant="primary">Submit</b-button>
   <b-button type="reset" variant="danger">Reset</b-button>


   <p> Or Just send me a email to : whisperchill4@gmail.com</p>
  </b-form>
<!--  <b-card class="mt-3" header="Info">
   Each opinion matters, which is why we invite you to leave us an email at the following address : contact@chillwhisper.com
 &lt;!&ndash;  <pre class="m-0">{{ form }}</pre>&ndash;&gt;
  </b-card>-->
 </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    name: '',
                    food: null,
                    checked: []
                },
                foods: [{ text: 'Select One', value: null }, 'Colaboration', 'Free Talk', 'Bugg'],
                show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.name = ''
                this.form.food = null
                this.form.checked = []
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                    this.show = true
            })
            }
        }
    }
</script>
