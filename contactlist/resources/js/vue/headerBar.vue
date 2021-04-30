<template>
    <div class='headerBarContainer'>
        <span>Contacts</span>
        <addContactButton />
    </div>
</template>

<script>
    import addContactButton from './addContactButton'
    export default {
        components: {
            addContactButton
        }
    }
</script>
<style scoped>
    .headerBarContainer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 2px solid #c2c2c2;
    }
</style>