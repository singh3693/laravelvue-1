<template>
    <div class='actionButtonContainer'>
        <ul>
            <li v-if="openMenu">
                <font-awesome-icon
                    icon="align-justify"
                    @click="editContact()"
                    :class="[ contact.name ? 'active' : 'inactive', 'plus']"
                ></font-awesome-icon>
                <span>
                    Edit
                </span> 
            </li>
            <li v-if="openMenu">
                <font-awesome-icon
                    icon="times-circle"
                    @click="deleteContact()"
                    :class="[ contact.name ? 'active' : 'inactive', 'plus']"
                ></font-awesome-icon>Delete
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
        },
        menuClicked: {
            type: Boolean,
            default: false
        }
    },
    
    data: function() {
       return {
           openMenu: false,
            contact: {
                name: this.contactData,
                email: "vioqwe@qiower.io",
                address: "niqwer qowerqowr"
            }
       }
    },
    methods: {
        deleteContact() {
            // if (this.contact.name =='') {
            //     return;
            // }

            axios.delete(`api/contact/${this.id}`)
            .then(res=> {
                if (res.status==201) {
                    // refresh page
                }
            })
            .catch( error => {
                console.log( error );
            })
        },
        editContact() {
        }
    },
    watch: {
        contactData: function() {
            this.contact.name = this.contactData;
        },
        menuClicked: function() {
            this.openMenu = this.menuClicked;
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