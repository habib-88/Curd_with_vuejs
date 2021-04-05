 
import AddItemForm from './components/AddItemForm.vue';
import AllProducts from './components/AllProducts.vue';
import EditComponent from './components/EditComponent';
 
export const routes = [
    {
        name: 'home',
        path: '/',
        component: AllProducts
    },
    {
        name: 'add',
        path: '/add',
        component: AddItemForm
    },
    {
        name:'edit',
        path:'/edit/:id',
        component:EditComponent
    },
    
     
];