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
              :to="{ name: 'show', params: { slug: repo.slug } }"
              >{{ repo.name }}</router-link
            >
          </li>
        </ul>
      </div>
      <div class="col d-flex flex-column m-5">
        <h1 class="title">Başlık 1</h1>
        <p>
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cumque ex
          voluptatum nihil ab impedit vel veritatis dolor magni tempore error
          earum voluptatibus, obcaecati ducimus modi, accusantium optio vitae?
          Omnis, nobis.
        </p>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "Docs",
  data() {
    return {
      repos: [],
    };
  },
  methods: {},
  computed: {},
  beforeCreate() {
    axios.get("/api/repos").then((response) => {
      this.repos = response.data;
    });
  },
  created() {},
  mounted() {},
  destroyed() {},
};
</script>
   <style scoped>
.lists li {
  background-color: transparent;
}

.lists li:hover {
  margin-left: 10px;
  transition: 300ms all;
  cursor: pointer;
}

.logo {
  display: flex;
  justify-content: center;
}

.logo img {
  width: 100px;
  height: 100px;
  border-radius: 50px;
}

.logo img:hover {
  filter: blur(1px);
  filter: grayscale(10%);
}

.title {
  padding-bottom: 0.3em;
  border-bottom: 1px solid hsla(210, 18%, 87%, 1);
}
</style>