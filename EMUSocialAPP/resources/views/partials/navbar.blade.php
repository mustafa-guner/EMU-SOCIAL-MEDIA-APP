<nav>
    <div class="container">
        <div class="nav-left">
            <a href="/home" class="home-btn" type="button"><ion-icon name="home"></ion-icon></a>
            <div class="search-bar">
                <input type="search" placeholder="Search...">
            </div>
        </div>
        <div class="nav-logo">
            <a href="home"><h1 class="logo">EMU APP</h1></a>
        </div>
        <div class="nav-right">
            <a class="chat-btn" href="/chat" type="button"><ion-icon name="mail"></ion-icon></a>
            <a class="notification-btn" type="button"><ion-icon name="notifications"></ion-icon></a>
            <div class="dropdown">
                <button id="dropdown-btn" class="dropbtn"><ion-icon class="person-icon" name="person" id="person-icon"></ion-icon></button>
                <div id="myDropdown" class="dropdown-content">
                    <a href="/profile">Your Profile</a>
                    <a href="" type="button" data-toggle="modal" data-target="#changePassword" data-whatever="@mdo">Change Password</a>
                    <a href="">Logout</a>
                </div>
            </div>
        </div>
    </div>
</nav>


<!-- Change Password Modal -->
<div id="changePassword" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-change-pwd">
            <div class="modal-header">
                <h1>Change Password</h1>
            </div>
            <div class="close-btn">
                <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="main-content">
                <form action="">
                    <div class="modal-body">
                        <div class="form-elements">
                            <div class="old-pwd">
                                <label for="old-pwd" class="col-form-label old-pwd-lbl">Old Password:</label>
                                <input type="password" class="form-control old-pwd-input" id="old-pwd"
                                    placeholder="Please enter your old password...">
                            </div>
                            <div class="new-pwd">
                                <label for="new-pwd" class="col-form-label new-pwd-lbl">New Password:</label>
                                <input type="password" class="form-control new-pwd-input" id="new-pwd"
                                    placeholder="Please enter your new password...">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-close" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-change-pwd">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>