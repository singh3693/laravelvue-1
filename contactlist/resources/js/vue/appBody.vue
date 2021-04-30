<template>
    <div>
        <headerBar />
        <listContact />
    </div>
</template>

<script>
    import listContact from './listContact'
    import headerBar from './headerBar'

    export default {
        components: {
            listContact, headerBar
        }
    }
</script>