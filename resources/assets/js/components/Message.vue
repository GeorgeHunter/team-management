<template>
    <div>

        <div class="btn btn-primary mb-2" @click="toggleEditMode">Edit</div>
        <div class="btn btn-info mb-2" @click="setViewMode('sent')" v-if="viewMode == 'inbox'">View Sent</div>
        <div class="btn btn-info mb-2" @click="setViewMode('inbox')" v-if="viewMode == 'sent'">View Inbox</div>
        <div class="btn btn-primary mb-2" v-if="editing" @click="markAllAsRead">Mark As Read</div>
        <div class="btn btn-warning mb-2" v-if="editing" @click="markAllAsUnread">Mark As Unread</div>
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

                <div v-if="viewMode == 'inbox'" v-for="message in messages" class="card mb-4 p-2" style="width: 100%;" :class="[{ 'bg-info' : selectedMessages.includes(message) },  {'bg-info' : message.id == selectedMessage.id }]">
                    <div class="row">
                        <div class="col-1" style="position: relative;" @click="selectMessage(message)">
                            <span v-if="message.read == 0" style="position: absolute; top: 50%; right: 0; transform: translateY(-50%) translateX(-50%)" class="text-primary">
                                <i class="fa fa-circle" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="col-9" @click="selectMessage(message)">
                            <div>{{ message.from }}</div>
                            {{ message.subject }}
                        </div>
                        <div class="col-2" @click="pushMultiSelect(message)" style="display: flex;">
                            <span v-if="editing" style="margin: auto; margin-right: 6px;">
                                <i v-if="selectedMessages.includes(message)" class="fa fa-check-circle-o fa-2x" ></i>
                                <i v-if="!selectedMessages.includes(message)" class="fa fa-circle-o fa-2x" style="margin: auto; display: inline-block;"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div v-if="viewMode == 'sent'" v-for="message in sentMessages" class="card mb-4 p-2" @click="selectSent(message)" :class="{ 'bg-info' : selectedSent == message }">
                    <div class="row">
                        <div class="col-1"></div>
                        <div class="col-11">
                            <div>{{ message.to }}</div>
                            {{ message.subject }}
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-sm-6">
                <div v-if="viewMode == 'inbox'">
                    <div v-if="selectedMessage">
                        <div class="mb-4 font-weight-bold">{{ selectedMessage.from }}</div>
                        <div v-html="selectedMessage.body"></div>
                    </div>
                    <div v-if="selectedMessages.length > 0" v-for="selectedMessageItem in selectedMessages">
                        {{ selectedMessageItem.from }}
                    </div>
                </div>
                <div v-if="viewMode == 'sent'">
                    <div class="mb-4 font-weight-bold">{{ selectedSent.from }}</div>
                    <div v-html="selectedSent.body"></div>
                </div>
        </div>

        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                messages: [],
                selectedMessage: null,
                editing: false,
                selectedMessages: [],
                viewMode: 'inbox',
                sentMessages: [],
                selectedSent: null,
            }
        },
        methods: {
            toggleRead(message) {

            },
            selectMessage(message) {
                this.selectedMessages = [];
                this.selectedMessage = message;
                if (message.read === 0) {
                      message.read = 1;
                      axios.post('http://team-management.dev/messages/' + message.id +'/mark-as-read');
                  }
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
                    this.selectedMessage = {};
                    this.selectedMessages.push(message);
                }
            },
            markAllAsRead() {
                for (let i = 0; i < this.selectedMessages.length; i++) {
                    this.selectedMessages[i].read = 1;
                    axios.post('http://team-management.dev/messages/' + this.selectedMessages[i].id +'/mark-as-read');
                }
            },
            markAllAsUnread() {
                for (let i = 0; i < this.selectedMessages.length; i++) {
                    this.selectedMessages[i].read = 0;
                    axios.post('http://team-management.dev/messages/' + this.selectedMessages[i].id +'/mark-as-unread');
                }
            },
            setViewMode(mode) {
                this.viewMode = mode;
            },
            selectSent(message) {
                this.selectedSent = message;
            }
        },

//        computed() {
//          showSelectedMessagesArray : {}
//        },

        mounted() {
            let messagePromise = axios.get('http://team-management.dev/api/v1/messages');
            messagePromise.then(response => this.messages = response.data);
            messagePromise.then(response => this.selectedMessage = response.data[0]);
            messagePromise.then(response => response.data[0].read = 1);
            messagePromise.then(response => axios.post('http://team-management.dev/messages/' + response.data[0].id +'/mark-as-read'));

            let sentMessages = axios.get('http://team-management.dev/api/v1/sent-messages');
            sentMessages.then(response => this.sentMessages = response.data);
            sentMessages.then(response => this.selectedSent = response.data[0]);
        },



    }
</script>

<style>
    .messages .bg-info {
        color: #fff;
    }
</style>