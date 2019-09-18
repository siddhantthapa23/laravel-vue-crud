<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <router-link :to="{name: 'createClub'}" class="btn btn-success">Create new club</router-link>
                </div>
                <h3 class="panel-title-style"><b>Clubs</b></h3>
            </div>

            <div class="panel-body table-responsive">
                <div class="panel panel-default">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Website</th>
                                <th>Email</th>
                                <th width="100">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(club, index) in clubs" :key="club.id">
                                <td>{{ club.name }}</td>
                                <td>{{ club.address }}</td>
                                <td>{{ club.website }}</td>
                                <td>{{ club.email }}</td>
                                <td>
                                    <router-link :to="{name: 'editClub', params: {id: club.id}}" class="btn btn-xs btn-default">
                                        Edit
                                    </router-link>
                                    <a href="#"
                                    class="btn btn-xs btn-danger"
                                    v-on:click="deleteEntry(club.id, index)">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                clubs: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/clubs')
                .then(function (resp) {
                    app.clubs = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load clubs");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/clubs/' + id)
                        .then(function (resp) {
                            app.clubs.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete club");
                        });
                }
            }
        }
    }
</script>