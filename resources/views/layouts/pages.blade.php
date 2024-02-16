<!DOCTYPE html>
<html lang="en">
<head>

    @include('includes.head')

</head>
<body>

    @include('includes.navBar')

    @include('includes.header')

    @include('includes.intro')

    @yield('content')
		
    @include('includes.waitingFor')
    
    @include('includes.footer')
    
</body>
</html>