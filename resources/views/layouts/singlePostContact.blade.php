<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.head')

</head>
<body>

    @include('includes.navBar')

    @include('includes.header')

    @yield('content')
    
    @include('includes.footer')

    @include('sweetalert::alert')
    
</body>
</html>