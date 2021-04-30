<template>
    <div class='addButtonContainer'>
        <span>Add</span>
        <font-awesome-icon
            icon="plus-square"
            :class="[ contactEntry23.name ? 'active' : 'inactive', 'plus']"
        />
    </div>
</template>

<script>
    export default {
        data: function() {
            return {
                contactEntry23: {
                    name: 'ln 15',
                    email: 'qwerjkl@jofasldkf.io',
                    address: 'qweoirql qwelrkjqwer uqeowiruqewoir'
                }
            }
        },
        methods: {
            addContact() {
                // axio.post('api.contact', {contactEntry23}).then(res=> {
                //     if (res.status === '201')
                //         return 'Item added'
                // })
            }
        }
    }
</script>

<style scoped>
    .addButtonContainer {
        color: blue;
        border: 1px solid pink;
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
    
    ul {
        margin-top: 0;
        padding-left: 0.2em;
    }
    
    li {
        list-style: none;
        border: 1px solid #000;
        padding: 3px;
    }
    .actionButtonContainer {
        margin-left: 1em;
        padding: 3px 3px 3px 0;
    }
</style>