<!DOCTYPE html>
<html>
    <head>
        @include('theSoul.includes.head')
        @yield('mystyles')
    </head>

    <body class="full-width">

        <section id="container" class="hr-menu">

            <!-- header top bar -->
            <header class="header fixed-top">
                @include('theSoul.includes.header')
            </header>
            <!--/ header top bar -->



            <!-- middle -->
            <section id="main-content">
                <section class="wrapper">
                    @yield('content')
                </section>
            </section>
            <!--/ middle -->


            <footer class="footer-section">
                <div class="text-center">
                    @include('theSoul.includes.footer')
                </div>
            </footer>


            @include('theSoul.includes.foot')

            @yield('myscripts')
        </section>
    </body>

</html>