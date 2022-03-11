<script>
import { library } from "@fortawesome/fontawesome-svg-core";
import { faUserSecret } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";

export default {
  name: "FontAwesome",
  components: {
    // 'item-card': ItemCard
  },
  computed: {
    selectedFilters: function () {
      let filters = [];
      let checkedFiters = this.stacks.filter((obj) => obj.checked);
      checkedFiters.forEach((element) => {
        filters.push(element.value);
      });
      return filters;
    },
  },
};
</script>
