<script setup>
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCirclePlus, faXmark } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

library.add(
    faCirclePlus,
    faXmark
);
</script>

<template>
<div>
    <FontAwesomeIcon @click="toggleModal()" icon="circle-plus" class="w-8 h-8 text-blue-600 hover:text-sky-500" />
    <div v-if="show" id="roomModal" class="modal">
        <div class="modal-container">
            <div class="modal-content">
                <div class="close-btn-container">
                    <FontAwesomeIcon icon="xmark" @click="toggleModal()" class="w-8 h-8 text-gray-500 hover:text-gray-300 text-right" />
                </div>
                <h1>Create New Room</h1>
                <div>
                    <div class="mb-6">
                        <label for="room-name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            Room name
                        </label>
                        <input name="room-name" v-model="name" type="text" placeholder="Room name" required>
                    </div>
                    <button @click="createRoom()" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 submit-button">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
export default {
    data: function() {
        return {
            show: false,
            name: ''
        }
    },
    methods: {
        toggleModal() {
            this.show = !this.show;
        },
        createRoom() {
            axios.post('/canvas/room', {
                name: this.name
            }).then(response => {
                this.$emit('roomChange', response.data);
                this.name = '';
                this.toggleModal();
            }).catch(error => {
                console.log(error);
            })
        }
    }
}
</script>

<style scoped>
.modal {
    z-index: 999;
    position: fixed;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    background-color: rgba(108, 122, 137, 0.4);
}
.modal-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100%;
}
.modal-content {
    padding: 2rem 3.5rem;
    background-color: #fff;
    border-radius: 2rem;
}
.close-btn-container {
    text-align: end;
}
.submit-button {
    display: inline-block;
}
</style>
