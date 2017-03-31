<template>
    <div>

        <div class="btn btn-primary mb-2" @click="toggleEditMode">Edit</div>
        <div class="btn btn-primary mb-2" v-if="editing" @click="markAllAsRead">Mark As Read</div>
        {{ selectedMessages }}
        <div class="row messages">

            <div class="col-sm-6" style="height: 80vh; overflow-y: scroll">

                <div v-for="message in messages" class="card mb-4"  @click="toggleRead(message)" v-if="false">
                    <div class="card-header">From: <strong>{{ message.from }}</strong> | {{ message.sent }}</div>
                    <transition name="slide-fade">
                        <div class="card-block"  v-show="! message.read">
                            <div class="mb-4 font-weight-bold">{{ message.subject }}</div>
                            <div v-html="message.body"></div>
                        </div>
                    </transition>
                </div>

                <div v-for="message in messages" class="card mb-4 p-2" @click="selectMessage(message)" style="width: 100%;" :class="{ 'bg-info' : message.id == selectedMessage.id }">
                    <div class="row">
                        <div class="col-1" style="position: relative;">
                            <span v-if="message.read == 0" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%) translateX(-50%)" class="text-primary">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="col-10">{{ message.from }} <br>
                            {{ message.subject }}</div>
                        <div class="col-1" @click="pushMultiSelect(message)">
                            <span v-if="editing">Select</span>
                        </div>
                    </div>


                </div>

            </div>
            <div class="col-sm-6">
                {{ selectedMessage }}
        </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages: [],
                selectedMessage: {},
                editing: false,
                selectedMessages: []
            }
        },
        methods: {
            toggleRead(message) {

            },
            selectMessage(message) {
              this.selectedMessage = message;
//              if (message.read === 0) {
//                  message.read = 1;
//                  axios.post('http://team-management.dev/messages/' + message.id +'/mark-as-read');
//              }
            },
            toggleEditMode() {
                if (this.editing == false) {
                    this.editing = true;
                }
                else {
                    this.editing = false;
                }
            },
            pushMultiSelect(message) {
                if (! this.selectedMessages.includes(message)) {
                    this.selectedMessages.push(message);
                }
            },
            markAllAsRead() {
                for (let i = 0; i < this.selectedMessages.length; i++) {
                    this.selectedMessages[i].read = 1;
                    axios.post('http://team-management.dev/messages/' + this.selectedMessages[i].id +'/mark-as-read');
                }
            }
        },
        mounted() {
            let messagePromise = axios.get('http://team-management.dev/api/v1/messages');
            messagePromise.then(response => this.messages = response.data);
            messagePromise.then(response => this.selectedMessage = response.data[0]);
        },



    }
</script>

<style>
    .messages .bg-info {
        color: #fff;
    }
</style>