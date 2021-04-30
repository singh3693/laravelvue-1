<template>
    <div class='addContact'>
        <input type="text" v-model='contact.name' />
        <font-awesome-icon
            icon="ellipsis-v"
            @click="toggleMenu()"
            :class="[ contact.name ? 'active' : 'inactive', 'plus']"
        />
        <actionButtons
            :contactData='contact.name'
            :menuClicked='menuClicked'
        />
    </div>
</template>

<script>
import actionButtons from './actionButtons'

export default {
    data: function() {
        return {
            contact: {
                name: "",
                email: "vioqwe@qiower.io",
                address: "niqwer qowerqowr"
            },
            menuClicked: false
        }
    },
    components: {
        actionButtons
    },
    methods: {
        toggleMenu() {
            this.menuClicked = !this.menuClicked; // ? false : true;
        }
    }
}
</script>


<style scoped>
    .addContact {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }
    input {
        background: #e3e3e3;
        border: 0;
        outline: none;
        padding: 0.5em;
        margin-right: 1em;
    }
</style>