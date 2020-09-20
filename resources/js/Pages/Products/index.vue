<template>
    <div class="col-md-6">
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
</template>

<script>
    export default {
        props: ['products'],
    }
</script>