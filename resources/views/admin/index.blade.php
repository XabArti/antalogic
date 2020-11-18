<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Admin zone 123</title>
{{--    <link href="/lib/bootstrap-5.0.0-alpha1/css/bootstrap.css" rel="stylesheet">--}}
{{--    <script src="/lib/bootstrap-5.0.0-alpha1/js/bootstrap.js"></script>--}}

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

{{--    <link href="/css/admin.css" rel="stylesheet"/>--}}
</head>
<body>
<div id="app">
    <div class="container-fluid">
        <div class="row">
            <header class="col-12">
                Admin Panel
            </header>
        </div>

        <div class="row">
            <aside class="col-1">
                <ul class="main-menu mt-3">
                    <li>
                        <router-link :to="{name: 'admin.category.index'}">Категории</router-link>
                    </li>
                    <li>
                        <router-link :to="{name: 'admin.news.index'}">Новости</router-link>
                    </li>
                </ul>
            </aside>

            <main class="col mt-3">
                <router-view :key="$route.params.id"></router-view>
            </main>
        </div>
    </div>
</div>

<script src="/js/app.js"></script>
</body>
</html>
