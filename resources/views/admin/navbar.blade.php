        <!-- Static navbar -->
<nav class="navbar navbar-default navbar-static-top navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/admin/home') }}">{{ config('blog.blog_name') }}</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">新增<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ action('Admin\ContentController@create') }}">文章</a></li>
                        <li><a href="#">分类</a></li>
                        <li><a href="#">标签</a></li>
                        <li><a href="#">页面</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ action('Admin\ContentController@index') }}">文章</a></li>
                        <li><a href="{{ action('Admin\CategoryController@index') }}">分类</a></li>
                        <li><a href="#">标签</a></li>
                        <li><a href="#">页面</a></li>
                    </ul>
                </li>
                <li><a href="#">文件</a></li>
                <li><a href="#">设置</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="{{ url('/auth/logout') }}">登出</a></li>
                <li><a href="/">网站</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
