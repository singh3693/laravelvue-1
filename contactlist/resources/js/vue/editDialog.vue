<template>
    <div class="editDialogContainer">
        <h3>Edit Dialog</h3>
        <div class="body">
            <div class="left">
                <ul>
                    <li>
                        <span>Name:</span>
                        <input type="text" v-model='contactdata.name' />
                    </li>
                    <li>
                        <span>Email:</span>
                        <input type="text" v-model='contactdata.email' />
                    </li>
                    <li>
                        <span>Address:</span>
                        <input type="text" v-model='contactdata.address' />
                    </li>
                </ul>
            </div>
            <div class="right">
                <img src="http://via.placeholder.com/150" alt="">
            </div>
        </div>
        <div class="buttons">
            <div class="close" @click='close()'><span>Close</span></div>
            <div class="save" @click='EditContact()'>
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
        data: function() {
            return {
                contact: {
                    name: '',
                    email: '',
                    address: ''
                }
            }
        },
        props: {
            contactdata: {
                type: Object
            },
            contactid: {
                type: Number
            }
        },
        methods: {
            close() {
                this.$emit('close')
            },
            EditContact: function() {
                axios.put(`api/contact/${this.contactid}`, {
                    contact: this.contactdata
                }).then(
                    res => {
                        if (res.status==200) {
                            this.$emit('contactSuccessfullyUpdated');
                        }
                    }
                ).catch(
                    err => {
                        console.log(`Error with update: ${err}`)
                    }
                )
            }
        }
        
    }
</script>

<style scoped>
    .editDialogContainer {
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
    
    
    .editDialogContainer .body {
        width: 100%;
        display: flex;
        flex-flow: row nowrap;
        padding: 2em;
    }
    .editDialogContainer .body ul li{
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
    .editDialogContainer .body .left {
        width: 70%;
    }
    .editDialogContainer .body .right {
        display: flex;
        justify-content: space-around;
        width: 30%;
    }

    .editDialogContainer .buttons {
        width: 100%;
        display: flex;
        flex-flow: row nowrap;
        padding: 1em;
        justify-content: flex-end;
        align-items: center;
    }
    .editDialogContainer .buttons div{
        margin: 0 1.5em;
        text-align: center;
        padding: 0.7em 1em;
        width: 10em;
    }
    div .close {
        background: rgb(91, 91, 97);
        color: #fff;
    }
    div.save {
        color: #fff;
        background: blue;
    }
</style>
