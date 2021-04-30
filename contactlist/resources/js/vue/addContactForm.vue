<template>
    <div class='addContact'>
        <input type="text" v-model='contact.name' />
        <actionButtons :contactData='contact.name'/>
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
    components: {
        actionButtons
    }
}
</script>

<style scoped>
    .addContact {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    input {
        background: #e3e3e3;
        border: 0;
        outline: none;
        padding: 0.5em;
        margin-right: 1em;
    }

</style>