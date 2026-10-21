<!DOCTYPE html>
<html lang="en">
<!--Head START-->
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Florist Website</title>
<!--link to CSS file-->
    <link rel="stylesheet" href="styleadmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
<!--Head END-->

<!--Body-->
    <body>
        <header id="header_bar"><h2 id="web_title">the Orchid Studio</h2></header>
        <div id="header"></div>
        <nav id="navigation_bar">
            <a href="index.html" class="btn">Home-Page<i class="fa fa-home"></i></a>   
        </nav>

<div class="login-container">
    <form action="admin_auth.php" method="POST">

        <h2>Administrator Login</h2>

        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Log In</button>
    </form>
</div>
</body>
</html>