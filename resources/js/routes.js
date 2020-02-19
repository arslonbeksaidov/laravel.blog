import  AdminHome from './components/admin/AdminHome'
import  Ex from './components/ExampleComponent'
import  CategoryList from './components/admin/category/List'
import  AddCategory from './components/admin/category/New'

export const routes = [
    { path: '/home', component: require('./components/admin/AdminHome').default },
    { path: '/post', component:  require('./components/ExampleComponent').default },

    { path: '/category-list', component: require('./components/admin/category/List').default},
    { path: '/add-category', component: require('./components/admin/category/New').default },
    { path: '/edit-category/:categoryid', component: require('./components/admin/category/Edit').default },

    { path: '/post-list', component: require('./components/admin/post/List').default},
    { path: '/add-post', component: require('./components/admin/post/New').default },
    { path: '/edit-post/:postid', component: require('./components/admin/post/Edit').default },



]