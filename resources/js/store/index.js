export default {
    state:{
        category:[],
        pagination:{},
        post:[],

    },
    getters:{
        getCategory(state){
            return state.category
        },
        getPagination(state){
            return state.pagination
        },
        getAllPost(state){
            return state.post
        }

    },
    actions:{
        allCategory(context){
            axios.get('/category')
                .then((response)=>{
                    context.commit('categories',response.data.categories)
                })
        },
        allPagination(context,page = 1){
            axios.get('/pagination?page='+page).then((response)=>{
                context.commit('paginations',response.data.paginations)
                })
        },
        allPost(context){
            axios.get('/post')
                .then((response)=>{
                    // console.log(response.data)
                    context.commit('allpost',response.data.posts)
                })
        }

    },
    mutations:{
        categories(state,data){
            return state.category = data
        },
        paginations(state,data){
            return state.pagination = data
        },
        allpost(state,payload){
            return state.post = payload
        },


    }
}