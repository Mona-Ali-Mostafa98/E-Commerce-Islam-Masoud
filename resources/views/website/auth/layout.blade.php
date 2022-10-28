<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('page_title')</title>

    <link rel="icon" type="image/x-icon" href="{{ url('website/images/Group 68191.png') }}" />

    <!-- Bootstrap link  -->
    <link rel="stylesheet" href="{{ url('website/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css" />

    <!-- fancyBox link  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <!-- font awesom link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- owl-carousel link -->
    <link rel="stylesheet" href="{{ url('website/css/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ url('website/css/owl.theme.default.min.css') }}" />

    <!-- rateyo link -->
    <link rel="stylesheet" href="{{ url('website/css/jquery.rateyo.min.css') }}" />

    <!-- nice select link -->
    <link rel="stylesheet" href="{{ url('website/css/nice-select.css') }}" />

    <!-- WoW link -->
    <link rel="stylesheet" href="{{ url('website/css/animate.css') }}" />
    <!-- aos link -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

    <!-- animate link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

    @if (App::getLocale() == 'en')
        <!-- custom css file link  -->
        <link rel="stylesheet" href="{{ url('website/css/style.css') }}" />

        <link rel="stylesheet" href="{{ url('website/css/style-ltr.css') }}">
    @else
        <!-- custom css file link  -->
        <link rel="stylesheet" href="{{ url('website/css/style.css') }}" />
    @endif
</head>

<body>

    @yield('content')

    <!-- jQuery script -->
    <script src="{{ url('website/js/jquery-3.6.0.min.js') }}"></script>

    <!-- popper script -->
    <script src="https://unpkg.com/@popperjs/core@2"></script>

    <!-- owl-carousel script -->
    <script src="{{ url('website/js/owl.carousel.min.js') }}"></script>

    <!-- bootstrap script -->
    <script src="{{ url('website/js/bootstrap.min.js') }}"></script>

    <!-- font awesom script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
        integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- fancyBox script -->
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

    <!-- rateyo script -->
    <script src="{{ url('website/js/jquery.rateyo.min.js') }}"></script>

    <!-- nice select script -->
    <script src="{{ url('website/js/jquery.nice-select.min.js') }}"></script>

    <!-- wow script -->
    <script src="{{ url('website/js/wow.min.js') }}"></script>
    <!-- aos script -->
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>

    <!-- custom js file link  -->
    <script src="{{ url('website/js/script.js') }}"></script>
</body>

</html>
