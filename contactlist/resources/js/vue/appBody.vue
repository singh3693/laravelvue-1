<template>
    <div>
        <headerBar @addButtonClicked="openAddDialog"/>
        <listContact :shouldReloadContacts='openDialog'/>
        <createContactDialog
            v-if='openDialog'
            @closeAddDialog='closeAddDialog'
            @contactSuccessfullyAdded='closeAddDialog'
        />
    </div>
</template>

<script>
    import listContact from './listContact'
    import headerBar from './headerBar'
    import createContactDialog from './createContactDialog'

    export default {
        components: {
            listContact, headerBar, createContactDialog
        },

        data: function() {
            return {
                openDialog: false,
                shouldReload: false
            }
        },
        methods: {
            openAddDialog: function() {
                this.openDialog = true;
            },
            closeAddDialog: function() {
                this.openDialog = false;
            }
        }
    }
</script>

<style scoped>
    * {
        font-family: Arial, Helvetica, sans-serif;
    }
    .addContactDialog{
        position: absolute;
        top: 12em;
        left: 13em;
        width: 32em;
        background: green;
    }
</style>