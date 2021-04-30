<template>
    <div class='appBody'>
        <table class='listContactTable'>
            <thead>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Created</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr v-for='contact in contacts' :key='contact.id'>
                    <td>{{contact.name}}</td>
                    <td>{{contact.email}}</td>
                    <td>{{contact.address}}</td>
                    <td>{{contact.created}}</td>
                    <td>
                        <font-awesome-icon
                            icon="ellipsis-v"
                            @click="toggleMenu()"
                        />
                        <actionButtons
                            :contactData='contact.name'
                            :menuClicked='menuClicked'
                            :id='contact.id'
                        />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import actionButtons from './actionButtons'

export default {
    data: function() {
        return {
            contacts: [],          
            menuClicked: false
        }
    },
    components: {
        actionButtons
    },
    created() {
        axios.get('api/contacts')
        .then(
            res => {
                this.contacts = res.data;
                if (res.status=='200') {
                    return 'Fetch success'
                }
            }
        ).catch(
            err=>{
                return err;
            }
        )
    },
    methods: {
        toggleMenu() {
            this.menuClicked = !this.menuClicked; // ? false : true;
        }
    }
}
</script>


<style scoped>
    .appBody {
        display: flex;
        justify-content: flex-start;
        align-items: flex-start;
    }
    input {
        background: #fcf9f9;
        border: 0;
        outline: none;
        padding: 0.5em;
        margin-right: 1em;
    }
    .listContactTable {
        width: 100%;
        text-align: left;
        background: #fff;
    }
    thead {
        background: #8d8888;
        color: #fff;
    }
    tr:nth-child(even) {
        background: #b3b3b3;
        color: #fff;
    }
</style>