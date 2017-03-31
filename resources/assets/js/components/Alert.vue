<template>
    <div class="alert" :class="alertClass" v-show="showMessage" @click="dismissMessage">
        <slot></slot>
    </div>
</template>

<script>
    export default {
        props: [
            'status'
        ],
        data() {
            return {
                showMessage: true,
                alertStatus: this.status,
                alertClass: ''
            }
        },
        methods: {
            dismissMessage() {
                this.showMessage = false;
            }
        },
        created() {
            let self = this;
            setTimeout( function () {
                self.showMessage = false;
            }, 4000);
            if (this.alertStatus) {
                this.alertClass = 'alert-' + this.alertStatus;
            }
        }

    }
</script>