<template>
    <div>
        <div class="row">
        <div class="container">
            <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                <div class="card-header">
                    Create Employees
                    <router-link
                        :to="{ name: 'EmployeesIndex'}"
                        class="btn btn-primary float-right"
                        >Back</router-link
                    >
                </div>

                <div class="card-body">
                    <form @submit.prevent="storeEmployee">
                
                        <div class="row mb-3">
                            <label for="first_name" class="col-md-4 col-form-label text-md-end">First Name</label>
                            <div class="col-md-6">
                                <input id="first_name" type="text" v-model="form.first_name"  class="form-controlis-invalid"  required />
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="middle_name" class="col-md-4 col-form-label text-md-end">Middle Name</label>
                            <div class="col-md-6">
                                <input id="middle_name" type="text" v-model="form.middle_name" class="form-controlis-invalid" value="" required />
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="last_name" class="col-md-4 col-form-label text-md-end">Last Name</label>
                            <div class="col-md-6">
                                <input id="last_name" type="text" v-model="form.last_name"  class="form-controlis-invalid" value="" required />
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>
                            <div class="col-md-6">
                                <input id="address" type="text" v-model="form.address" class="form-controlis-invalid" value="" required />
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>


                        <div class="row mb-3">
                            <label for="country" class="col-md-4 col-form-label text-md-end">Country</label>
                            <div class="col-md-6">
                                <select name="country" class="form-control" v-model="form.country_id" @change="getStates()">
                                    <!-- <option>Select Country</option> -->

                                    <option v-for="country in countries" :key="country.id" :value="country.id" aria-placeholder="Select Country">
                                        {{country.name}}
                                    </option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="state" class="col-md-4 col-form-label text-md-end">State</label>
                            <div class="col-md-6">
                                <select name="state" class="form-control" v-model="form.state_id" @change="getCities()">
                                    <option  v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="department" class="col-md-4 col-form-label text-md-end">Department</label>
                            <div class="col-md-6">
                                <select name="department" class="form-control" v-model="form.department_id" >
                                    <option v-for="department in departments" :key="department.id" :value="department.id">{{department.name}}</option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="city" class="col-md-4 col-form-label text-md-end">City</label>
                            <div class="col-md-6">
                                <select name="city" class="form-control" v-model="form.city_id">
                                    <option v-for="city in cities" :key="city.id" :value="city.id">{{city.name}}</option>
                                </select>

                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="zip_code" class="col-md-4 col-form-label text-md-end">Zip Code</label>
                            <div class="col-md-6">
                                <input id="zip_code" type="text" v-model="form.zip_code"  class="form-controlis-invalid" value="" required />
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">Birth Date</label>
                            <div class="col-md-6">
                                <input type="date" v-model="form.birthdate" class="form-control-date">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="date_hired" class="col-md-4 col-form-label text-md-end">Date Hired</label>
                            <div class="col-md-6 form-group">
                                <input type="date" v-model="form.date_hired" class="form-control-date">
                                <span class="invalid-feedback" role="alert">
                                    <strong></strong>
                                </span>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Store
                            </button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
    components:{

    },
    data(){
        return {
            countries:[],
            states:[],
            cities:[],
            departments:[],
            form:{
                first_name:"",
                last_name:"",
                middle_name:"",
                address:"",
                country_id:"",
                state_id:"",
                department_id:"",
                city_id:"",
                zip_code:"",
                birthdate:null,
                date_hired:null,
            }
        }
    },
    created(){
        this.getCountries();
        this.getDepartments();
    },
    methods:{
        getCountries(){
            axios.get('/api/employees/countries')
            .then(res=>{
                console.log(res);
                this.countries = res.data
            }).catch(error=>{
                console.log(error);
            })
        },
        getStates(){
            axios.get("/api/employees/"+ this.form.country_id +"/states")
            .then(res=>{
                console.log(res);
                this.states = res.data
            }).catch(error=>{
                console.log(error);
            })
        },
        getCities(){
            axios.get("/api/employees/"+ this.form.state_id +"/cities")
            .then(res=>{
                console.log(res);
                this.cities = res.data
            }).catch(error=>{
                console.log(error);
            })
        },
        getDepartments(){
            axios.get("/api/employees/departments")
            .then(res=>{
                console.log(res);
                this.departments = res.data
            }).catch(error=>{
                console.log(error);
            })
        },
        storeEmployee(){
            axios.post("/api/employees", {
                first_name: this.form.first_name,
                last_name: this.form.last_name,
                middle_name: this.form.middle_name,
                address: this.form.address,
                country_id: this.form.country_id,
                state_id: this.form.state_id,
                department_id: this.form.department_id,
                city_id: this.form.city_id,
                zip_code: this.form.zip_code,
                birthdate: this.form.birthdate,
                date_hired: this.form.date_hired

            }).then(res=>{
                console.log(res);
                this.$router.push({ name: "EmployeesIndex" });
            }).catch(error=>{
                console.log(error);
            })
            
        }
    }
};
</script>

<style>
</style>