<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/chat.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">
    <title>Chats</title>
</head>
<body>
    @include('partials.navbar')
    
    <div class="main-container">
        <div class="left-section">
            <div class="page-header">
                <h2>Chat</h2>
            </div>
            <div class="left-section-container">
                <div class="chat-container">
                    <form action="">
                        <div class="chat-people-top">
                            <div class="people-profile-img">
                                <img src="https://media.istockphoto.com/id/1338134336/photo/headshot-portrait-african-30s-man-smile-look-at-camera.jpg?b=1&s=170667a&w=0&k=20&c=j-oMdWCMLx5rIx-_W33o3q3aW9CiAWEvv9XrJQ3fTMU=" alt="">
                            </div>
                            <a href="">
                                <h4 class="name">Hasan Reponsive</h4>
                            </a>
                            <hr>
                        </div>
                        <div class="chat-people-mid">
                            <div class="chat-area-container">
                                <label class="sent-message" for="">Naban kuzii duvumcuklav?</label>
                                <label class="income-message" for="">Yebb bro. Nolsun aha kosturma. Sen naan cuz?</label>
                            </div>
                        </div>
                        <div class="char-people-bot">
                            <div class="chat-textarea-section">
                                <textarea name="message" id="message" placeholder="Text here..."></textarea>
                                <button type="button"><ion-icon name="send"></ion-icon></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="right-section">
            <div class="page-header">
                <h2>All Chats</h2>
            </div>
            <div class="right-section-container">
                <form action="">
                    <div class="chats-header-section">
                        <p class="total-chat-number">Total 12 Chats</p>
                        <div class="title-input">
                            <input id="title" type="text" placeholder="Search among your friends...">
                        </div>
                    </div>
                    <div class="chats-selection-section">
                        <div class="select-all-checkbox">
                            <input id="select-all" type="checkbox">
                            <label for="select-all">Select all</label>
                        </div>
                        <button class="remove-chats-btn">Remove</button>
                    </div>
                    <div class="chat-people">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                            <ion-icon name="ellipse"></ion-icon>
                        </div>
                    </div>
                    <div class="chat-people-seen">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                        </div>
                    </div>
                    <div class="chat-people">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                            <ion-icon name="ellipse"></ion-icon>
                        </div>
                    </div>
                    <div class="chat-people-seen">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                        </div>
                    </div>
                    <div class="chat-people">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                            <ion-icon name="ellipse"></ion-icon>
                        </div>
                    </div>
                    <div class="chat-people">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                            <ion-icon name="ellipse"></ion-icon>
                        </div>
                    </div>
                    <div class="chat-people">
                        <div class="person-container">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="chat-desc">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis officia provident natus ducimus...</p>
                            </div>
                            <p class="chat-date">5 hours ago</p>
                            <ion-icon name="ellipse"></ion-icon>
                        </div>
                    </div>
                </form>
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