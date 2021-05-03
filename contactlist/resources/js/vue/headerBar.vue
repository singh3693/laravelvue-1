<template>
    <div class='headerBarContainer'>
        <span>Contacts</span>
        <addContactButton 
            @addButtonClicked="addButtonClicked()"
        />
    </div>
</template>

<script>
    import addContactButton from './addContactButton'
    export default {
        components: {
            addContactButton
        },
        methods: {
            addButtonClicked: function() {
                this.$emit('addButtonClicked')
            }
        }
    }
</script>
<style scoped>
    .headerBarContainer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px solid #c2c2c2;
        padding: 2em;
        background: #fff;
    }
    .headerBarContainer span {
        font-weight: bold;
    }
</style>