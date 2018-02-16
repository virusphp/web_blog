<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- pemanggilan file public -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
      <div class="">
        <header>
          <nav>
            <a href="/blog">blog</a>
            <a href="/blog/create">Create</a>
          </nav>
        </header>
      </div>
    @yield('content')
  </body>
</html>
