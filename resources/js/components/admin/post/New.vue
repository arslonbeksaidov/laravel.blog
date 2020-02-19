<template>
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-around">
                <!-- left column -->
                <div class="col-md-10">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add New Post</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form method="post" role="form" enctype="multipart/form-data">


                            <div class="card-body">
                                <div class="form-group">
                                    <label for="postId">Add New Post</label>
                                    <input type="text" class="form-control" id="postId"
                                           placeholder="Add New Post" v-model="form.title"
                                           name="title" :class="{ 'is-invalid': form.errors.has('title') }">
                                    <has-error :form="form" field="title "></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="DescriptionId">Add New Description</label>
                                    <textarea class="form-control" id="DescriptionId"
                                           placeholder="Add New description" v-model="form.description"
                                           name="description" :class="{ 'is-invalid': form.errors.has('description') }">
                                    </textarea>
                                    <has-error :form="form" field="title "></has-error>
                                </div>
                                <div class="form-group">
                                    <label for="catId">Select option for category</label>
                                    <select name="" class="form-control" :class="{ 'is-invalid': form.errors.has('cat_id') }" v-model="form.cat_id" id="catId">
                                        <option disabled value="" > Select one</option>
                                        <option :value="category.id"  v-for="category in getAllCategory">{{category.cat_name}}</option>
                                    </select>
                                    <has-error :form="form" field="category_id"></has-error>
                                </div>
                                <div class="form-group">
                                    <input name="photo" @change="changePhoto($event)" type="file" :class="{ 'is-invalid': form.errors.has('photo') }">   
                                    <img :src="form.photo" alt="">
                                    <has-error :form="form" field="category_id "></has-error>
                                </div>

                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
</template>

<script>
    export default {
        name: "New",
        data(){
            return{
                form: new Form({
                    title:'',
                    description:'',
                    cat_id:'',
                    photo:'',
                })
            }
        },
        mounted(){
            this.$store.dispatch("allCategory")
        },
        computed:{
            getAllCategory() {
                return this.$store.getters.getCategory
            },
        },
        methods:{
                changePhoto(event){
                    let file = event.target.files[0];

                    let reader = new FileReader();
                    
                    reader.onload = event => {
                        this.form.photo = event.target.result
                    };
                    reader.readAsDataURL(file);
                }
        },
    }
</script>

<style scoped>

</style>