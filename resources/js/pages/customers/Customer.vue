<template>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <router-link :to="{ name: 'customers.add' }" class="btn btn-primary btn-sm btn-flat">Tambah</router-link>
                <div class="pull-right">
                    <input type="text" class="form-control" placeholder="Cari..." v-model="search">
                </div>
            </div>
            <div class="panel-body">

                <!-- TABLE UNTUK MENAMPILKAN LIST CUSTOMER -->
                <b-table striped hover bordered :items="customers.data" :fields="fields" show-empty>
                    <template slot="deposit" slot-scope="row">
                        Rp {{ row.item.deposit }}
                    </template>

                    <!-- NAMA KURIR AKAN DITAMPILKAN JIKA ADA -->
                    <template slot="courier_id" slot-scope="row">
                        {{ row.item.courier ? row.item.courier.name:'-' }}
                    </template>
                    <template slot="actions" slot-scope="row">
                        <router-link :to="{ name: 'customers.edit', params: {id: row.item.id} }" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></router-link>
                        <button class="btn btn-danger btn-sm" @click="deleteCustomer(row.item.id)"><i class="fa fa-trash"></i></button>
                    </template>
                </b-table>
                <!-- TABLE UNTUK MENAMPILKAN LIST CUSTOMER -->

                <div class="row">
                    <div class="col-md-6">
                        <p v-if="customers.data"><i class="fa fa-bars"></i> {{ customers.data.length }} item dari {{ customers.meta.total }} total data</p>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <b-pagination
                                v-model="page"
                                :total-rows="customers.meta.total"
                                :per-page="customers.meta.per_page"
                                aria-controls="customers"
                                v-if="customers.data && customers.data.length > 0"
                            ></b-pagination>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapActions, mapState } from 'vuex'

	export default {
		name: "DataCustomer",

        created() {
		    this.getCustomers()
        },

        data() {
		    return {
		        fields: [
                    { key: 'nik', label: 'NIK' }
                ]
            }
        }
    }
</script>

<style scoped>

</style>
