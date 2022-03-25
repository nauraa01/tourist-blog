<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL('assets/favicon.ico') }}">

    <title>Blog Tourism</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="{{ URL('css-js/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL('css-js/css/pricing.css') }}" rel="stylesheet">
    <link href="{{ URL('css-js/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ URL('css-js/css/carousel.css') }}" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Blog Tourism</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        @if(session('user_id'))
        <?php $data_cutomer = \App\User::find(session('user_id')); ?>
        @endif
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                @if(!session('user_id'))
                <li class="nav-item <?= (session('menu_user') == 'home') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/') }}">Home</a>
                </li>
                <li class="nav-item dropdown <?= (session('menu_user') == 'categories') ? 'active' : ''; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <?php $categorie1 = \App\Categorie::all(); ?>
                        @foreach ($categorie1 as $cat1)
                        <a class="dropdown-item" href="{{ URl('categories/'.$cat1->id) }}">{{ $cat1->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item <?= (session('menu_user') == 'about_us') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/about_us') }}">About Us</a>
                </li>
                @else
                <li class="nav-item <?= (session('menu_user') == 'home') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/') }}">Home</a>
                </li>
                <li class="nav-item <?= (session('menu_user') == 'profil') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/profile') }}">Profil</a>
                </li>
                <li class="nav-item <?= (session('menu_user') == 'blog') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/blog_all') }}">Blog</a>
                </li>
                <li class="nav-item dropdown <?= (session('menu_user') == 'categories') ? 'active' : ''; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <?php $categorie1 = \App\Categorie::all(); ?>
                        @foreach ($categorie1 as $cat1)
                        <a class="dropdown-item" href="{{ URl('categories/'.$cat1->id) }}">{{ $cat1->name }}</a>
                        @endforeach
                    </div>
                </li>
                @endif
            </ul>
            <form class="form-inline my-2 my-md-0">
                <ul class="navbar-nav mr-auto">
                    @if(!session('user_id'))
                    <li class="nav-item <?= (session('menu_user') == 'register') ? 'active' : ''; ?>">
                        <a class="nav-link" role="button" href="{{ URL('/register_user') }}"><i class="fa fa-plus"></i> Register</a>
                    </li>
                    <li class="nav-item <?= (session('menu_user') == 'login') ? 'active' : ''; ?>">
                        <a class="nav-link" role="button" href="{{ URL('/login_user') }}"><i class="fa fa-arrow-right"></i> Login</a>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" role="button" href="{{ URL('/user-logout') }}"><i class="fa fa-arrow-left"></i> Logout</a>
                    </li>
                    @endif
                </ul>
            </form>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL('css-js/js/jquery-3.5.1.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ URL('css-js/js/bootrsap.min.js') }}"></script>
    <script src="{{ URL('css-js/js/popper.min.js') }}"></script>
    <script src="{{ URL('css-js/js/holder.min.js') }}"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
    <script type="text/javascript">
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            var sec = today.getSeconds();
            ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
            hr = (hr == 0) ? 12 : hr;
            hr = (hr > 12) ? hr - 12 : hr;
            //Add a zero in front of numbers<10
            hr = checkTime(hr);
            min = checkTime(min);
            sec = checkTime(sec);
            document.getElementById("clock_template").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var curWeekDay = days[today.getDay()];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear + " /";
            document.getElementById("date_template").innerHTML = date;

            var time = setTimeout(function() {
                startTime()
            }, 500);
        }
        startTime();
    </script>
</body>

</html>