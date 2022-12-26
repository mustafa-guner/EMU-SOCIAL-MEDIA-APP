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
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/search.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/navbar.css')}}">

    <title>Search</title>
</head>
<body>
    <nav>
        <div class="container">
            <div class="nav-left">
                <a href="/home" class="home-btn" type="button"><ion-icon name="home"></ion-icon></a>
                <div class="search-bar">
                    <input type="search" placeholder="Search...">
                </div>
            </div>
            <div class="nav-logo">
                <a href="">
                    <h1 class="logo">EMU APP</h1>
                </a>
            </div>
            <div class="nav-right">
                <a type="button"><ion-icon name="mail"></ion-icon></a>
                <a type="button"><ion-icon name="notifications"></ion-icon></a>
                <a href="/profile" type="button"><ion-icon name="person"></ion-icon></a>
            </div>
        </div>
    </nav>
    <section id="search-section">
        <div class="main-container">
            <div class="search-person">
                <div class="search-header-person">
                    About 132 results related with "Ahmet" in users.
                </div>
                <div class="sub-container-person">
                    @foreach($searchusercard as $user)
                    <div class="person-card">
                        <div class="profile-image-person">
                            <a href=""><img src="{{$user["profileimage"]}}" alt="profile-image"></a>
                        </div>
                        <div class="name-container-person">
                                <h4 class="name"><a href="">{{$user["fullname"]}}</a></h4>
                                <p class="username">{{$user["username"]}}</p>
                        </div>
                        <hr>
                        <div class="status-items">
                            <p class="connects">{{$user["connects"]}} Connects</p>
                            <p class="status"><ion-icon name="ellipse"></ion-icon>{{$user["usertype"]}}</p>
                        </div>
                        <hr>
                        <div class="btns">
                            <button type="button" class="connect-btn">Connect</button>
                            <button type="button" class="chat-btn"><ion-icon name="mail"></ion-icon></button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="search-club">
                <div class="search-header-club">
                    About 132 results related with "photography" in clubs.
                </div>
                <div class="sub-container-club">
                    @foreach($searchclubcard as $club)
                    <div class="club-card">
                        <div class="img-and-username-section">
                            <div class="profile-image-club">
                                <a href=""><img src="{{$club["profileimage"]}}" alt="profile-image"></a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">{{$club["clubname"]}}</a></h4>
                            </div>
                        </div>
                        <hr>
                        <div class="status-items">
                            <p class="connects">{{$club["members"]}} Members</p>
                            <p class="status"><ion-icon name="ellipse"></ion-icon>{{$club["status"]}}</p>
                        </div>
                        <hr>
                        <div class="btns">
                            <button type="button" class="join-btn">Join Now</button>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="pagination">
                <div class="buttons">
                    <button type="button"><ion-icon name="chevron-back"></ion-icon></button>
                    <button type="button" class="active">1</button>
                    <button type="button">2</button>
                    <button type="button">3</button>
                    <button type="button">4</button>
                    <button type="button">5</button>
                    <button type="button"><ion-icon name="chevron-forward"></ion-icon></button>
                </div>
            </div>
        </div>
    </section>
</body>
</html>