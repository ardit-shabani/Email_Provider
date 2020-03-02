<!DOCTYPE html>
<html>
<head>
    <title>Title of - @yield('title')</title>
</head>

<body>
@section('header')
<h1>This is Home Page</h1>
    @show
@endsection

@section('content')
    <h2>Welcome</h2>

    @show
@endsection

<footer>
    <p>
        emriplatformes | @php echo (now()->year);  @endphp | @yield("footer")
    </p>
</footer>

</body>

</html>
