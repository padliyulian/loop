<template>
    <div class="container">
        <div class="row py-4">
                    <div class="col-lg-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-6"><h5 class="mb-0">App</h5></div>
                                    <div class="col-6 text-right">Developer <a href="https://padliyulian.github.io" target="_blank" rel="noopener noreferrer">padliyulian@gmail.com</a></div>
                                </div>
                            </div>
                            <div class="card-body">

                                    <div class="row">
                                        <div class="form-group col-lg-4">
                                            <select @change="changeLength" v-model="length" class="custom-select">
                                                <option value="10">10</option>
                                                <option value="25">25</option>
                                                <option value="50">50</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-8">
                                            <input @keyup="searchUser" class="form-control" type="text" v-model="search" placeholder="Search by name or email ...">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <table class="table table-responsive-md table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th @click.prevent="sortBy('name')" style="cursor:pointer;" scope="col">
                                                            <i class="fas fa-sort"></i>
                                                            Nama
                                                        </th>
                                                        <th @click.prevent="sortBy('email')" style="cursor:pointer;" scope="col">
                                                            <i class="fas fa-sort"></i>
                                                            Email
                                                        </th>
                                                        <th @click.prevent="sortBy('created_at')" style="cursor:pointer;" scope="col">
                                                            <i class="fas fa-sort"></i>
                                                            Created
                                                        </th>
                                                        <th scope="col" style="min-width:100px;">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="item in data.data" :key="item.id">
                                                        <td>{{item.name}}</td>
                                                        <td>{{item.email}}</td>
                                                        <td>{{$moment(item.cretaed_at).format('D/MM/YYYY')}}</td>
                                                        <td>
                                                            <a @click.prevent="showDetailModal(item)" href="#" title="Detail" data-target="#modal_detail" data-toggle="modal">
                                                                <span class="text-success">
                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                            <a @click.prevent="deleteRow(item.id)" href="#" title="Hapus">
                                                                <span class="text-danger">
                                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                                </span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12 d-flex flex-row justify-content-between">
                                            <div>
                                                <span class="text-secondary">
                                                    Showing {{data.from}} to {{data.to}} of {{ data.total }} Entries
                                                </span>
                                            </div>
                                            <div>
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination">
                                                        <li class="page-item" :class="{disabled: data.current_page === 1}">
                                                            <a @click.prevent="firstPage" class="page-link" href="#" aria-label="First" :aria-disabled="data.current_page === 1">
                                                                <span aria-hidden="true">&laquo;</span>
                                                            </a>
                                                        </li>

                                                        <li class="page-item" :class="{disabled: data.prev_page_url === null}">
                                                            <a @click.prevent="prevPage" class="page-link" href="#" aria-label="Previous" :aria-disabled="data.prev_page_url === null">
                                                                <span aria-hidden="true">Prev</span>
                                                            </a>
                                                        </li>
                                                        <li class="page-item" :class="{disabled: data.next_page_url === null}">
                                                            <a @click.prevent="nextPage" class="page-link" href="#" aria-label="Next" :aria-disabled="data.next_page_url === null">
                                                                <span aria-hidden="true">Next</span>
                                                            </a>
                                                        </li>


                                                        <li class="page-item" :class="{disabled: data.current_page === data.last_page}">
                                                            <a @click.prevent="lastPage" class="page-link" href="#" aria-label="Last" :aria-disabled="data.current_page === data.last_page">
                                                                <span aria-hidden="true">&raquo;</span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </nav>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                        </div>
                    </div>

            <detail-modal v-if="detailMode" :row="selectedRow" :hideDetailModal="hideDetailModal"/>
        </div>
    </div>
</template>


<script>
    import { DetailModal } from '../components'
    export default {
        name: 'User',

        components: {
            DetailModal
        },

        data() {
            return {
                length: 10,
                column: 'id',
                dir: 'desc',
                search: '',
                data: {},

                detailMode: false,
                selectedRow: {},
            }
        },

        created() {
            this.getUser(`api/v1/user?page=1&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
        },

        mounted() {
        },

        methods: {
            getUser(url) {
                axios.get(url)
                    .then(res => this.data = res.data)
                    .catch(err => console.log(err))
            },

            deleteRow(id) {
                swalWithBootstrapButtons.fire({
                    title: 'Sure delete it?',
                    text: "You can't revert it!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes!',
                    cancelButtonText: 'No!',
                    reverseButtons: true
                }).then((result) => {
                    if (result.value) {
                        axios.delete(`api/v1/user/${id}`)
                            .then(res => {
                                this.getData()
                            })
                            .catch(err => console.log(err))

                        swalWithBootstrapButtons.fire(
                            'Deleted!',
                            'Data has deleted.',
                            'success'
                        )
                    } else if (
                        result.dismiss === Swal.DismissReason.cancel
                    ) {
                        swalWithBootstrapButtons.fire(
                            'Reset',
                            'Cancel deleted',
                            'error'
                        )
                    }
                })
            },

            showDetailModal(row) {
                this.detailMode = true
                this.selectedRow = row
            },

            hideDetailModal() {
                this.detailMode = false,
                this.selectedRow = {}
            },

            getData() {
                this.getUser(`api/v1/user?page=1&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            searchUser() {
                this.getUser(`api/v1/user?page=1&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            changeLength() {
                this.getUser(`api/v1/user?page=1&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            firstPage() {
                this.getUser(`api/v1/user?page=1&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            lastPage() {
                this.getUser(`api/v1/user?page=${this.data.last_page}&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            prevPage() {
                this.getUser(`${this.data.prev_page_url}&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            nextPage() {
                this.getUser(`${this.data.next_page_url}&length=${this.length}&column=${this.column}&dir=${this.dir}&search=${this.search}`)
            },

            sortBy(key) {
                if (this.dir == 'desc') {
                    this.dir = 'asc'
                } else {
                    this.dir = 'desc'
                }

                this.getUser(`${this.data.first_page_url}&length=${this.length}&column=${key}&dir=${this.dir}&search=${this.search}`)
            }
        }
    }
</script>


<style lang="scss" scoped>
</style>
