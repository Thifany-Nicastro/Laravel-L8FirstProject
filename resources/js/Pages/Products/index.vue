<template>
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h2>Manage Products</h2>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <a href="#" class="btn btn-primary" @click="openModal()">
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
                        </tr>
                    </thead>
                    <tr v-for="product in products">
                        <td>{{ product.name }}</td>
                        <td>{{ product.category }}</td>
                        <td>{{ product.value }}</td>
                    </tr>
                </table>
            </div>
        </div>

        <!-- Modal -->
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
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['products'],

        data() {
            return {
                product: {
                    name: '',
                    category: '',
                    price: ''
                }
            }
        },

        methods: {
            openModal () {
                $('#modal').modal('show')
            },

            closeModal () {
                $('#modal').modal('hide')
            },

            reset () {
                this.product = {
                    name: '',
                    category: '',
                    price: ''
                }
            },
        }
    }
</script>