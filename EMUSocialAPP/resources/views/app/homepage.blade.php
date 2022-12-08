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
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <title>Home</title>
</head>

<body>
    <nav>
        <div class="container">
            <div class="nav-left">
<<<<<<< HEAD
                <a href="/home" class="home-btn" type="button"><ion-icon name="home"></ion-icon></a>
=======
                <button class="home-btn" type="button">
                    <ion-icon name="home"></ion-icon>
                </button>
>>>>>>> a9677b8c18e204e31645bca59f11875fa5aa2442
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
<<<<<<< HEAD
                <a type="button"><ion-icon name="mail"></ion-icon></a>
                <a type="button"><ion-icon name="notifications"></ion-icon></a>
                <a href="/profile" type="button"><ion-icon name="person"></ion-icon></a>
=======
                <button type="button">
                    <ion-icon name="mail"></ion-icon>
                </button>
                <button type="button">
                    <ion-icon name="notifications"></ion-icon>
                </button>
                <button type="button">
                    <ion-icon name="person"></ion-icon>
                </button>
>>>>>>> a9677b8c18e204e31645bca59f11875fa5aa2442
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
                        <img src="{{ asset('assets/images/home-profile-bg.jpg') }}" alt="bg-image">
                    </div>
                    <a href="">
                        <div class="profile-img">
                            <img src="{{ asset('assets/images/profile-images/profile-img-1.png') }}" alt="profile-img">
                        </div>
                    </a>
                    <div class="name-container">
                        <a href="">
                            <h4 class="name">Jane Doe</h4>
                            <p class="username">@jane.doe</p>
                        </a>
                    </div>
                    <div class="content-container">
                        <div class="content">
                            <div class="info">
                                <p class="number">531</p>
                                <p>Connected</p>
                            </div>
                            <div class="info info-middle">
                                <p class="number">45</p>
                                <p>Blog</p>
                            </div>
                            <div class="info">
                                <p class="number">5</p>
                                <p>Club</p>
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
                    <div class="connect-person">
                        <a href="">
                            <div class="profile-img">
                                <img src="{{ asset('assets/images/profile-images/profile-img-2.png') }}"
                                    alt="profile-img">
                            </div>
                        </a>
                        <div class="name-container-people">
                            <h4 class="name"><a href="">John Doe</a></h4>
                            <p class="username">@john.doe</p>
                        </div>
                        <button type="button" class="connet-btn">Connect</button>
                    </div>
                    <div class="connect-person">
                        <a href="">
                            <div class="profile-img">
                                <img src="{{ asset('assets/images/profile-images/profile-img-3.png') }}"
                                    alt="profile-img">
                            </div>
                        </a>
                        <div class="name-container-people">
                            <h4 class="name"><a href="">Jane Doe</a></h4>
                            <p class="username">@jane.doe</p>
                        </div>
                        <button type="button" class="connet-btn">Connect</button>
                    </div>
                    <div class="connect-person">
                        <a href="">
                            <div class="profile-img">
                                <img src="{{ asset('assets/images/profile-images/profile-img-4.png') }}"
                                    alt="profile-img">
                            </div>
                        </a>
                        <div class="name-container-people">
                            <h4 class="name"><a href="">John Doe</a></h4>
                            <p class="username">@john.doe</p>
                        </div>
                        <button type="button" class="connet-btn">Connect</button>
                    </div>
                    <div class="connect-person">
                        <a href="">
                            <div class="profile-img">
                                <img src="{{ asset('assets/images/profile-images/profile-img-5.png') }}"
                                    alt="profile-img">
                            </div>
                        </a>
                        <div class="name-container-people">
                            <h4 class="name"><a href="">John Doe</a></h4>
                            <p class="username">@john.doe</p>
                        </div>
                        <button type="button" class="connet-btn">Connect</button>
                    </div>
                    <div class="connect-person">
                        <a href="">
                            <div class="profile-img">
                                <img src="{{ asset('assets/images/profile-images/profile-img-6.png') }}"
                                    alt="profile-img">
                            </div>
                        </a>
                        <div class="name-container-people">
                            <h4 class="name"><a href="">Jane Doe</a></h4>
                            <p class="username">@jane.doe</p>
                        </div>
                        <button type="button" class="connet-btn">Connect</button>
                    </div>
                </div>
            </div>
            <div class="grid-middle">
                <div class="new-post-container">
                    <div class="new-post-header">
                        <h2>Welcome, Jane Doe!</h2>
                    </div>
                    <div class="new-post-input-container">
                        <div class="new-post-profile-img">
                            <img src="{{ asset('assets/images/profile-images/profile-img-1.png') }}"
                                alt="profile-img">
                        </div>
                        <div class="new-post-text">
                            <input type="text" placeholder="What do you think Jane?">
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
                <div class="post-container">
                    <div class="top-part">
                        <button type="button" class="edit-btn">
                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                        </button>
                    </div>
                    <div class="main-content">
                        <div class="post-profile-img">
                            <a href="">
                                <img src="{{ asset('assets/images/profile-images/profile-img-3.png') }}"
                                    alt="profile-img">
                            </a>
                        </div>
                        <div class="post-content">
                            <a href="" class="name">
                                <h4>Jane Doe</h4>
                            </a>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                        <p class="post-time">22:45 PM</p>
                    </div>
                    <div class="likes-and-comments">
                        <h4 class="likes">
                            <ion-icon name="heart-circle"></ion-icon> 32 Likes
                        </h4>
                        <a href="" class="comments">
                            <h4>
                                <ion-icon name="chatbubble"></ion-icon>45 Comments
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
                <div class="club-post-container">
                    <div class="top-part">
                        <button type="button" class="edit-btn">
                            <ion-icon name="ellipsis-horizontal"></ion-icon>
                        </button>
                    </div>
                    <div class="club-post-profile">
                        <div class="club-post-profile-img">
                            <a href="">
                                <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                            </a>
                        </div>
                        <div class="club-header">
                            <a href="">
                                <h2><span>From</span> Sports Club</h2>
                            </a>
                        </div>
                    </div>
                    <hr>
                    <div class="main-content">
                        <div class="post-profile-img">
                            <a href="">
                                <img src="{{ asset('assets/images/profile-images/profile-img-2.png') }}"
                                    alt="profile-img">
                            </a>
                        </div>
                        <div class="post-content">
                            <a href="" class="name">
                                <h4>John Doe</h4>
                            </a>
                            <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                        </div>
                        <p class="post-time">22:45 PM</p>
                    </div>
                    <div class="likes-and-comments">
                        <h4 class="likes">
                            <ion-icon name="heart-circle"></ion-icon> 32 Likes
                        </h4>
                        <a href="" class="comments">
                            <h4>
                                <ion-icon name="chatbubble"></ion-icon>45 Comments
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
                        <div class="join-club">
                            <div class="club-img">
                                <a href="">
                                    <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">Sports Club</a></h4>
                                <p class="members">143 Members</p>
                            </div>
                            <button type="button" class="join-now-btn">Join Now</button>
                        </div>
                        <div class="join-club">
                            <div class="club-img">
                                <a href="">
                                    <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">Sports Club</a></h4>
                                <p class="members">143 Members</p>
                            </div>
                            <button type="button" class="join-now-btn">Join Now</button>
                        </div>
                        <div class="join-club">
                            <div class="club-img">
                                <a href="">
                                    <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">Sports Club</a></h4>
                                <p class="members">143 Members</p>
                            </div>
                            <button type="button" class="join-now-btn">Join Now</button>
                        </div>
                    </div>
                    <div class="private-clubs-container">
                        <hr>
                        <div class="private-clubs-header">
                            <h2>Private Clubs</h2>
                        </div>
                        <div class="join-club">
                            <div class="club-img">
                                <a href="">
                                    <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">Sports Club</a></h4>
                                <p class="members">143 Members</p>
                            </div>
                            <button type="button" class="join-now-btn">Join Now</button>
                        </div>
                        <div class="join-club">
                            <div class="club-img">
                                <a href="">
                                    <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">Sports Club</a></h4>
                                <p class="members">143 Members</p>
                            </div>
                            <button type="button" class="join-now-btn">Join Now</button>
                        </div>
                        <div class="join-club">
                            <div class="club-img">
                                <a href="">
                                    <img src="{{ asset('assets/images/club-img-1.png') }}" alt="profile-img">
                                </a>
                            </div>
                            <div class="name-container-club">
                                <h4 class="name"><a href="">Sports Club</a></h4>
                                <p class="members">143 Members</p>
                            </div>
                            <button type="button" class="join-now-btn">Join Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
