<template>
  <div id="content">
    <div class="d-flex justify-content-center">
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

    <div class="d-flex flex-row justify-content-center" style="height: 100vh">
      <div class="col-8">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, cum tempore
        ex iste vel recusandae corporis sint consequuntur culpa exercitationem
        sequi mollitia, aspernatur saepe enim, officia provident eum odit
        voluptate.
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: "Home",
    data() {
        return {};
    },
    methods: {},
    computed: {},
    created() {},
    mounted() {},
    destroyed() {}
    };
</script>

<style scoped>
.lists li {
  background-color: transparent;
}
.lists li:hover {
  margin-left: 10px;
  transition: 300ms all;
}
</style>