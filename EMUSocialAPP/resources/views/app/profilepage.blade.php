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
    <link rel="stylesheet" href="{{ asset('assets/css/profile.css') }}">
    <title>Profile</title>
</head>

<body>
    <nav>
        <div class="container">
            <div class="nav-left">
                <a href="/home" class="home-btn" type="button">
                    <ion-icon name="home"></ion-icon>
                </a>
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
                <a type="button">
                    <ion-icon name="mail"></ion-icon>
                </a>
                <a type="button">
                    <ion-icon name="notifications"></ion-icon>
                </a>
                <a href="/profile" type="button">
                    <ion-icon name="person"></ion-icon>
                </a>
            </div>
        </div>
    </nav>
    <section id="main-section">
        <div class="left-section">
            <div class="profile-container">
                <div class="profile-bg-img">
                    <img src="{{ asset('assets/images/profile-bg-img.jpg') }}" alt="bg-image">
                </div>
                <div class="profile-informations">
                    <div class="profile-img">
                        <img src="{{ asset('assets/images/profile-images/profile-img-1.png') }}" alt="profile-img">
                    </div>
                    <div class="infos">
                        <h1>Jane Doe</h1>
                        <div class="icons">
                            <div class="contact-number">
                                <ion-icon name="people"></ion-icon>500
                            </div>
                            <div class="status">
                                <ion-icon name="school"></ion-icon>Student
                            </div>
                        </div>
                        <div class="desc">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Exercitationem iusto
                                culpa nesciunt ratione minima ea aspernatur quae. Est eum magni, pariatur laborum itaque
                                neque nesciunt obcaecati iusto voluptatibus blanditiis quibusdam!
                            </p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="edit-btn">
                            <ion-icon name="settings"></ion-icon>
                        </button>
                        <div class="common-connect">
                            <div class="common-images">
                                <div class="img-1"><img
                                        src="{{ asset('assets/images/profile-images/profile-img-4.png') }}"
                                        alt="profile-img"></div>
                                <div class="img-2"><img
                                        src="{{ asset('assets/images/profile-images/profile-img-5.png') }}"
                                        alt="profile-img"></div>
                                <div class="img-3"><img
                                        src="{{ asset('assets/images/profile-images/profile-img-6.png') }}"
                                        alt="profile-img"></div>
                            </div>
                            <a href="">3 common connect</a>
                        </div>
                        <div class="main-btns">
                            <button>
                                <ion-icon name="mail-outline"></ion-icon>
                                <p>Chat</p>
                            </button>
                            <button>
                                <ion-icon name="link"></ion-icon>
                                <p>Connect</p>
                            </button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="profile-sections-navbar">
                    <button id="overview" class="navigation-btn">Overview</button>
                    <button id="about" class="navigation-btn">About</button>
                    <button id="clubs" class="navigation-btn">Clubs</button>
                    <button id="friends" class="navigation-btn">Friends</button>
                </div>
            </div>
            <div class="bottom-section">
                <div class="profile-section-container"></div>
                <div class="bottom-right-section">
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
                                    <img src="{{ asset('assets/images/profile-images/profile-img-1.png') }}"
                                        alt="profile-img">
                                </a>
                            </div>
                            <div class="post-content">
                                <a href="" class="name">
                                    <h4>Jane Doe</h4>
                                </a>
                                <p class="description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                </p>
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
            </div>
        </div>
        <div class="right-section">
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
    </section>
    <script>
        const navBtns = document.querySelectorAll(".navigation-btn");
        const profileShowCase = document.querySelector(".profile-section-container");

        const views = {
            overview: `<div class="profile-section-header"><h2>Overview</h2></div>
                        <div class="profile-section-overview-content">
                            <div class="content-1">
                                <ion-icon name="people"></ion-icon>
                                <h3>Connects</h3>
                                <p>500</p>
                            </div>
                            <div class="content-2">
                                <ion-icon name="ribbon"></ion-icon>
                                <h3>Status</h3>
                                <p>Student</p>
                            </div>
                            <div class="content-3">
                                <ion-icon name="school"></ion-icon>
                                <h3>Graduation</h3>
                                <p>2024</p>
                            </div>
                            <div class="content-4">
                                <ion-icon name="business"></ion-icon>
                                <h3>Department</h3>
                                <p>IT</p>
                            </div>
                            <div class="content-5">
                                <ion-icon name="clipboard"></ion-icon>
                                <h3>Posts</h3>
                                <p>30</p>
                            </div>
                            <div class="content-6">
                                <ion-icon name="people-circle"></ion-icon>
                                <h3>Clubs Joined</h3>
                                <p>12</p>
                            </div>
                        </div>`,
            about: `    <div class="profile-section-header"><h2>About</h2></div>
                        <div class="profile-section-about-desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.</p>
                        </div>
                        <div class="profile-section-about-content">
                            <div class="content-1">
                                <ion-icon name="calendar"></ion-icon>
                                <h3>Age</h3>
                                <p>23</p>
                            </div>
                            <div class="content-2">
                                <ion-icon name="earth"></ion-icon>
                                <h3>Country</h3>
                                <p>Cyprus</p>
                            </div>
                            <div class="content-3">
                                <ion-icon name="male-female"></ion-icon>
                                <h3>Gender</h3>
                                <p>Female</p>
                            </div>
                            <div class="content-4">
                                <ion-icon name="medal"></ion-icon>
                                <h3>Degree</h3>
                                <p>Master</p>
                            </div>
                        </div>`,
            clubs: `   <div class="profile-section-header"><h2>Clubs</h2></div>
                        <div class="profile-section-clubs-content">
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
                        <div class="show-more">
                            <a href="">Show More</a>
                        </div>`,
            friends: `<div class="profile-section-header"><h2>Friends</h2></div>
                        <div class="profile-section-friends-content">
                            <div class="connect-person">
                                <a href="">
                                    <div class="profile-img">
                                        <img src="{{ asset('assets/images/profile-images/profile-img-2.png') }}" alt="profile-img">
                                    </div>
                                </a>
                                <div class="name-container-people">
                                    <h4 class="name"><a href="">John Doe</a></h4>
                                    <p class="username">@john.doe</p>
                                </div>
                                <div class="person-status">
                                    <ion-icon name="ellipse"></ion-icon>
                                    <p>Student</p>
                                </div>
                                <div class="btns">
                                    <button type="button" class="chat-btn"><ion-icon name="mail"></ion-icon></button>
                                    <button type="button" class="connet-btn">Connect</button>
                                </div>
                            </div>
                            <div class="connect-person">
                                <a href="">
                                    <div class="profile-img">
                                        <img src="{{ asset('assets/images/profile-images/profile-img-3.png') }}" alt="profile-img">
                                    </div>
                                </a>
                                <div class="name-container-people">
                                    <h4 class="name"><a href="">Jane Doe</a></h4>
                                    <p class="username">@jane.doe</p>
                                </div>
                                <div class="person-status">
                                    <ion-icon name="ellipse"></ion-icon>
                                    <p>Admin</p>
                                </div>
                                <div class="btns">
                                    <button type="button" class="chat-btn"><ion-icon name="mail"></ion-icon></button>
                                    <button type="button" class="connet-btn">Connect</button>
                                </div>
                            </div>
                            <div class="connect-person">
                                <a href="">
                                    <div class="profile-img">
                                        <img src="{{ asset('assets/images/profile-images/profile-img-4.png') }}" alt="profile-img">
                                    </div>
                                </a>
                                <div class="name-container-people">
                                    <h4 class="name"><a href="">John Doe</a></h4>
                                    <p class="username">@john.doe</p>
                                </div>
                                <div class="person-status">
                                    <ion-icon name="ellipse"></ion-icon>
                                    <p>Assistant</p>
                                </div>
                                <div class="btns">
                                    <button type="button" class="chat-btn"><ion-icon name="mail"></ion-icon></button>
                                    <button type="button" class="connet-btn">Connect</button>
                                </div>
                            </div>
                            <div class="connect-person">
                                <a href="">
                                    <div class="profile-img">
                                        <img src="{{ asset('assets/images/profile-images/profile-img-5.png') }}" alt="profile-img">
                                    </div>
                                </a>
                                <div class="name-container-people">
                                    <h4 class="name"><a href="">John Doe</a></h4>
                                    <p class="username">@john.doe</p>
                                </div>
                                <div class="person-status">
                                    <ion-icon name="ellipse"></ion-icon>
                                    <p>Student</p>
                                </div>
                                <div class="btns">
                                    <button type="button" class="chat-btn"><ion-icon name="mail"></ion-icon></button>
                                    <button type="button" class="connet-btn">Connect</button>
                                </div>
                            </div>
                        </div>
                        <div class="show-more">
                            <a href="">Show More</a>
                        </div>`
        }

        const selectSectionByID = (clickedBtnID) => {
            const sectionView = views[clickedBtnID];
            profileShowCase.innerHTML = "";
            profileShowCase.insertAdjacentHTML("beforeend", sectionView)
        }
        navBtns.forEach(btn => {
            btn.addEventListener("click", () => {
                const clickedBtnID = btn.id;
                navBtns.forEach(button => {
                    return button.classList.remove("active")
                })
                btn.classList.add("active")
                selectSectionByID(clickedBtnID)
            })
        })
        const DEFAULT_SECTION = "overview"
        document.addEventListener("DOMContentLoaded", () => {
            document.getElementById("overview").classList.add("active")
            selectSectionByID(DEFAULT_SECTION)
        })
    </script>
</body>

</html>;
