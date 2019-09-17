<template>
    <form method="POST" @submit.prevent="send">
        <transition name="fade">
            <div class="alert alert-success" v-show="successMessage">{{successMessage}}</div>
        </transition>
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" class="form-control" :class="errors.name ? 'is-invalid' : ''" id="name"
                   v-model="feedback.name" @keydown="delete errors.name">
            <div v-if="errors.name" class="invalid-feedback">{{errors.name[0]}}</div>
        </div>
        <div class="form-group">
            <label for="phone">Телефон</label>
            <input type="text" class="form-control" :class="errors.phone ? 'is-invalid' : ''" id="phone"
                   v-model="feedback.phone" @keydown="delete errors.phone">
            <div v-if="errors.phone" class="invalid-feedback">{{errors.phone[0]}}</div>
        </div>
        <div class="form-group">
            <label for="message">Сообщение</label>
            <textarea class="form-control" :class="errors.message ? 'is-invalid' : ''" id="message" rows="3"
                      v-model="feedback.message" @keydown="delete errors.message"></textarea>
            <div v-if="errors.message" class="invalid-feedback">{{errors.message[0]}}</div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
</template>

<script>
    export default {
        data() {
            return {
                feedback: {
                    name: '',
                    phone: '',
                    message: '',
                },
                errors: {},
                successMessage: ''
            };
        },
        methods: {
            send() {
                axios.post('/', this.feedback)
                    .then(response => {
                        this.successMessage = response.data.message;
                        setTimeout(() => {
                            this.successMessage = '';
                        }, 3000);
                        this.feedback.name = '';
                        this.feedback.phone = '';
                        this.feedback.message = '';
                    })
                    .catch(error => {
                        if (error.response.status == 422) {
                            this.errors = error.response.data.errors;
                        }
                    });
            }
        }
    }
</script>