<template>
    <div>
      <!-- Header -->
      <!-- Header -->
      <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                <!-- <h6 class="h2 text-white d-inline-block mb-0"></h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#"></a></li>
                  </ol>
                </nav> -->
              </div>
              <!-- {{-- <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral">New</a>
                <a href="#" class="btn btn-sm btn-neutral">Filters</a>
              </div> --}} -->
            </div>
          </div>
        </div>
      </div>

    <!-- Page content -->
      <div class="container-fluid mt--6">      
        <div class="row">
          <div class="col-xl-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">My Super Agents</h3>
                  </div>
                  <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                  </div>
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Super <span class="d-block">Agent ID</span></th>
                      <th scope="col">Username</th>
                      <th scope="col">Email Address</th>
                      <th scope="col">Percentage</th>
                      <th scope="col">Remaining Load</th>
                      <th scope="col">Status</th>
                      <th scope="col" class="text-center">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="agent in agents" :key="agent.id">
                      <th scope="row" class="text-center">{{ agent.id | numeral('00000000') }}</th>
                      <th>{{agent.username}}</th>
                      <td>{{agent.email}}</td>
                      <th class="text-center">{{agent.acc_percentage}}</th>
                      <th class="text-right">{{ agent.acc_load | numeral('0,0.00') }}</th>
                      <td>
                        <span class="badge badge-pill badge-success" v-if="agent.acc_stat == 'ACTIVE'">{{agent.acc_stat}}</span>
                        <span class="badge badge-pill badge-danger" v-if="agent.acc_stat == 'INACTIVE'">{{agent.acc_stat}}</span>
                      </td>
                      <td>
                        <a href="#" class="btn btn-sm btn-danger d-inline-block text-uppercase" v-if="agent.acc_stat == 'ACTIVE'">Inactive</a>
                        <a href="#" class="btn btn-sm btn-primary d-inline-block text-uppercase" v-if="agent.acc_stat == 'INACTIVE'">Activate</a>
                        <a href="#" class="btn btn-sm btn-primary d-inline-block text-uppercase">Load Transfer</a>
                        <a href="#" class="btn btn-sm btn-primary d-inline-block text-uppercase">Update Percentage</a>
                      </td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <footer-component></footer-component>
      </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
          agents: null
        }
    },
    methods: {
      getAgent() {
        axios.get('/sa/get/getAgentList').then((res) => {
          this.agents = res.data;
        }).catch(() => {
          console.log(error);
        })
      }
    },
    mounted() {
      this.getAgent();
    },
}

  
</script>