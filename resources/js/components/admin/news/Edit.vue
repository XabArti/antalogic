<template>
    <div class="container">
        <h1>{{ $route.params.id == 'create' ? 'Создать' : 'Редактировать' }} новости</h1>
        <div class="form-group">
            <label>Заголовок</label>
            <input type="text" class="form-control" v-model="model.data.title">
        </div>
        <div class="form-group">
            <label>Текст</label>
            <input type="text" class="form-control" v-model="model.data.text">
        </div>
        <div class="form-group">
            <label class="form-label">Категория</label>
            <select class="form-control" v-model="model.data.category">
                <option :value="null">[НЕТ]</option>
                <option v-for="v in category.data" :value="v">{{ v.title }}</option>
            </select>
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
                dataUrl: '/api/admin/news',
                model: {data:{category:{}}},
                category: {},
            }
        },
        async mounted() {
            let response = await this.get('/api/admin/category');
            this.$set(this.category, 'data', response.data);
        },
        methods: {}
    }
</script>

