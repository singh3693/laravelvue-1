<template>
    <!-- <font-awesome-icon
        icon="plus-square"
        @click="addContact()"
        :class="[ contact.name ? 'active' : 'inactive', 'plus']"
    /> -->
    <div style='border: 2px solid green'>{{contactData}}</div>
</template>

<script>
export default {
    props: {
        contactData: String
    },
    
    data: function() {
       return {
            contact: {
                name: this.contactData
            }
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