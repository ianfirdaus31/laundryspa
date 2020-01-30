<template>
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <h3 class="panel-title">Add New Expenses</h3>
            </div>
            <div class="panel-body">
                <!-- TAMBAHKAN REF PADA CUSTOM TAG INI -->
                <expenses-form ref="formExpense"></expenses-form>

                <div class="form-group">
                    <button class="btn btn-primary btn-sm btn-flat" @click.prevent="submit">
                        <i class="fa fa-save"></i> Add New
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import FormExpenses from './Form'
	export default {
		name: "AddExpenses",

        components: {
		    'expenses-form': FormExpenses
        },

        methods: {
		    submit() {
		        this.$refs.formExpense.submit()
            }
        }
	}
</script>

<style scoped>

</style>
