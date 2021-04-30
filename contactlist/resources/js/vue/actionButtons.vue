<template>
    <div class='actionButtonContainer'>
        <ul>
            <li v-if="openMenu">
                <font-awesome-icon
                    icon="align-justify"
                    @click="addContact()"
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
        contactData: {
            type: String,
            required: false
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
        addContact() {
            if (this.contact.name =='') {
                return;
            }

            axios.post('api/contact/create', {
                contact_entry23: this.contact
            }).then(res=> {
                if (res.status==201) {
                    this.contact.name == "";
                }
            })
            .catch( error => {
                console.log( error );
            })
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