<template>
    <div class='appBody'>
        <table class='listContactTable'>
            <thead>
                <th><input type="checkbox"></th>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Created</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr v-for='contact in contacts' :key='contact.id'>
                    <td><input type="checkbox"></td>
                    <td><img src="http://via.placeholder.com/50" alt=""></td>
                    <td>{{contact.name}}</td>
                    <td>{{contact.email}}</td>
                    <td>{{contact.address}}</td>
                    <td>{{contact.created_at}}</td>
                    <td>
                        <actionButtons
                            :id='contact.id'
                            @delete-succeeded='reloadTable'
                            @editButtonClicked='openEdit(contact.id)'
                        />
                        <editDialog 
                            v-if='openEditDialog'
                            :contactdata='contact'
                            :contactid='contact.id'
                            @close='closeEdit'
                            @contactSuccessfullyUpdated='closeEdit'
                        />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import actionButtons from './actionButtons'
import editDialog from './editDialog'

export default {
    data: function() {
        return {
            contacts: [],          
            openEditDialog: false,
        }
    },
    props: {
      shouldReloadContacts: {
        type: Boolean,
        default: false
      }  
    },
    
    components: {
        actionButtons, editDialog
    },
    created() {
        this.reloadTable();
    },
    methods: {
        openEdit: function() {
            this.openEditDialog = true;
        },
        closeEdit() {
            this.openEditDialog = false;
        },
        reloadTable: function() {
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
        editSuccess: function() {
            this.openEditDialog = false;
            this.reloadTable();
        }
    },
    watch: {
        shouldReloadContacts: function() {
            this.reloadTable();
        }
    }
}
</script>


<style scoped>
    * {
        font-family: arial;
    }
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
    thead th {
        background: #8d8888;
        color: #fff;
        padding: 2em;
        text-align: center;
    }
    tr td{
        border-bottom: 2px solid #8d8c8c;
    }
    tr td:nth-child(1) {
        padding: 1.2em 2em;
        width: 5%
    }
    tr td:nth-child(2) {
        padding: 1.2em 2em;
        width: 5%
    }
    tr td:nth-child(3) {
        padding: 1.2em 2em;
        width: 15%
    }
    tr td:nth-child(4) {
        padding: 1.2em 2em;
        width: 15%
    }
    tr td:nth-child(5) {
        padding: 1.2em 2em;
        width: 20%
    }
    tr td:nth-child(6) {
        padding-bottom: 1.5em;
        width: 15%
    }
</style>