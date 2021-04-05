<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-default">Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit Product</div>
            <div class="panel-body">
               <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="editProduct">
                    <div class="form-group">
                        <label>Product</label>
                        <input type="text" class="form-control" v-model="product.p_name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="product.p_desc">
                    </div><div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" v-model="product.p_price">
                    </div>
                    <button type="submit" class="btn btn-primary">Update </button>
                </form>
            </div>
        </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.productId = id;
            axios.get('/api/editProduct/' + id)
                .then(function (resp) {
                    app.product = resp.data;
                })
                .catch(function () {
                    alert("Could not load your Product1")
                });
        },
        data: function () {
            return {
                productId: null,
                product: {
                    p_name: '',
                    p_name: '',
                    p_desc: '',
                    p_price: '',
                }
            }
        },
        methods: {
            editProduct() {
                var app = this;
                var newProduct = app.product;
                axios.patch('/api/updateProduct/' + app.productId, newProduct)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your Product1");
                    });
            }
        }
    }
</script>