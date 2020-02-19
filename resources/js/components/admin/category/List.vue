<template>
    <div>
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-8 ">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category List</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-category" style="color:#fff"> Add Category</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(category,index) in getAllPagination.data" :key="category.id">

                                    <td>{{++index}}</td>
                                    <td>{{category.cat_name}}</td>
                                    <td>{{category.created_at | timeformat}}</td>
                                    <td><a class="btn btn-danger" href="" @click.prevent="deleteCategory(category.id)">Delete</a>
                                        <router-link :to="`/edit-category/${category.id}`" class="btn btn-info" >Update</router-link>
                                    </td>


                                </tr>
                                </tbody>


                            </table>

                        </div>

                        <!-- /.card-body -->
                        <div class="card-footer">
                            <!--<pagination :data="getAllPagination" @pagination-change-page="getResult"></pagination>-->
                        </div>

                    </div>


                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

    export default {
        name: "List",
        data() {
            return {
                paginationItem: {},
                select: '',
                all_select: false
            }
        },
        mounted() {
            this.$store.dispatch("allCategory")
            this.$store.dispatch("allPagination")

        },
        computed: {

            //          'getCategory',   // via mapGetters , it get from index.js file's getters

            getAllCategory() {
                return this.$store.getters.getCategory
            },
            getAllPagination() {
                return this.$store.getters.getPagination
            }


        },
        methods: {
            deleteCategory(id) {
                axios.get('/delete_category/' + id)
               this.$store.dispatch("allPagination")
                    .then(() => {
                        toast.fire({
                            icon: 'success',
                            title: 'Ma\'lumot muvofaqiyatli o\'chirildi',
                        })
                    })
                //console.log(id)
            },
            getAll() {
                return this.categoryItem = this.$store.getters.getPagination('pagination')
            },
            getAllPaginationHandler: function () {
                return this.$store.getters.getPagination.data
            },
            loadPagination() {
                this.paginationItem = this.$store.getters.getPagination.data
            },
            getResults() {
                this.$store.getters.getPagination()
            }
        }
    }
</script>

<style scoped>
</style>