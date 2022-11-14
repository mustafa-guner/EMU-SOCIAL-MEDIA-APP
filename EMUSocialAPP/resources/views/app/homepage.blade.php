<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <title>Home</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-left">
                <button class="home-btn" type="button"><ion-icon name="home"></ion-icon></button>
                <div class="search-bar">
                    <input type="search" placeholder="Search...">
                </div>
            </div>
            <div class="nav-logo">
                <h1 class="logo">EMU APP</h1>
            </div>
            <div class="nav-right">
                <button  type="button"><ion-icon name="mail"></ion-icon></button>
                <button  type="button"><ion-icon name="notifications"></ion-icon></button>
                <button  type="button"><ion-icon name="person"></ion-icon></button>
            </div>
        </div>
    </nav>
</body>
</html>