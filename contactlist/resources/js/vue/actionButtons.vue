<template>
    <font-awesome-icon
        icon="plus-square"
        @click="addContact()"
        :class="[ contact.name ? 'active' : 'inactive', 'plus']"
    />
</template>

<script>
export default {
    props: {
        contactData: {
            type: String,
            required: false
        }
    },
    
    data: function() {
       return {
            contact: {
                name: this.contactData
            }
       }
    },
    watch: {
        contactData: function() {
            this.contact.name = this.contactData;
        }
    }
}
</script>
<style scoped>
    .plus {
        font-size: 20px;
    }

    .active {
        color: green;
    }

    .inactive {
        color: grey;
    }
</style>