<template>
    <div>
        <h3 class="text-center">Add Product</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addProduct">
                    <div class="form-group">
                        <label>Product</label>
                        <input type="text" class="form-control" v-model="post.p_name">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control" v-model="post.p_desc">
                    </div><div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" v-model="post.p_price">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</template>
 
<script>
    export default {
        data() {
            return {
                post: {}
            }
        },
        methods: {
            addProduct() {
 
                this.axios
                    .post('/api/addProduct', this.post)
                    .then(response => (
                        this.$router.push({name: 'home'})
                        // console.log(response.data)
                    ))
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
            }
        }
    }
</script>