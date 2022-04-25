<template>
  <div class="row">
    <div class="col-md-3" v-for="(cat, index) in categories" :key="index">
      <div
        class="card text-center"
        :class="checkInclude(cat) ? 'active' : ''"
        @click.prevent="selectCategory(cat, index)"
      >
        <h3>{{ cat.category_name }}</h3>
      </div>
    </div>
    <div class="col-md-12">
      <button class="btn btn-sm btn-success" @click.prevent="save()">
        Save
      </button>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
export default {
  data() {
    return {
      categories: [],
      selectedCategories: [],
    };
  },
  mounted() {
    this.getCategories();
  },
  methods: {
    getCategories() {
      this.$axios.get("/categories").then((response) => {
        this.categories = response.data.categories;
      });
    },
    checkInclude(cat) {
      if (this.selectedCategories.includes(cat.id)) {
        return true;
      } else {
        return false;
      }
    },
    selectCategory(cat) {
      if (this.selectedCategories.includes(cat.id)) {
        const searchedIndex = this.selectedCategories.findIndex(
          (sCat) => sCat == cat.id
        );
        this.selectedCategories.splice(searchedIndex, 1);
      } else {
        console.log("select category false includes");
        this.selectedCategories.push(cat.id);
      }
    },
    save() {
      if (this.selectedCategories.length >= 5) {
        this.$axios
          .post("/save-user-categories", {
            categories: this.selectedCategories,
          })
          .then((response) => {
            if (response.status == 200) {
              this.$emit("saved");
            } else {
              Swal.fire("Whoooppss..", "Something went wrong", "error");
            }
          });
      } else {
        Swal.fire("Whoooppss..", "Select atleast 5 categories", "error");
      }
    },
  },
};
</script>

<style scoped>
.active {
  border: 4px solid green;
}
</style>
