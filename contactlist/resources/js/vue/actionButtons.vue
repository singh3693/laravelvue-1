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
                name: this.contactData,
                email: "vioqwe@qiower.io",
                address: "niqwer qowerqowr"
            }
       }
    },
    methods: {
        addContact() {
            if (this.contact.name =='') {
                return;
            }

            axios.post('api/contact/create', {
                contact_entry23: this.contact
            }).then(res=> {
                if (res.status==201) {
                    this.contact.name == "";
                }
            })
            .catch( error => {
                console.log( error );
            })
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