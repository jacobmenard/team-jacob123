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
                    <h3 class="mb-0">{{trans_type.trans_type}} Transaction</h3>
                  </div>
                  <!-- <div class="col text-right">
                    <a href="#!" class="btn btn-sm btn-primary">See all</a>
                  </div> -->
                </div>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-xl-12">
                      <form>
                        <div class="form-group">
                            <label class="form-control-label d-block">User ID: {{individualUser.id | numeral('00000000000')}}</label>
                            <label class="form-control-label d-block">User name: {{individualUser.username}}</label>
                            <label v-if="trans_type.trans_typ_no == 2" class="form-control-label d-block">Remaining Load: {{individualUser.accout_points.acc_load | numeral('0,0.00')}}</label>
                            <label v-if="trans_type.trans_typ_no == 3" class="form-control-label d-block">Current Sales: {{individualUser.accout_points.acc_com | numeral('0,0.00')}}</label>
                            <label class="form-control-label" for="load-amount">{{trans_type.trans_type}} Amount</label>
                            <input id="input-address" class="form-control" :class="{'is-invalid' : form.loadAmt < 0}" placeholder="0.00" type="number" v-model="form.loadAmt">
                            <!-- <span v-if="errors.transAmt" class="text-danger">Menard</span> -->
                        </div>

                        <div class="form-group">
                            <label v-if="trans_type.trans_typ_no != 3" class="form-control-label" v-bind:class="{'text-danger' : form.loadAmt < 0}" for="input-address">Remaining Sales: {{getTotalLoad(individualUser.accout_points.acc_load, form.loadAmt == '' ? 0 : form.loadAmt) | numeral('0,0.00')}}</label>
                            <label v-if="trans_type.trans_typ_no == 3" class="form-control-label" v-bind:class="{'text-danger' : getTotalLoad(individualUser.accout_points.acc_com, form.loadAmt == '' ? 0 : form.loadAmt) < 0}" for="input-address">Total Balance: {{getTotalLoad(individualUser.accout_points.acc_com, form.loadAmt == '' ? 0 : form.loadAmt) | numeral('0,0.00')}}</label>
                        </div>

                        <div class="form-group">
                            <label class="form-control-label d-block" for="input-address">Remarks: (Optional)</label>
                            <input id="input-address" class="form-control" placeholder="Input remarks here (Optional)" type="text" v-model="form.remarks">
                        </div>

                        <div class="col-12 d-flex justify-content-center">
                            <a v-if="trans_type.trans_typ_no == 1" class="btn btn-primary d-inline-block" type="submit" @click.prevent="saveTransaction">Deposit now</a>
                            <a v-if="trans_type.trans_typ_no == 2" class="btn btn-primary d-inline-block" type="submit" @click.prevent="saveTransaction">Widraw load now</a>
                            <a v-if="trans_type.trans_typ_no == 3" class="btn btn-primary d-inline-block" type="submit" @click.prevent="saveTransaction">Widraw sales now</a>
                            <a v-on:click="backtoLoadStation()" class="btn btn-danger d-inline-block">Back</a>
                        </div>
                      </form>
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
                    <h3 class="mb-0">Agent <span class="text-success">{{individualUser.username}}</span> transaction log</h3>
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
                      <th scope="col">Transaction remarks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="trans in trans_log" :key="trans.trans_no">
                      <td scope="row">{{ trans.trans_no | numeral('00000000') }}</td>
                      <td>{{trans.created_at | formatDate}}</td>
                      <td>{{trans.get_trans_type.trans_type}}</td>
                      <td class="text-center">{{trans.trans_amt | numeral('0,0.00')}}</td>
                      <td class="text-center">{{trans.trans_remarks == '' || trans.trans_remarks == null ? '-' : trans.trans_remarks}}</td>
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
            login_user: '',
            trans_type: '',
            individualUser: null,
            userID: this.$route.params.user,

            form: {
              loadAmt: '',
              remarks: ''
            },
            error: [],

            trans_log: '',
            amt_error: false
          }
        },
        methods: {
            saveTransaction() {
              let message = [];
              if(this.form.loadAmt == 0 || this.form.loadAmt == ''){
                  message.push("Load amount is required");
              } 
              else if(this.form.loadAmt <= 0) {
                message.push("Please input amount greater than zero amount");
                this.form.loadAmt = ''
              }
              else if (parseFloat(this.login_user.accout_points.acc_load) < parseFloat(this.form.loadAmt)) {
                message.push("Your remaining load balance: " + this.login_user.accout_points.acc_load + ". error to transact, please try again!");
                this.form.loadAmt = ''
              }//
              else if(this.amt_error) {
                message.push("The balance or sales total must be non negative");
              }

              if(message.length == 0){
                swal({
                  title: "Confirmation",
                  text: "Do you want complete this transaction?",
                  icon: "info",
                  buttons: ['Cancel', 'Continue'],
                  dangerMode: true,
                }).then((choice) => {
                  
                  if (choice) {

                    this.addTransaction() // function for add a transaction
                    

                    swal("Transaction success!", 'Transaction has been successfully transact!', "Suceess");
                    setTimeout(() => {
                      
                      this.getLoginAgent()
                      this.getTransactionType()
                      this.getIndividualUser()
                      this.getIndividualTransaction()
                    }, 1000);
                  }
                })
                //connfirmation before sending load incase of mistype of number//
              } else {
                swal("Error!", message.toString(), "warning");
              }
              
            },
            addTransaction() {
              var trans_val = {
                'transType': this.trans_type.trans_typ_no,
                'transFrom' : this.login_user.id,
                'transTo': this.userID,
                'transAmt': this.form.loadAmt,
                'transRemarks': this.form.remarks
              }
              var url = '/save/transaction'
              axios.post(url, trans_val).then((res) => {
                Object.assign(this.$data, this.$options.data.call(this));
              }).catch((error) => {
                  this.errors = error.response.data.errors;
              })
            },
            backtoLoadStation() {
                this.$router.push({name: "loadstation"});
            },
            getLoginAgent() {
              var url = '/login/getMainUser';
              axios.get(url).then((res) => {
                this.login_user = res.data
              }).catch(() => {
                console.log(error);
              })
            },
            getTransactionType() {
              var trans = (this.$route.params.trans == 'Deposit' ? 1 : this.$route.params.trans == 'Widraw' ? 2 : this.$route.params.trans == 'Sales' ? 3 : 0)
              var url = '/login/getTransactionType/' + trans
              axios.get(url).then((res) => {
                this.trans_type = res.data
              })
            },
            getIndividualUser() {
              var url = '/login/loadtransfer/' + this.userID
              axios.get(url).then((res) => {
                this.individualUser = res.data
              })
            },
            getTotalLoad(current, addition) {
              var val1 = parseFloat(current)
              var val2 = parseFloat(addition)
              var tot = 0
              if (this.trans_type.trans_typ_no == 1) {
                tot = val1 + val2;
              } else {
                tot = val1 - val2;
              }
              if (tot < 0) {
                this.amt_error = true
              }
              return tot
            },
            getIndividualTransaction() {
              var url = '/agent/transaction';
              var data = {
                'agentID': this.userID
              }
              axios.post(url, data).then((res) => {
                this.trans_log = res.data
              })
            }
        },
        mounted() {
            // console.log('Component mounted.');
            this.getLoginAgent()
            this.getTransactionType()
            this.getIndividualUser()
            this.getIndividualTransaction()
        },
    }
</script>
