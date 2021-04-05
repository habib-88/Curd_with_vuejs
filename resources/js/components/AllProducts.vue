<template>
    <div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Product</th>
                <th>Description</th>
                 <th>Price</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="product in products" :key="product.id">
                <td>{{ product.p_name }}</td>
                <td>{{ product.p_desc }}</td>
                 <td>{{ product.p_price }}</td>
                <td>{{ product.created_at }}</td>
                <td>{{ product.updated_at }}</td>
                <td>
            <div class="btn-group" role="group">
                <router-link :to="{name: 'edit', params: { id: product._id }}" class="btn btn-primary mr-2">Edit - {{  product.id }}
                </router-link>
                <button class="btn btn-danger" @click="deletePost(product._id)">Delete</button>
            </div>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                products: []
                }
            },
        mounted() {
            this.loodPost();
        },
        methods: {
            loodPost(){
                this.axios
                .get('/api/getProduct')
                .then(({data}) => {
                    console.log(data);
                    this.products = data.data;
                });
            },
            deletePost(id) {
                this.axios
                    .delete(`/api/deleteProduct/${id}`)
                    .then(response => {
                        this.loodPost();
                    });
            }
        }
    }
</script>