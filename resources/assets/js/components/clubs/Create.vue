<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="pull-right">
                    <router-link to="/admin/clubs" class="btn btn-default">Back</router-link>
                </div>
                <h4 class="panel-title-style"><b>Create new club</b></h4>
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
                            <button class="btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
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
                axios.post('/api/clubs', newClub)
                    .then(function (resp) {
                        app.$router.push({path: '/admin/clubs'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your club");
                    });
            }
        }
    }
</script>