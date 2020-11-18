<template>
    <div class="container">
        <h1>{{ $route.params.id == 'create' ? 'Создать' : 'Редактировать' }} категорию</h1>
        <div class="form-group">
            <label>Наименование</label>
            <input type="text" class="form-control" v-model="model.data.title">
        </div>
        <button type="submit" class="btn btn-primary" @click="submit">
            {{ $route.params.id == 'create' ? 'Создать' : 'Сохранить' }}
        </button>
    </div>
</template>

<script>
    import Data from "../mixins/Data";

    export default {
        mixins: [Data],
        data() {
            return {
                dataUrl: '/api/admin/category',
                model: {},
            }
        },
        async mounted() {
        },
        methods: {}
    }
</script>

