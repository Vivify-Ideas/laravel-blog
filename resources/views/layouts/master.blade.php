<!DOCTYPE html>
<html lang="en">
    <head>
        @include('partials.header')
    </head>
    <body>
        @include('partials.navbar')
        <div class="blog-header">
            <div class="container">
                <h1 class="blog-title">Laravel blog</h1>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-8 blog-main">
                    @yield('content')
                </div>
                <div class="col-sm-3 offset-sm-1 blog-sidebar">
                    @include('partials.sidebar')
                </div>
            </div>
        </div>
        @include('partials.footer')
    </body>
</html>