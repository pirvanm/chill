<template>
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        <menuAdmin />
      </div>
      <div class="col-md-10">
        <div class="row">
          <div class="col-md-3 text-center border pr-2 mr-2">
            <h1>Filters</h1>

            <div class="form-group col-md-12 pr-2 mr-2">
              <h1 for="inputState">#1 Filter Pick a Category</h1>
              <select
                id="inputState"
                class="form-control"
                v-model="filter.category"
              >
                <option selected value="">Choose...</option>

                <option
                  v-for="cat in categories.data"
                  :key="cat.id"
                  :value="cat.category_name"
                >
                  {{ cat.category_name }}
                </option>
              </select>
            </div>
            <label for="inputState">#2 Pick Duration</label>
            <br /><br />
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio1"
                :value="1"
                v-model="filter.duration"
              />
              <label class="form-check-label" for="inlineRadio1">1</label>
            </div>
            <br /><br />
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio2"
                :value="2"
                v-model="filter.duration"
              />
              <label class="form-check-label" for="inlineRadio2">2</label>
            </div>
            <br /><br />
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio3"
                :value="3"
                v-model="filter.duration"
              />
              <label class="form-check-label" for="inlineRadio3">3</label>
            </div>
            <br /><br />
            <div class="form-check form-check-inline">
              <br />
              <input
                class="form-check-input"
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio4"
                :value="4"
                v-model="filter.duration"
              />
              <label class="form-check-label" for="inlineRadio3">4</label>
            </div>
            <br /><br />
            <div class="form-check form-check-inline">
              <input
                class="form-check-input"
                type="radio"
                name="inlineRadioOptions"
                id="inlineRadio5"
                :value="5"
                v-model="filter.duration"
              />
              <label class="form-check-label" for="inlineRadio3">5</label>
            </div>
            <br /><br />

            <form>
              <div class="form-group">
                <label for="inputState">#3 Chouse Number of Views</label>
                <client-only>
                  <vue-slider
                    v-model="range.views"
                    :min="range.min"
                    :max="range.max"
                    @change="changeSlider"
                  ></vue-slider>
                </client-only>
                <div class="row">
                  <input
                    class="col-md-6 form-control pb-2"
                    type="number"
                    v-model="range.views[0]"
                    @input="changeSlider"
                  />
                  <br /><br />
                  <input
                    class="col-md-6 form-control"
                    type="number"
                    v-model="range.views[1]"
                    @input="changeSlider"
                  />
                </div>
              </div>

              <div class="form-group">
                <label for="inputState">#4 Type a Title</label>

                <input
                  type="text"
                  class="form-control"
                  id="title"
                  v-model="filter.title"
                />
              </div>

              <div class="form-group">
                <label for="inputState">#5 Type a Tagg</label>

                <input
                  type="text"
                  class="form-control"
                  id="tagg"
                  v-model="filter.tag"
                />
              </div>
            </form>
          </div>

          <div class="col-md-4 border pr-2">
            <h1>
              Edit Playlist / count({{ left.length }})
              <input
                type="text"
                class="form-control"
                placeholder="Enter Playlists Name"
                v-model="form.playlist"
              />
              <button
                class="btn btn-sm btn-success btn-block mt-1"
                @click.prevent="savePlaylists"
              >
                Save
              </button>
            </h1>
            <client-only>
              <draggable
                class="list-group"
                :list="left"
                group="video"
                style="height: 500px"
              >
                <div
                  class="list-group-item"
                  v-for="(lvideo, ind) in left"
                  :key="ind"
                >
                  {{ lvideo.title }}
                </div>
              </draggable>
            </client-only>
          </div>

          <div class="col-md-4 border ml-2">
            <h1>List of posible Songs / count({{ videos.meta.total }})</h1>
            <hr />
            <client-only>
              <draggable class="list-group" :list="videos.data" group="video">
                <div
                  class="list-group-item"
                  v-for="video in videos.data"
                  :key="video.title"
                >
                  Title: {{ video.title }} Views: {{ video.views }} Duration
                  {{ video.duration }} Type: {{ video.type_duration }}
                  <div>
                    See Video

                    <button class="btn btn-sm btn-info btn-block mt-1">
                      <a :href="'/watch/' + video.videoId" target="_blank"
                        >See Video with id : {{ video.videoId }}</a
                      >
                      <a :href="'  video.thumbnail'" target="_blank"
                        >See Video Image: {{ video.videoId }}</a
                      >
                    </button>
                  </div>
                </div>
              </draggable>
            </client-only>

            <client-only placeholder="Loading...">
              <pagination
                v-model="videos.meta.current_page"
                :records="videos.meta.total"
                @paginate="myCallback"
                :per-page="videos.meta.per_page"
                :chunk="3"
                chunksNavigation="fixed"
              />
            </client-only>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Swal from "sweetalert2";
import menuAdmin from "@/components/MenuAdmin";
export default {
  async asyncData({ query, params, error, $axios }) {
    const videos = await $axios.$get(`/admin/videos`);
    const categories = await $axios.$get(`/admin/categories`);
    const playl = await $axios.$get(`/admin/playlist/${params.id}`);

    return {
      videos,
      categories,
      left: playl.data.videos,
      playlist: playl.data,
      range: {
        views: [videos.imp.minView, videos.imp.maxView],
        min: videos.imp.minView,
        max: videos.imp.maxView,
      },
      form: {
        playlist: playl.data.name,
      },
    };
  },
  middleware: ["admin"],
  components: {
    menuAdmin,
  },
  mounted() {},
  data() {
    return {
      timer: null,
      right: [],
      left: [],
      filter: {
        category: "",
        duration: 1,
        title: "",
        tag: "",
      },
    };
  },
  watch: {
    filter: {
      // This will let Vue know to look inside the array
      deep: true,

      // We have to move our method to a handler field
      handler() {
        clearTimeout(this.timer);
        this.timer = setTimeout(() => {
          this.filterVideo();
        }, 500);
      },
    },
  },
  methods: {
    savePlaylists() {
      this.$axios
        .post(`/admin/playlist/${this.playlist.id}/edit`, {
          playlist: this.form.playlist,
          videos: this.left,
        })
        .then((response) => {
          if (response.status == 200) {
            Swal.fire({
              title: "Playlist updated success",
              icon: "success",
              showConfirmButton: true,
              timer: 1500,
              confirmButtonText: "Ok",
            }).then((result) => {
              if (result.isConfirmed) {
                this.$router.push("/admin/playlists");
              }
            });
          }
        });
    },
    myCallback() {
      this.$axios
        .get(
          `/admin/videos?page=${this.videos.meta.current_page}&category=${this.filter.category}&duration=${this.filter.duration}&min=${this.range.views[0]}&max=${this.range.views[1]}&title=${this.filter.title}&tag=${this.filter.tag}`
        )
        .then((response) => {
          this.videos.data = response.data.data;
          this.videos.meta = response.data.meta;
        });
    },
    filterVideo() {
      this.$axios
        .get(
          `/admin/videos?category=${this.filter.category}&duration=${this.filter.duration}&min=${this.range.views[0]}&max=${this.range.views[1]}&title=${this.filter.title}&tag=${this.filter.tag}`
        )
        .then((response) => {
          this.videos.data = response.data.data;
          this.videos.meta = response.data.meta;
        });
    },
    changeSlider() {
      clearTimeout(this.timer);
      this.timer = setTimeout(() => {
        this.filterVideo();
      }, 500);
    },
  },
};
</script>
<style scoped>
.container {
  margin-top: 50px;
}
</style>
