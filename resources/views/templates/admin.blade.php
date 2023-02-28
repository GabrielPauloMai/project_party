<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com/3.2.4"></script>
    <link rel="icon" type="image/x-icon" href="{{url('assets/bootstrap/img/party-baloons.png')}}">
    @yield('add')
</head>
<body onLoad="loading()"
 class="bg-gradient-to-b from-[#bd908a] to-[#f2f2f2]">
    

        <main>
            @yield('top')
            @yield('load')
            @yield('content')
        </main>
    
    {{-- <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2023 - Gabriel Mai</p>
        {{-- <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul> 
      </footer>--}}
</body> 
</html>