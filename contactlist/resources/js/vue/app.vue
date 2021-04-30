<template>
 <div class='contactlistContainer'>
    <div class="heading">
        <h2 id="title">contact list</h2>
        <appBody />
    </div>
 </div>
</template>

<script>
    import appBody from './appBody';

    export default {
        components: { 
            appBody
        }
    }
</script>

<style scoped>
.todoListContainer{
    width: 30em;
    margin: auto;
}
.heading {
    background: orange;
    padding: 1em;
}

#title {
    text-align: center;
}
</style>