<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <router-link to="/" class="btn btn-default">Back</router-link>
                </div>
                <h4 class="panel-title-style"><b>Edit club</b></h4>
            </div>
            <div class="panel-body">
                <form v-on:submit.prevent="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Club name</label>
                            <input type="text" v-model="club.name" placeholder="Enter club name." class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Club address</label>
                            <input type="text" v-model="club.address" placeholder="Enter club address." class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Club website</label>
                            <input type="text" v-model="club.website" placeholder="Enter club website." class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Club email</label>
                            <input type="text" v-model="club.email" placeholder="Enter club email." class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.clubId = id;
            axios.get('/api/clubs/' + id)
                .then(function (resp) {
                    app.club = resp.data;
                })
                .catch(function () {
                    alert("Could not load your club")
                });
        },
        data: function () {
            return {
                clubId: null,
                club: {
                    name: '',
                    address: '',
                    website: '',
                    email: '',
                }
            }
        },
        methods: {
            saveForm() {
                var app = this;
                var newClub = app.club;
                axios.patch('/api/clubs/' + app.clubId, newClub)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your club");
                    });
            }
        }
    }
</script>