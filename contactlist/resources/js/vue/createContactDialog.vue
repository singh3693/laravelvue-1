<template>
    <div class="createContactDialogue">
        <h3>Create contact</h3>
        <div class="body">
            <div class="left">
                <ul>
                    <li>
                        <span>Name:</span>
                        <input type="text" v-model='contact.name' />
                    </li>
                    <li>
                        <span>Email:</span>
                        <input type="text" v-model='contact.email' />
                    </li>
                    <li>
                        <span>Address:</span>
                        <input type="text" v-model='contact.address' />
                    </li>
                </ul>
            </div>
            <div class="right">
                <img src="http://via.placeholder.com/150" alt="">
            </div>
        </div>
        <div class="buttons">
            <div class="close" @click='close()'><span>Close</span></div>
            <div class="save" @click='addContact()'>
                <font-awesome-icon
                    icon="check-circle"
                />
                Save Changes
            </div>
        </div>
    </div>
</template>

<script>

export default {
    methods: {
        addContact: function () {
            axios.post('api/contact/create', {
                contact: this.contact
            })
            .then(
                res=> {
                    if (res.status == '201') {
                        this.$emit('contactSuccessfullyAdded')
                    }
                }
            )
            .catch(
                err => {
                    console.log(`Error: ${err}`)
                }
            )
        },
        close: function() {
            this.$emit('closeAddDialog')
        }
    },
    data: function () {
        return {
            contact: {}
        }
    }
}
</script>

<style scoped>
    .createContactDialogue {
        position: absolute;
        border: 3px solid #000;
        border-radius: 15px;
        display: flex;
        flex-flow: column nowrap;
        background: #fff;
        align-items: flex-start;
        top: 12em;
        left: 23em;
        padding: 8em;
        width: 50em;
    }
    .createContactDialogue .body {
        width: 100%;
        display: flex;
        flex-flow: row nowrap;
        padding: 2em;
    }
    .createContactDialogue .body ul li{
        list-style: none;
        display: flex;
        flex-flow: row nowrap;
        justify-content: flex-start;
    }
    ul li span {
        width: 25%;
        padding-top: 3px;
    }
    li input {
        width: 70%;
        margin: 0.1em 0;
    }
    .createContactDialogue .body .left {
        width: 70%;
    }
    .createContactDialogue .body .right {
        display: flex;
        justify-content: space-around;
        width: 30%;
    }
    
    .createContactDialogue .buttons {
        width: 100%;
        display: flex;
        flex-flow: row nowrap;
        padding: 1em;
        justify-content: flex-end;
        align-items: center;
    }
    .createContactDialogue .buttons div{
        margin: 0 1.5em;
        text-align: center;
        padding: 0.7em 1em;
        width: 10em;
    }
    div.close {
        background: rgb(91, 91, 97);
        color: #fff;
    }
    div.save {
        color: #fff;
        background: blue;
    }
</style>