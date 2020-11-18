import CategoryIndex from './components/admin/category/Index'
import CategoryEdit from './components/admin/category/Edit'
import NewsIndex from './components/admin/news/Index'
import NewsEdit from './components/admin/news/Edit'


const routes = [
    {path: '/category', name: 'admin.category.index', component: CategoryIndex},
    {path: '/category/:id?', name: 'admin.category.edit', component: CategoryEdit},
    {path: '/news', name: 'admin.news.index', component: NewsIndex},
    {path: '/news/:id', name: 'admin.news.edit', component: NewsEdit},
];

export default routes;
