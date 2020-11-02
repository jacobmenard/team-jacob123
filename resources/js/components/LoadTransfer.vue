<template>
    <div v-if="!loading">
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
            <div class="col-xl-4">
            <div class="card mb-3">
              <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-control-label d-block">My Load Balance: {{login_user.accout_points.acc_load | numeral('0,0.00')}}</label>
                        </div>
                    </div>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Load Transaction</h3>
                  </div>
                  <!-- <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                  </div> -->
                </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12">
                        <div class="form-group">
                            <label class="form-control-label">Transaction type</label>
                            <select class="form-control" v-model="transactionData.sel_typ">
                                <option v-for="typ in trans_type" :key="typ.trans_typ_no" v-bind:value="typ.trans_typ_no">{{typ.trans_type}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label d-block">User ID: {{transactionData.userID| numeral('00000000000')}}</label>
                            <label class="form-control-label d-block">User name: {{individualUser? individualUser[0].username:''}}</label>
                            <label class="form-control-label d-block">Remaining Load: {{individualUser? individualUser[0].accout_points?individualUser[0].accout_points.acc_load:0:0| numeral('0,0.00')}}</label>
                            <label class="form-control-label" for="load-amount">Load Amount</label>
                            <input id="input-address" class="form-control" placeholder="0.00" type="number" v-model="transactionData.loadAmt">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label" for="input-address">Total Load Balance: {{getTotalLoad(individualUser? individualUser[0].accout_points?individualUser[0].accout_points.acc_load:0:0, transactionData.loadAmt == '' ? 0 : transactionData.loadAmt) | numeral('0,0.00')}}</label>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label d-block" for="input-address">Remarks: (Optional)</label>
                            <input id="input-address" class="form-control" placeholder="Input remarks here (Optional)" type="text" v-model="transactionData.remarks">
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <a href="#!" class="btn btn-primary d-inline-block" @click="sendLoad">Transact now</a>
                            <a @click="backtoLoadStation()" class="btn btn-danger d-inline-block">Back</a>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="card">
              <div class="card-header border-0">
                <div class="row align-items-center">
                  <div class="col">
                    <h3 class="mb-0">Agent transaction log</h3>
                  </div>
                  <!-- <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                  </div> -->
                </div>
              </div>
              <div class="table-responsive">
                <!-- Projects table -->
                <table class="table align-items-center table-flush">
                  <thead class="thead-light">
                    <tr>
                      <th scope="col">Transaction <span class="d-block">code</span></th>
                      <th scope="col">Transaction <span class="d-block">date</span></th>
                      <th scope="col">Type of <span class="d-block">transaction</span></th>
                      <th scope="col">Amount</th>
                      <th scope="col">Payment Method</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- <tr v-for="agent in agents" :key="agent.id">
                      <th scope="row" class="text-center">{{ agent.id | numeral('00000000') }}</th>
                      <th>{{agent.username}}</th>
                      <td>{{agent.email}}</td>
                      <th class="text-center">{{agent.acc_percentage}}</th>
                      <th class="text-right">{{ agent.accout_points.acc_load | numeral('0,0.00') }}</th>
                      <td>
                        <span class="badge badge-pill badge-success" v-if="agent.acc_stat == 'ACTIVE'">{{agent.acc_stat}}</span>
                        <span class="badge badge-pill badge-danger" v-if="agent.acc_stat == 'INACTIVE'">{{agent.acc_stat}}</span>
                      </td>
                      <td>
                        <a href="#" class="btn btn-sm btn-danger d-inline-block text-uppercase" @click="changeUserStatus(agent.id, agent.acc_stat)" v-if="agent.acc_stat == 'ACTIVE'">Inactive</a>
                        <a href="#" class="btn btn-sm btn-primary d-inline-block text-uppercase" @click="changeUserStatus(agent.id, agent.acc_stat)" v-if="agent.acc_stat == 'INACTIVE'">Activate</a>
                        <router-link to="/pages/loadtransfer" class="btn btn-sm btn-primary d-inline-block text-uppercase" >Load Transfer</router-link>
                        <a href="#" class="btn btn-sm btn-primary d-inline-block text-uppercase" @click="updatePercentage()">Update Percentage</a>
                      </td>
                    </tr> -->

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
              loading: false,
              login_user: '',
              trans_type: '',
              individualUser: '',
              transactionData: {
                  userID: this.$route.params.user,
                  sel_typ: '',
                  loadAmt: '',
                  remarks: ''
              },
            
            }
        },
        created() {
           this.getLoginAgent()
            this.getTransactionType()
            this.getIndividualUser()
        },

        methods: {
            backtoLoadStation() {
                this.$router.push({name: "loadstation"});
            },
            getLoginAgent() {
              this.loading = true
              var url = '/login/getMainUser';
              axios.get(url).then((res) => {
                this.login_user = res.data
                if(!this.login_user.accout_points){
                 this.login_user.accout_points.acc_load = 0;
                }
                this.loading = false
              }).catch(() => {
                console.log(error);
              })
            },
            getTransactionType() {
              this.loading = true
              var url = '/login/getTransactionType'
              axios.get(url).then((res) => {
                this.trans_type = res.data
                this.loading = false
              })
            },
            getIndividualUser() {
              var url = '/login/loadtransfer/' + this.transactionData.userID
              
              axios.get(url).then((res) => {
                this.loading = true;
                this.individualUser = res.data
                this.loading = false
              })
            },
            getTotalLoad(current, addition) {
              var val1 = parseFloat(current)
              var val2 = parseFloat(addition)
              return val1 + val2;
            },
            sendLoad(){
        
              let error_message = [];

              if(!this.transactionData.loadAmt){
                  error_message.push("Load amount is required");
              }
              if(!this.transactionData.sel_typ){
                 error_message.push("Please select transaction type");
              }
              if(!this.transactionData.userID){
                 error_message.push("Unable to get reciever id please go back to load station");
              }
              if(this.transactionData.loadAmt > this.login_user.accout_points.acc_load){
                error_message.push("Unable to load please check: amount is bigger than current balance");
              }
              if(error_message.length == 0){

                //connfirmation before sending load incase of mistype of number//

                let content = document.createElement('div');
                if(this.transactionData.sel_typ == 1){
                  content.innerHTML = 'Are sure you want to load '+ this.individualUser[0].username +' <strong>'+ this.transactionData.loadAmt +'</strong> ?';
                }else if(this.transactionData.sel_typ == 2){
                  content.innerHTML = 'Are sure you want to redeem load of '+ this.individualUser[0].username +' <strong>'+ this.transactionData.loadAmt +'</strong> ?';
                }
                      swal({
                        title: "Confirmation",
                        content: content,
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                      }).then((choice) => {
                        if (choice) {
                          axios.post('/agent/sendLoad',this.transactionData).then((res) => { 
                              if(res.data.success){
                                swal("Good job!", res.data.message.toString() , "success"); 
                               setTimeout(() =>
                                this.getIndividualUser(),
                                this.getLoginAgent(),
                                1000);
                                
                              }else{
                                swal("Error", res.data.message, "warning");
                              }
                            })
                        }
                      })
                  
                 }else{
                  swal("ERROR!",error_message.toString(), "warning");
                 }
            
            }
            
        },
        
        mounted() {
            // console.log('Component mounted.');
           
        },
    }
</script>
