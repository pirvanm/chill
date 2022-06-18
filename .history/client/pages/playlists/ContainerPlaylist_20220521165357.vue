<
<template>
  <div class="col-lg-10">
    <div class="container" v-if="key == 1">
      <h1>Top Category</h1>

      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in tops"
          key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 2">
      <h1>Quick Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in quick"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="container" v-if="key == 3">
      <h1>Long Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in long"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 4">
      <h1>Rock Playlist</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in rock"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 5">
      <h1>Chill Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in chill"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 6">
      <h1>Meditate Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in meditat"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 7">
      <h1>Down Tempo Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in downtempo"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 8">
      <h1>All Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in all"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 9">
      <h1>Ambiental Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in ambiental"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 10">
      <h1>Gaming Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in gaming"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 11">
      <h1>Classic Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in classic"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 12">
      <h1>Lo-Fi Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in lo_fi"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 13">
      <h1>HipHop Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in hiphop"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 14">
      <h1>African Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in african"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 15">
      <h1>Spania Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in spania"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 16">
      <h1>China Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in china"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 17">
      <h1>Arabic Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in arabic"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 18">
      <h1>Chinese Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in chinese"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 19">
      <h1>France Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in france"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 20">
      <h1>Indian Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in indian"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 21">
      <h1>Italy Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in italy"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 22">
      <h1>Spanish Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in spanish"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 23">
      <h1>Japan Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in japan"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 24">
      <h1>Techno Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in techno"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>
    <div class="container" v-if="key == 25">
      <h1>Trap Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in trap"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="container" v-if="key == 26">
      <h1>Popular Category</h1>
      <div class="row">
        <div
          class="col-lg-3 col-md-6 mb-4"
          v-for="popularCategory in playlists"
          :key="popularCategory.id"
        >
          <div class="category-card">
            <img :src="popularCategory.image" />
            <nuxt-link :to="`/playlists/${popularCategory.slug}`">
              <div>
                <a href="#category-link" class="category">
                  {{ popularCategory.name }}
                </a>
              </div>
            </nuxt-link>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
