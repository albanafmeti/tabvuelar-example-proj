<template>
    <tabvuelar
            :fields="fields"
            :api-url="apiUrl"
            :transformers="transformers">
        <template slot="__actions" slot-scope="{item}">
            <a class="btn btn-success" @click="editItem(item)"><span class="fa fa-pencil"></span></a>
            <a class="btn btn-danger" @click="deleteItem(item)"><span class="fa fa-times"></span></a>
        </template>
    </tabvuelar>
</template>

<script>

    import Vue from 'vue';
    import TabVueLar from '@noisim/tabvuelar';
    Vue.use(TabVueLar);

    const fields = [
        {
            name: '__checkbox'
        },
        {
            name: 'id',
            title: 'Id',
            sortable: true,
        },
        {
            name: 'name',
            title: 'Name',
            sortable: true,
        },
        {
            name: 'email',
            title: 'Email',
            sortable: true,
        },
        {
            name: 'created_at',
            title: 'Created At',
            sortable: true,
        },
        {
            name: '__actions',
            title: 'Actions'
        }
    ];

    export default {
        data: function () {
            return {
                fields: fields,
                transformers: {}
            }
        },
        props: {
            apiUrl: {
                type: String,
                required: true
            }
        },
        methods: {
            editItem(item) {
                alert('Edit ' + item.name + '?');
            },
            deleteItem(item) {
                alert('Delete ' + item.name + '?');
            }
        }
    }
</script>
