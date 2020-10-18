<template>
    <div class="modal fade" id="modal_detail" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail User</h5>
                    <button type="button" class="close" @click.prevent="resetUser" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body c-overflow">
                    <table class="table table-responsive table-borderless">
                        <tbody>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td>{{row.name}}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td>{{row.email}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="c-height">
                        <h5 class="text-center mb-2">Comment List</h5>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">Post ID</th>
                                    <th>Comment</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="item in row.comments" :key="item.id">
                                    <td class="text-center">{{item.post_id}}</td>
                                    <td>{{item.comment}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button @click.prevent="resetUser" type="button" class="btn btn-secondary">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    export default {
        props: {
            hideDetailModal: {
                type: Function,
                default: () => ({}),
            },
            row: {
                type: Object,
                default: () => ({}),
            }
        },

        components: {

        },

        data() {
            return {
            }
        },

        mounted() {
        },

        methods: {
            resetUser() {
                this.hideDetailModal()
                $('#modal_detail').modal('hide')
            }
        }
    }
</script>


<style lang="scss" scoped>
    .c-overflow {
        overflow: auto;
    }

    .c-height {
        max-height: 100px;
    }
</style>
