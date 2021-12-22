<template>
  <div>
    <div class="d-none justify-content-center">
      <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <div class="container-fluid">
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Anasayfa</a
                >
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Katkıda Bulunmak</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">İletişim</a>
              </li>
            </ul>
          </div>
        </div>
        <div class="container-fluid">
          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </nav>
    </div>

    <div class="d-flex flex-row" style="height: 100vh">
      <div class="bg-light d-flex flex-column" style="width: 20%">
        <div class="logo">
          <img
            src="https://avatars.githubusercontent.com/u/70778024?s=200&v=4"
          />
        </div>
        <ul class="lists d-flex flex-column align-items-center bg-transparent">
          <li
            class="list-group-item w-100 border-0"
            v-for="repo in repos"
            :key="repo.id"
          >
            <router-link
              class="text-decoration-none"
              :to="{ name: 'category', params: { slug: repo.slug, repo: repo.slug} }"
              >{{ repo.name }}</router-link
            >
          </li>
        </ul>
      </div>
      <div class="col docs-content d-flex flex-column m-5">
        <p v-html="content"></p>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "Show",
  data() {
    return {
      repos: [],
      content: "",
    };
  },
  methods: {
  },
  computed: {},
  beforeCreate() {
    var slug = this.$route.params.slug;
    axios.get("/api/repo/" + slug).then((response) => {
      this.repos = response.data;
      this.content = response.data.content;
    });
  },
  created() {},
  mounted() {
    const slug = this.$route.params.slug;

  },
};
</script>
   <style lang="scss">
.lists li {
  background-color: transparent;
  &:hover {
    margin-left: 10px;
    transition: 300ms all;
    cursor: pointer;
  }
}

.logo {
  display: flex;
  justify-content: center;
  img {
    width: 100px;
    height: 100px;
    border-radius: 50px;

    &:hover {
      filter: blur(1px);
      filter: grayscale(10%);
    }
  }
}

.docs-content {
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    padding-bottom: 0.3em !important;
    border-bottom: 1px solid hsla(210, 18%, 87%, 1) !important;
  }
  ul {
    list-style: none;
  }
}
</style>