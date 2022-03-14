
<template>
    <admin-layout>
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <h4 class="page-title">Utilisateur</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-lg-11">
                    <table class="table table-striped table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Pseudo</th>
                                <th>Email</th>
                                <th>Rôle</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users">
                                <td class="table-user">
                                    {{ user.pseudo }}
                                </td>
                                <td>{{ user.email }}</td>
                                <td>{{user.role.name }}</td>
                                <td class="table-action">
                                    <a href="javascript: void(0);" class="action-icon" @click="editModal(user)"> <i class="mdi mdi-pencil"></i></a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div> <!-- end col-->
            
            </div>
            <!-- end row -->
        </div>
        <!-- container -->

        <!-- Large modal -->
        <div class="modal fade" id="modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myLargeModalLabel">Edition de l'utilisateur</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <form @submit.prevent="postEdit" id="editRoleForm">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="role" class="h4">Rôles</label>
                                <multiselect
                                    v-model="form.role"
                                    :options="roleOptions"
                                    :multiple="false"
                                    :taggable="false"
                                    placeholder="Choisi un rôle"
                                    @addRole="addRole"
                                    label="name"
                                    track-by="name"
                                ></multiselect>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-danger text-uppercase" style="letter-spacing: 0.1em;" @click="closeModal">Cancel</button>
                            <button type="submit" form="editRoleForm" class="btn btn-info text-uppercase" style="letter-spacing: 0.1em;">Edit</button>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </admin-layout>
</template>

<script>
    import AdminLayout from '../../Layouts/AdminLayout.vue'
    import axios from 'axios';
    import Multiselect from '@suadelabs/vue3-multiselect'


    export default {
        components: { AdminLayout, axios, Multiselect },
        props: ['roles', 'users'],

        data() {
            return {
                users: this.users,
                form: this.$inertia.form({
                    user: null,
                    role: null,
                }),
                roleOptions: this.roles,
            }
        },
        methods: {
            editModal(user) {
                $('#modal-lg').modal('show');
                this.form.user = user;
                this.form.role = user.role;
            },
            addRole(role) {
                this.form.role = role.role;
            },
            closeModal() {
                this.form.reset()
                $('#modal-lg').modal('hide')
            },
            postEdit() {
                axios.post(this.route('admin.dashboard.utilisateur.updateRole', this.form)).then(response => {
                    $('#modal-lg').modal('hide')
                    this.refreshUser();
                })
            },
            refreshUser() {
                axios.get(this.route('admin.dashboard.utilisateur.getUserWithRole')).then(response => {
                    this.users = response.data;
                })
            },
        }
    }
    
</script>

<style src="@suadelabs/vue3-multiselect/dist/vue3-multiselect.css"></style>

