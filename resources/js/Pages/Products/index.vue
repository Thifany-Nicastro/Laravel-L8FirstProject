<template>
    <app-layout>
        <div class="container py-5">
            <div class="card">
                <div class="card-header">
                    <h2>Manage Products</h2>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <a href="#" class="btn btn-primary" @click="create()">
                                <i class="fas fa-plus-circle"></i> Add New
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tr v-for="product in products">
                            <td>{{ product.name }}</td>
                            <td>{{ product.category }}</td>
                            <td>{{ product.value }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary" @click.prevent="edit(product)">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-outline-danger" @click.prevent="destroy(product)">
                                    <i class="fas fa-times"></i>
                                </a>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="modal fade" id="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Product Name</label>
                            <input type="text" class="form-control" id="name" v-model="product.name">
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input type="text" class="form-control" id="category" v-model="product.category">
                        </div>
                        <div class="form-group">
                            <label>Price ($)</label>
                            <input type="text" class="form-control" id="value" v-model="product.value">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" @click="closeModal()">Close</button>
                        <button type="button" class="btn btn-primary" v-show="!isEdit" @click.prevent="store()">Save</button>
                        <button type="button" class="btn btn-primary" v-show="isEdit" @click.prevent="update()">Update</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
    import AppLayout from './../../Layouts/AppLayout'
    
    export default {
        components: {
            AppLayout,
        },

        props: ['products'],

        data() {
            return {
                isEdit: false,
                product: {
                    name: '',
                    category: '',
                    price: ''
                }
            }
        },

        methods: {
            openModal () {
                $('#modal').modal('show');
            },

            closeModal () {
                $('#modal').modal('hide');
            },

            reset () {
                this.product = {
                    name: '',
                    category: '',
                    price: ''
                }
            },

            create () {
                this.isEdit = false;
                this.reset();
                this.openModal();
            },

            store () {
                this.$inertia.post('products', this.product);
                this.reset();
                this.closeModal();
            },

            edit (product) {
                this.product = Object.assign({}, product);
                this.isEdit = true;
                this.openModal();
            },

            update () {
                this.$inertia.put('products/' + this.product.id, this.product);
                this.closeModal();
            },

            destroy (product) {
                this.$inertia.delete('products/' + product.id, product);
            },
        }
    }
</script>