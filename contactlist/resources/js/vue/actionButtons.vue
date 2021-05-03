<template>
    <div class='actionButtonContainer'>
        <font-awesome-icon
            icon="ellipsis-v"
            @click="toggleMenu()"
        />
        <ul>
            <li v-if="menuClicked"
                @click="openEditDialog()"
            >
                <font-awesome-icon
                    icon="align-justify"
                    :class="[ contact.name ? 'active' : 'inactive', 'plus']"
                ></font-awesome-icon>
                <span>Edit</span> 
            </li>
            <li v-if="menuClicked"
                @click="deleteContact()"
            >
                <font-awesome-icon
                    icon="times-circle"
                    :class="[ contact.name ? 'active' : 'inactive', 'plus']"
                ></font-awesome-icon>
                <span>Delete</span>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        id: {
            type: Number,
            required: true
        }
    },
    
    data: function() {
       return {
           menuClicked: false,
            contact: {
                name: "",
                email: "",
                address: ""
            }
       }
    },
    methods: {
        toggleMenu() {
            this.menuClicked = !this.menuClicked;
        },
    
        deleteContact() {
            axios.delete(`api/contact/${this.id}`)
            .then(res=> {
                if (res.status==200) {
                    this.$emit('delete-succeeded')
                }
            })
            .catch( error => {
                console.log( error );
            })
        },
        openEditDialog() {
            this.$emit('editButtonClicked')
        }
    },
    watch: {
        contactData: function() {
            this.contact.name = this.contactData;
        }
    }
}
</script>
<style scoped>
    .plus {
        font-size: 20px;
    }

    .active {
        color: green;
    }

    .inactive {
        color: grey;
    }
    
    ul {
        margin-top: 0;
        padding-left: 0.2em;
    }
    
    ul li {
        background: #fff;
        list-style: none;
        border: 1px solid #000;
        padding: 8px;
        width: 150%;
    }
    .actionButtonContainer {
        display: flex;
        flex-flow: row nowrap;
        justify-content: space-between;
        margin-left: 1em;
        position: absolute;
        padding: 3px 3px 3px 0;
    }
</style>