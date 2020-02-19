<template>
    <div>
        <section class="content">
            <div class="row justify-content-around">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Post list</h3>

                            <div class="card-tools">
                                <button class="btn btn-primary">
                                    <router-link to="/add-post" style="color:#fff"> Add Post</router-link>
                                </button>
                            </div>
                        </div>

                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover table-responsive-lg">
                                <thead>
                                <tr>
                                    <th>id</th>
                                    <th>user name</th>
                                    <th>category name</th>
                                    <th>title</th>
                                    <th>description</th>
                                    <th>photo</th>
                                    <th>Actions</th>

                                </tr>
                                </thead>
                                <tbody>

                                <tr v-for="(post,index) in allPost">

                                    <td>{{index+1}}</td>
                                    <td v-if="post.user">{{post.user.name}}</td>
                                    <td v-if="post.category">{{post.category.cat_name}}  </td>
                                    <td>{{post.title}}</td>
                                    <td>{{post.description | sortlength(40,'...')}}</td>
                                    <td><img :src="post.photo" alt="" height="50" width="40">jk</td>
                                    <td>
                                        <a href="#">Edit</a>
                                        <a href="#">Delete</a>
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
    export default {
        name: "List",
        mounted() {
            this.$store.dispatch('allPost')
        },
        computed: {
            allPost() {
                return this.$store.getters.getAllPost
            }
        },
        methods: {}
    }
</script>

<style scoped>

</style>