<!DOCTYPE html>
<html>
<head>
    <title>Coffee Shop Menu</title>
</head>
<body>

    <h1>☕ Coffee Shop Menu</h1>
    <hr>

    @yield('content')

    <hr>
    <footer style="text-align: center; margin-top: 20px;">
        <p>© 2026 Coffee Shop</p>
    </footer>

</body>
</html>


<head>
    <title>Coffee Shop Menu</title>

    <style>
    body {
        font-family: Arial;
        background-color: #f3e5d8;
        padding: 20px;
    }

    h1 {
        text-align: center;
    }

    .detail-container {
        display: flex;
        flex-direction: column;
        align-items: center;  /* Centers horizontally */
        justify-content: center;  /* Centers vertically */
        max-width: 800px;
        margin: 0 auto;  /* Centers the content on the page */
        text-align: center; /* Optional for text centering */
    }

    .detail-container img {
        margin: 10px 0;
        border-radius: 10px;
    }

    .detail-container a {
        text-decoration: none;
        background-color: #ffcc99;
        padding: 8px 12px;
        border-radius: 5px;
        color: #fff;
    }

    .detail-container a:hover {
        background-color: #ff9966;
    }
</style>