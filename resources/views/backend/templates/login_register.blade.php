<!DOCTYPE html>
<html lang="en">
<head>
        @include('backend.includes.header')
</head>
<body>

        <section id="wrapper">
                <div class="login-register" style="background-image:url({{asset('assets/images/background/cargg.jpg')}})">
                    @yield('content')
                </div>
        </section>

        @include('backend.includes.footer')
</body>
</html>