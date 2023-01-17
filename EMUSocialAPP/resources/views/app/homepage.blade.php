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
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <title>Home</title>
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
                <a href=""><h1 class="logo">EMU APP</h1></a>
            </div>
            <div class="nav-right">
                <a href="/chat" type="button"><ion-icon name="mail"></ion-icon></a>
                <a type="button"><ion-icon name="notifications"></ion-icon></a>
                <a href="/profile" type="button" data-toggle="modal" data-target="#changePassword" data-whatever="@mdo"><ion-icon name="person"></ion-icon></a>
            </div>
        </div>
    </nav>
    <section id="main-section">
        <div class="header">
            <h2>My Feed</h2>
        </div>
        <div class="main-container">
            <div class="grid-left">
                <div class="profile-container">
                    <div class="profile-bg-img">
                        <img src="{{ $profile['coverimage'] }}" alt="bg-image">
                    </div>
                    <a href="">
                        <div class="profile-img">
                            <img src="{{ $user['profileimg'] }}" alt="profile-img">
                        </div>
                    </a>
                    <div class="name-container">
                        <a href="">
                            <h4 class="name">{{ $user['fullname'] }}</h4>
                            <p class="username">{{ $user['username'] }}</p>
                        </a>
                    </div>
                    <div class="content-container">
                        <div class="content">
                            <div class="info">
                                <p class="number">{{ $profile['connectnumber'] }}</p>
                                <p>Connects</p>
                            </div>
                            <div class="info info-middle">
                                <p class="number">{{ $profile['postnumber'] }}</p>
                                <p>Posts</p>
                            </div>
                            <div class="info">
                                <p class="number">{{ $profile['clubnumber'] }}</p>
                                <p>Clubs</p>
                            </div>
                        </div>
                    </div>
                    <div class="profile-link">
                        <a href="/profile">Go to my Profile</a>
                    </div>
                </div>
                <div class="connect-people-container">
                    <div class="header-people">
                        <h3>Who is to connect with?</h3>
                    </div>
                    @foreach ($connectfriends as $connectfriend)
                        <div class="connect-person">
                            <a href="">
                                <div class="profile-img">
                                    <img src="{{ $connectfriend['profileimage'] }}" alt="profile-img">
                                </div>
                            </a>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">{{ $connectfriend['fullname'] }}</a></h4>
                                <p class="username">{{ $connectfriend['username'] }}</p>
                            </div>
                            <button type="button" class="connet-btn">Connect</button>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="grid-middle">
                <div class="new-post-container">
                    <div class="new-post-header">
                        <h2>Welcome, {{ $user['fullname'] }}!</h2>
                    </div>
                    <div class="new-post-input-container">
                        <div class="new-post-profile-img">
                            <img src="{{ $user['profileimg'] }}" alt="profile-img">
                        </div>
                        <div class="new-post-text">
                            <input type="text" placeholder="What do you think {{ $user['firstname'] }}?">
                        </div>
                    </div>
                    <div class="new-post-buttons">
                        <button type="button" class="uploud-image-btn">
                            <ion-icon name="image"></ion-icon>
                        </button>
                        <button type="button" class="post-share-btn">
                            <ion-icon name="send"></ion-icon>
                        </button>
                    </div>
                </div>
                @foreach ($posts as $post)
                    <div class="post-container">
                        <div class="top-part">
                            <button type="button" class="edit-btn">
                                <ion-icon name="ellipsis-horizontal"></ion-icon>
                            </button>
                        </div>
                        <div class="main-content">
                            <div class="post-profile-img">
                                <a href="">
                                    <img src="{{ $post['posterimage'] }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="post-content">
                                <a href="" class="name">
                                    <h4>{{ $post['postername'] }}</h4>
                                </a>
                                <p class="description">{{ $post['postdesc'] }}</p>
                            </div>
                            <p class="post-time">{{ $post['posttime'] }}</p>
                        </div>
                        <div class="likes-and-comments">
                            <h4 class="likes">
                                <ion-icon name="heart-circle"></ion-icon>{{ count($post['postlikes']) }} Likes
                            </h4>
                            <a href="" class="comments">
                                <h4>
                                    <ion-icon name="chatbubble"></ion-icon>{{ count($post['postcomments']) }} Comments
                                </h4>
                            </a>
                        </div>
                        <div class="post-btns">
                            <hr>
                            <div class="btns">
                                <button type="button" class="post-btn like-btn">
                                    <ion-icon name="heart-outline"></ion-icon> Like
                                </button>
                                <button type="button" class="post-btn comment-btn">
                                    <ion-icon name="chatbubble-outline"></ion-icon> Comment
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
                @foreach ($fromclubposts as $fromclubpost)
                    <div class="club-post-container">
                        <div class="top-part">
                            <button type="button" class="edit-btn">
                                <ion-icon name="ellipsis-horizontal"></ion-icon>
                            </button>
                        </div>
                        <div class="club-post-profile">
                            <div class="club-post-profile-img">
                                <a href="">
                                    <img src="{{ $fromclubpost['clubprofileimg'] }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="club-header">
                                <a href="">
                                    <h2><span>From </span>{{ $fromclubpost['clubname'] }}</h2>
                                </a>
                            </div>
                        </div>
                        <hr>
                        <div class="main-content">
                            <div class="post-profile-img">
                                <a href="">
                                    <img src="{{ $fromclubpost['posterimage'] }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="post-content">
                                <a href="" class="name">
                                    <h4>{{ $fromclubpost['postername'] }}</h4>
                                </a>
                                <p class="description">{{ $fromclubpost['postdesc'] }}</p>
                            </div>
                            <p class="post-time">{{ $fromclubpost['posttime'] }}</p>
                        </div>
                        <div class="likes-and-comments">
                            <h4 class="likes">
                                <ion-icon name="heart-circle"></ion-icon>{{ count($fromclubpost['postlikes']) }} Likes
                            </h4>
                            <a href="" class="comments">
                                <h4>
                                    <ion-icon name="chatbubble"></ion-icon>{{ count($fromclubpost['postcomments']) }}
                                    Comments
                                </h4>
                            </a>
                        </div>
                        <div class="post-btns">
                            <hr>
                            <div class="btns">
                                <button type="button" class="post-btn like-btn">
                                    <ion-icon name="heart-outline"></ion-icon> Like
                                </button>
                                <button type="button" class="post-btn comment-btn">
                                    <ion-icon name="chatbubble-outline"></ion-icon> Comment
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="grid-right">
                <div class="clubs-for-you-container">
                    <div class="clubs-for-you-header">
                        <h2>Clubs For You</h2>
                        <p>Suggested clubs around you</p>
                    </div>
                    <div class="public-clubs-container">
                        <hr>
                        <div class="public-clubs-header">
                            <h2>Public Clubs</h2>
                        </div>
                        @foreach ($connectclubs as $connectclub)
                            @if ($connectclub['status'] == 'public')
                                <div class="join-club">
                                    <div class="club-img">
                                        <a href="">
                                            <img src="{{ $connectclub['profileimage'] }}" alt="profile-img">
                                        </a>
                                    </div>
                                    <div class="name-container-club">
                                        <h4 class="name"><a href="">{{ $connectclub['clubname'] }}</a></h4>
                                        <p class="members">{{ $connectclub['membernumber'] }} Members</p>
                                    </div>
                                    <button type="button" class="join-now-btn">Join Now</button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                    <div class="private-clubs-container">
                        <hr>
                        <div class="private-clubs-header">
                            <h2>Private Clubs</h2>
                        </div>
                        @foreach ($connectclubs as $connectclub)
                            @if ($connectclub['status'] == 'private')
                                <div class="join-club">
                                    <div class="club-img">
                                        <a href="">
                                            <img src="{{ $connectclub['profileimage'] }}" alt="profile-img">
                                        </a>
                                    </div>
                                    <div class="name-container-club">
                                        <h4 class="name"><a href="">{{ $connectclub['clubname'] }}</a></h4>
                                        <p class="members">{{ $connectclub['membernumber'] }} Members</p>
                                    </div>
                                    <button type="button" class="join-now-btn">Join Now</button>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
