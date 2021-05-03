<template>
    <div class='addButtonContainer' @click="openDialogue()">
        <font-awesome-icon
            icon="plus-circle"
        />
        <span>Add contact</span>
    </div>
</template>

<script>
    export default {
        methods: {
            openDialogue() {
                this.$emit('addButtonClicked');
            }
        }
    }
</script>

<style scoped>
    .addButtonContainer {
        color: #fff;
        border: 1px solid pink;
        padding: 1em 1.5em;
        background: blue;
        border-radius: 5px;
    }
    .plus {
        font-size: 20px;
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