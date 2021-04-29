<template>
    <div class='addContact'>
        <input type="text" v-model='contact.name' />
        <font-awesome-icon
            icon="plus-square"
            @click="addContact()"
            :class="[ contact.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
export default {
    data: function() {
        return {
            contact: {
                name: ""
            }
        }
    },
    methods: {
        addContact() {
            if (this.contact.name =='') {
                return;
            }

            axios.post('api/contact/create', {
                contact: this.contact
            }).then(res=> {
                if (res.status==201) {
                    this.contact.name == "";
                }
            })
            .catch( error => {
                console.log( error );
            })
        }
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