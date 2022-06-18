<template>
  <div class="col-lg-2 d-none d-sm-block">
    <div class="container">
      <div class="custom-control custom-radio">
        <h3>Filter By:</h3>

        <ul>
          <li></li>
        </ul>
        <!-- parent -->
        <input
          @click="key = 1"
          type="radio"
          id="customRadio1"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio1">Top</label>
      </div>

      <!-- parent -->
      <h1>By Duration</h1>
      <!-- child -->
      <div class="custom-control custom-radio">
        <input
          @click="key = 2"
          type="radio"
          id="customRadio2"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio2">Quick</label>
      </div>

      <!-- child -->

      <div class="custom-control custom-radio">
        <input
          @click="key = 3"
          type="radio"
          id="customRadio3"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio3">Long</label>
      </div>

      <h1>Categories</h1>

      <div class="custom-control custom-radio">
        <input
          @click="key = 4"
          type="radio"
          id="customRadio4"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio4">Rock</label>
      </div>

      <!-- child -->

      <div class="custom-control custom-radio">
        <input
          @click="key = 5"
          type="radio"
          id="customRadio5"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio5">Chill</label>
      </div>

      <!-- child -->

      <div class="custom-control custom-radio">
        <input
          @click="key = 6"
          type="radio"
          id="customRadio6"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio6">Meditate</label>
      </div>

      <!-- child -->
      <div class="custom-control custom-radio">
        <input
          @click="key = 7"
          type="radio"
          id="customRadio7"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio7">Popular</label>
      </div>

      <!--

                        <div class="custom-control custom-radio">
            <input  @click="key = 26" type="radio" id="customRadio26" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio26">Popular  </label>
            </div> 
            <div class="custom-control custom-radio">
            <input  @click="key = 8" type="radio" id="customRadio8" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio8">All</label>
            </div>
            -->

      <div class="custom-control custom-radio">
        <input
          @click="key = 9"
          type="radio"
          id="customRadio9"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio9">Ambiental</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 10"
          type="radio"
          id="customRadio10"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio10">Gaming</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 11"
          type="radio"
          id="customRadio11"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio11">Classic</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 12"
          type="radio"
          id="customRadio12"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio12">Lo-Fi</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 13"
          type="radio"
          id="customRadio13"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio13">HipHop</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 24"
          type="radio"
          id="customRadio24"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio24">Techno </label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 25"
          type="radio"
          id="customRadio25"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio25">Trap </label>
      </div>

      <h1>By Countries / Regional</h1>

      <div class="custom-control custom-radio">
        <input
          @click="key = 14"
          type="radio"
          id="customRadio14"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio14">African</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 15"
          type="radio"
          id="customRadio15"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio15">Spania</label>
      </div>
      <div class="custom-control custom-radio">
        <input
          @click="key = 22"
          type="radio"
          id="customRadio22"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio22">Spanish </label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 16"
          type="radio"
          id="customRadio16"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio16">China</label>
      </div>
      <div class="custom-control custom-radio">
        <input
          @click="key = 18"
          type="radio"
          id="customRadio18"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio18">Chinese</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 17"
          type="radio"
          id="customRadio17"
          name="customRadio"
          class="custom-control-input"
          checked
        />
        <label class="custom-control-label" for="customRadio17">Arabic</label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 19"
          type="radio"
          id="customRadio19"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio19">France </label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 20"
          type="radio"
          id="customRadio20"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio20">Indian </label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 21"
          type="radio"
          id="customRadio21"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio21">Italy </label>
      </div>

      <div class="custom-control custom-radio">
        <input
          @click="key = 23"
          type="radio"
          id="customRadio23"
          name="customRadio"
          class="custom-control-input"
        />
        <label class="custom-control-label" for="customRadio23">Japan </label>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  layout: "login",
  middleware: "guest",
  data() {
    return { key: "" };
  },
};
</script>
