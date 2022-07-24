<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>PHPJabbers.com | Free Online Store Website Template</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('frontend')}}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/style.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/assets/css/owl.css">
</head>

<body>

<!-- ***** Preloader Start ***** -->
<div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- Header -->
@include('frontend.layouts.header')

<!-- Page Content -->
<!-- Banner Starts Here -->
@include('frontend.layouts.main-banner')
<!-- Banner Ends Here -->

@yield('homecontent')

@include('frontend.layouts.footer')

<!-- Bootstrap core JavaScript -->
<script src="{{asset('frontend')}}/vendor/jquery/jquery.min.js"></script>
<script src="{{asset('frontend')}}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Additional Scripts -->
<script src="{{asset('frontend')}}/assets/js/custom.js"></script>
<script src="{{asset('frontend')}}/assets/js/owl.js"></script>
<script src="{{asset('frontend')}}/assets/js/slick.js"></script>
<script src="{{asset('frontend')}}/assets/js/isotope.js"></script>
<script src="{{asset('frontend')}}/assets/js/accordions.js"></script>
<script src="{{ asset('backend/js/notify.min.js') }}"></script>

@yield('js')

<script language = "text/Javascript">
    cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
    function clearField(t){                   //declaring the array outside of the
        if(! cleared[t.id]){                      // function makes it static and global
            cleared[t.id] = 1;  // you could use true and false, but that's more typing
            t.value='';         // with more chance of typos
            t.style.color='#fff';
        }
    }
</script>

</body>
</html>
