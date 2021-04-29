<template>
 <div class='contactlistContainer'>
    <div class="heading">
        <h2 id="title">contact list</h2>
        <addContactForm />
    </div>
    <listContact />
 </div>
</template>

<script>
    import addContactForm from './addContactForm';
    import listContact from './listContact';


    export default {
        components: { 
            addContactForm,
            listContact
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