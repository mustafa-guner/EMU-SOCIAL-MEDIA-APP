<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('assets/css/home.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/club.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">
    <title>Profile</title>
</head>
<body>
    @include('partials.navbar')
    
    <section id="main-section">
        <div class="left-section">
            <div class="profile-container">
                <div class="profile-bg-img">
                    <img src="{{$profile["coverimage"]}}" alt="bg-image">
                </div>
                <div class="profile-informations">
                    <div class="profile-img">
                        <img src="{{$user["profileimg"]}}" alt="profile-img">
                    </div>
                    <div class="infos">
                        <h1>{{$user["clubname"]}}</h1>
                        <div class="icons">
                            <div class="contact-number"><ion-icon name="people"></ion-icon>{{$profile["membernumber"]}}</div>
                            <div class="status"><ion-icon name="gift"></ion-icon>{{$profile["eventnumber"]}}</div>
                            <div class="status"><ion-icon name="mail"></ion-icon>{{$profile["postnumber"]}}</div>
                        </div>
                        <div class="desc">
                            <p>{{$profile["desc"]}}</p>
                        </div>
                    </div>
                    <div class="buttons">
                        <button class="edit-btn" type="button" data-toggle="modal" data-target="#edit-profile-modal"><ion-icon name="settings"></ion-icon></button>
                        <div class="common-connect">
                            <div class="common-images">
                                @foreach ($profile["commonconnects"] as $key => $commonconnect)
                                    @if($key+1 < 4 )
                                        <div class="img-{{$key+1}}"><img src="{{$commonconnect["profileimage"]}}" alt="profile-img"></div>
                                    @endif
                                @endforeach
                            </div>
                            <a href="">{{count($profile["commonconnects"])}} common connect</a>
                        </div>
                        <div class="main-btns">
                            <button><ion-icon name="link"></ion-icon><p>Joined</p></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="bottom-section">
                <div class="profile-section-container">
                    <div class="profile-section-header"><h2>Members</h2></div>
                    <div class="profile-section-friends-content">
                        @foreach($profile["clubmembers"] as $clubmember)
                            <div class="connect-person">
                                <a href="">
                                    <div class="profile-img">
                                        <img src="{{$clubmember['profileimage']}}" alt="profile-img">
                                    </div>
                                </a>
                                <div class="name-container-people">
                                    <h4 class="name"><a href="">{{$clubmember['fullname']}}</a></h4>
                                    <p class="username">{{$clubmember['username']}}</p>
                                </div>
                                <div class="person-status">
                                    <ion-icon name="ellipse"></ion-icon>
                                    <p>{{$clubmember['usertype']}}</p>
                                </div>
                                <div class="btns">
                                    <button type="button" class="chat-btn"><ion-icon name="mail"></ion-icon></button>
                                    <button type="button" class="connet-btn">Connect</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="show-more">
                        <a href="">Show More</a>
                    </div>
                </div>
                <div class="bottom-right-section">
                    <div class="new-post-container">
                        <div class="new-post-header"><h2>Welcome, {{$user["clubname"]}}!</h2></div>
                        <div class="new-post-input-container">
                            <div class="new-post-profile-img">
                                <img src="{{$user["profileimg"]}}" alt="profile-img">
                            </div>
                            <div class="new-post-text">
                                <input type="text" placeholder="What do you think {{$user["clubname"]}}?">
                            </div>
                        </div>
                        <div class="new-post-buttons">
                            <button type="button" class="uploud-image-btn"><ion-icon name="image"></ion-icon></button>
                            <button type="button" class="post-share-btn"><ion-icon name="send"></ion-icon></button>
                        </div>
                    </div>
                    @foreach($posts as $post)
                        <div class="post-container">
                            <div class="top-part">
                                <button type="button" class="edit-btn"><ion-icon name="ellipsis-horizontal"></ion-icon></button>
                            </div>
                            <div class="main-content">
                                <div class="post-profile-img">
                                    <a href="">
                                        <img src="{{$post["posterimage"]}}" alt="profile-img">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <a href="" class="name"><h4>{{$post["postername"]}}</h4></a>
                                    <p class="description">{{$post["postdesc"]}}</p>
                                </div>
                                <p class="post-time">{{$post["posttime"]}}</p>
                            </div>
                            <div class="likes-and-comments">
                                <h4 class="likes"><ion-icon name="heart-circle"></ion-icon>{{count($post["postlikes"])}} Likes</h4>
                                <a href="" class="comments"><h4><ion-icon name="chatbubble"></ion-icon>{{count($post["postcomments"])}} Comments</h4></a>
                            </div>
                            <div class="post-btns">
                                <hr>
                                <div class="btns">
                                    <button type="button" class="post-btn like-btn"><ion-icon name="heart-outline"></ion-icon> Like</button>
                                    <button type="button" class="post-btn comment-btn"><ion-icon name="chatbubble-outline"></ion-icon> Comment</button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div> 
                <div class="club-about-section">
                    <h1>About Club</h1>
                    <div class="club-desc">
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas illo error, sunt assumenda cumque veritatis perspiciatis, laboriosam soluta debitis iusto dolore, accusantium sed praesentium voluptatum alias corrupti atque eos repudiandae.</p>
                    </div>
                    <hr>
                    <div class="club-status-container">
                        <ion-icon name="globe-outline"></ion-icon>
                        <div class="club-status">
                            <h2>Public Club</h2>
                            <p>Our club is public and it is a club that all users can join.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Edit Profile Modal -->
    <div id="edit-profile-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content modal-edit-profile">
                <div class="modal-header">
                    <h1>Profile Edit</h1>
                </div>
                <div class="close-btn">
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="main-content">
                    <form action="">
                        <div class="profile-image-section">
                            <div class="top-section">
                                <div class="header">
                                    <h2>Profile Image</h2>
                                </div>
                                <div class="edit-btn">
                                    <input id="profile-image" type="file" style="visibility: hidden;">
                                    <label for="profile-image">Edit</label>
                                </div>
                            </div>
                            <div class="content">
                                <label for="profile-image" class="profile-img">
                                    <img src="{{asset('assets/images/profile-images/profile-img-4.png')}}" alt="profile image">
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div class="cover-image-section">
                            <div class="top-section">
                                <div class="header">
                                    <h2>Cover Image</h2>
                                </div>
                                <div class="edit-btn">
                                    <input id="profile-image" type="file" style="visibility: hidden;">
                                    <label for="profile-image">Edit</label>
                                </div>
                            </div>
                            <label for="profile-image" class="content">
                                <div class="cover-img">
                                    <img src="{{asset('assets/images/profile-bg-img.jpg')}}" alt="profile image">
                                </div>
                            </label>
                        </div>
                        <hr>
                        <div class="desc-section">
                            <div class="top-section">
                                <div class="header">
                                    <h2>Description</h2>
                                </div>
                            </div>
                            <label for="profile-image" class="content">
                                <div class="desc-textarea">
                                    <textarea name="profile-desc" id=""></textarea>
                                </div>
                            </label>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-save-changes">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap-js/bootstrap.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>