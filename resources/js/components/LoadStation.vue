<template>

    <!-- Page content -->
      <div class="container-fluid mt--6">
        <!-- registration link  -->
        <div class="row">
          <div class="col-xl-12">
            <div class="card card-stats">
              <div class="card-body">
                <h5 class="card-title text-uppercase text-muted mb-0 d-block">Agent Registration Link</h5>
                <div class="input-group mb-3">
                  <input type="text" class="form-control" aria-label="Agent Registration Link" aria-describedby="basic-addon2" readonly>
                  <div class="input-group-append">
                    <button class="btn btn-outline-primary" type="button">Copy link</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card card-stats">
                <!-- Card body -->
                  <div class="card-body">
                       
                  </div>
                </div>
            </div>
        </div>
      </div>
</template>

<script>
export default {
    data() {
        return {
             user: null
        }
    },
    methods: {
      getAuthenticated() {
        axios.get('/api/user').then((res) => {
            this.user = res.data;
        })
      }
    },
    mounted() {
      this.getAuthenticated();
    }
}
</script>