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
            <div class="dropdown-notifications">
                <button id="dropdown-btn-notifications" class="dropbtn-notifications"><ion-icon class="notifications-icon" name="notifications" id="notifications-icon"></ion-icon></button>
                <div id="myDropdown-notifications" class="dropdown-content-notifications">
                    <div class="header">
                        <p>Notifications</p>
                        <a href="" class="see-all-btn" type="button" data-toggle="modal" data-target="#notificationsModal" data-whatever="@mdo">See all</a>
                    </div>
                    <div class="all-notifications">
                        <div class="standart-notification">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="notification-content">Shared a new post.</p>
                            </div>
                            <p class="notification-date">12 minutes ago</p>
                        </div>
                        <div class="standart-notification">
                            <div class="profile-img">
                                <img src="https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/profile-photos-4.jpg" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Jane Doe</a></h4>
                                <p class="notification-content">Left a comment on your post.</p>
                            </div>
                            <p class="notification-date">5 hours ago</p>
                        </div>
                        <div class="friend-request-notification">
                            <div class="profile-img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYWUkEL1XR499IQVhszheazJEYsjaatBePRGDSYGDm6eB9hxPvIA7-XG1c0L723OPorvU&usqp=CAU" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Jane Doe</a></h4>
                                <p class="notification-content">Wants to connect with you.</p>
                            </div>
                            <p class="notification-date">3 day ago</p>
                            <div class="buttons">
                                <a href="" class="cancel"><ion-icon name="close-outline"></ion-icon></a>
                                <a href="" class="confirm"><ion-icon name="checkmark-outline"></ion-icon></a>
                            </div>
                        </div>
                        <div class="standart-notification">
                            <div class="profile-img">
                                <img src="data:image/png;base64,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" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Photography Club</a></h4>
                                <p class="notification-content">Shared a new announcement.</p>
                            </div>
                            <p class="notification-date">12 day ago</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown-person">
                <button id="dropdown-btn-person" class="dropbtn-person"><ion-icon class="person-icon" name="person" id="person-icon"></ion-icon></button>
                <div id="myDropdown-person" class="dropdown-content-person">
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

<!-- Notifications Modal -->
<div id="notificationsModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
    aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content modal-notification">
            <form action="">
                <div class="modal-header">
                    <h1>All Notifications</h1>
                </div>
                <div class="close-btn">
                    <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-selection-section">
                    <div class="select-all-checkbox">
                        <input id="select-all" type="checkbox">
                        <label for="select-all">Select all</label>
                    </div>
                    <p class="total-notifications-number">Total 546 Notifications</p>
                    <button class="remove-notifications-btn">Remove</button>
                </div>
                <div class="modal-main-content">
                    <div class="all-notifications">
                        <div class="standart-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="notification-content">Shared a new post.</p>
                            </div>
                            <p class="notification-date">12 minutes ago</p>
                        </div>
                        <div class="standart-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/profile-photos-4.jpg" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Jane Doe</a></h4>
                                <p class="notification-content">Left a comment on your post.</p>
                            </div>
                            <p class="notification-date">5 hours ago</p>
                        </div>
                        <div class="friend-request-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYWUkEL1XR499IQVhszheazJEYsjaatBePRGDSYGDm6eB9hxPvIA7-XG1c0L723OPorvU&usqp=CAU" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Jane Doe</a></h4>
                                <p class="notification-content">Wants to connect with you.</p>
                            </div>
                            <div class="buttons">
                                <a href="" class="cancel"><ion-icon name="close-outline"></ion-icon></a>
                                <a href="" class="confirm"><ion-icon name="checkmark-outline"></ion-icon></a>
                            </div>
                            <p class="notification-date">3 day ago</p>
                        </div>
                        <div class="standart-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="data:image/png;base64,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" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Photography Club</a></h4>
                                <p class="notification-content">Shared a new announcement.</p>
                            </div>
                            <p class="notification-date">12 day ago</p>
                        </div>
                        <div class="standart-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://media.istockphoto.com/id/1309328823/photo/headshot-portrait-of-smiling-male-employee-in-office.jpg?b=1&s=170667a&w=0&k=20&c=MRMqc79PuLmQfxJ99fTfGqHL07EDHqHLWg0Tb4rPXQc=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">John Doe</a></h4>
                                <p class="notification-content">Shared a new post.</p>
                            </div>
                            <p class="notification-date">12 minutes ago</p>
                        </div>
                        <div class="standart-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://expertphotography.b-cdn.net/wp-content/uploads/2020/08/profile-photos-4.jpg" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Jane Doe</a></h4>
                                <p class="notification-content">Left a comment on your post.</p>
                            </div>
                            <p class="notification-date">5 hours ago</p>
                        </div>
                        <div class="friend-request-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRYWUkEL1XR499IQVhszheazJEYsjaatBePRGDSYGDm6eB9hxPvIA7-XG1c0L723OPorvU&usqp=CAU" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Jane Doe</a></h4>
                                <p class="notification-content">Wants to connect with you.</p>
                            </div>
                            <div class="buttons">
                                <a href="" class="cancel"><ion-icon name="close-outline"></ion-icon></a>
                                <a href="" class="confirm"><ion-icon name="checkmark-outline"></ion-icon></a>
                            </div>
                            <p class="notification-date">3 day ago</p>
                        </div>
                        <div class="standart-notification">
                            <input type="checkbox">
                            <div class="profile-img">
                                <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAPoAAADJCAMAAAA93N8MAAABnlBMVEX///+2TWYjjb2TyNrmfJD40JDfU3clu9h3daNjZJbognF1plnhX1P2wG6Vx3aPj7Pb5bryuF7fVEJIqcvng2VZtXdpV375+fn636zuqJ7toICJi4uBhITs7Oy+v7/l5eWmqKianJy4ubn2zpR2d4DQ0dGFxZSio6qHh67i6sf63afmfZG6u8BKS1mQkpmxsrIAhbkuq2Xlc4myQFyl0eBpanVWWGSgoaFqoEnq6vH65+SrrLGMjZTa2907Pk4cIDeSy6NsbZxZWpH99ur75LpvY4273uvc2+f42+H99PbeRm/54d7smnjg8Pbqj3Dpi3gzN0jE6/St4e6T2Ohy0ORNx9+QvdfQ4Me92Lpqrs/h7NuewIw/r9GHsm8vl8Ncrmewy6KjosB9xdu/vtOgzIO32KLKytq11JTM3qp3s2qdnb1juH797tpgS3Wbz6qzrb6Ed5jzw8vrl5nsm6vvrbjsm5vjZILxuMDDW2zUa2r3yH/ial/zxsLdRzPldHPNgpO9YnfzwbLkb1nTXV7urJrRcHbxu7UAACQhJTsAABBLU34DAAANQElEQVR4nO2c/UMTRx6HF2IAebUJukCSzS5kCSVgFCVRIEFFqZEXY30rNqKNtVd7XlssgjZWW70W77++me+87mbDIZCky83zA8bJ7mSe/czbbhRNUygUCoVCoVAoFAqFQqFQKBQKhUKhUCgUCoVC8bdk5daXt+/cxdy5d35xpdnNaRy32wXhM5jwvcVmN6ru3P9K0/SypL7eCiD9taNs/+DrCxdGkXpAmJdaBWda7+nNbmJ9uP/wQldXF1Y/f9cdOpM/cxTlH4B41yNIPeAVOiHQ7IYeOl+DeFfXWaJ+1zP01vXw+WY39LB50EV5RtXZROcSB3O974tmt/fweHyBqT+i6jT2sCQeRuA5PtbXcfybZrf4kNAfcvOus0y97Ozv62FmfrFvrKPjcsfFZrf6MOCdHfo7Uw/IkxwRp+Z9HZjL3zW73QfnQW+vUH8k1Ms8dCrOzMc6iPuTZrf8oCBzSf2sUA/QSY6Jh2+ho78Y4+q+d8fmvQ+l/n72Erp3CZDYw5J4Cd/CYPO+jo4j4b7QCzD1k7J6oH0di5dKJTzsuflYx9Fw/5aoPxT9XVKXb2K4uQgd498F/mlvrxw7muTOnrzE1UtO8+/AXFa/fPyyX3f093ud6qi/nxTqZaGOBam56O/HEVf6mu2wP/TeXof7M2wu1NdKHuZ9PHDCFX8O96cu9UfYXKiHS5L5E2o+JnsDvtzWff+t0/2sQ71M1e/iQ5k5bGKPOxhrssX++Pz7f0jqz8Ccq4eJutv8uJsr/tzRfn7iBLN/2PXopKxeJupg/hPv7adOVaV+vKPJEp/MwlX8E7kz+66TDvU1tJtpb7+DD/qGz+2nENfo5C5i99tMNxAU7sj+295nVP1Hoo43r7I5nt+unWLujuh9FvtCMDguu5848dShXsbqZXzAN/yOhZifwp3eYe+z0X41GBwZcLqPyurYHB5G/cB3MdycufOO769JPogYcOb+ePSfXL0szNn2TTKnnV5E76e1/TlWH3G5j4I7U8fmF8eQ2mXg2r8Ibnds76uJbiAIsTvdH4M7qJNHMghdv3jx4heIJ0+e/IT4oe/nn3++hnvAZTrW0WXxVY8fCZLYne6jCFAvh/f49Rq+MvjC1LOth8tCMEhjd7j/iN2x+l7Nfchzqj6C3cdxCdnbYPWvNO1WtfnSxsbGdWCmUCj49S5dY0OdxD4QFO6XiLoHhcEXqSknx46lUr9gNjc3Nxra/IMwwtTHsbpw/76mOnIfHHxxzJutthszjWz+AdCDQSn2ccn9Uk11cEfRu6xTKSTe1nbjegObfxAWhPo4qHP3p6Oj92udNYPdB1+mHOJTWBypbzau9QdCUg8Sde6+izp1F/0eibcxUg1r/MF4HpRjHw9K7o93UdeWqDtET3o6Y6pRbT8g4z2O2IOy+27qwh3Jy+JtbVsNavpBGenp6flVxB6U3X/cTV3bnuLj/JXDfcsnSz1WR/LUXizy+L0Tu6prm9z9dUvLK0m90JCWH5jxHgrIj4873B/sfu4vzL3SguDR+0V9oEeA7Lk6ca9J4Q3+Sd1TldctwJav1K9+1iPLw95uZGQccXW30wqrxJ2qV1oor3w01p871Hs+64G9/AC/j6tBYSiE3XXY1KTedr9qEfJ+meEd6p8Bv47/b/fCUP9vS/jPFFHnsSPeNazxB2PBLQ6Q6Mef1zxtZnkoFGLuSF2K/Zxf1LVfq7xJ9MFd3ZH6e+I+g2L/s7v7g1DfbmDrD0TQS5x1/JruSH05FArh+9MlNM13S7Gf88udG57iPcVJx6/ljtRx7OB+fQqrv+ax++V+XVsY2ZWBane8di0h9VWk3o3X8OtTSL2bmf/eaIPGsYL/KThWH+pm7m+6pdh9M8t9MivwhcQbrN4fYu5/hbrZ+nbOP8/mPpEV8l3MH/1IHU90od8qeAAMhvhE55uhjkbq60ql0kl5QZ6qbm5ub29vYN4sEWZmQAmZl4l6P53okDt+42WIxu6n/j6DNp8fuhlvyb0Yf8rMH0i8wGsWMg8HqHo/Wd+Qeyeu5mYIYvdXf3+Hw3pdoe4Vx7NGLj7FzNdA/d/94P7e4Q7bGp/cthE2zpH7jg/U/ljKZf4yNcXNw2Wh3r+8GiLuN3E9nSh2/+xigYK46yL2b5n7S/bcEcxvlbB6QFLvp+rM/YOvJjnM5rkWyV50+pfsaTMxby9B6LJ6/3vm/hIVFio+C12OndvjTv+CPWan5u3tELqsvtyJLpTk/qevRjpGjp3YV94ee8G+XOHmVeqrQ50wQsB9sNkW+0L/vcXNKz7ZCfN26O9CfXXoZmcnXRh8677hjn2rjT9pFubtELpQHxrq5OqI3/5qtsa+eCe7w2NlD/N2tKhL6ss49M6KcA/50r0gBw5PlFPV5u3Q30F9CDayWF2KvdtnKxvl+jkROHxnmKo2by8FhPrqEPR3KXZ/hq6RWV769ohkjmMU5u1lpq4v4zu3m+SWh6nfbLbCvnnn+Mow5WEuqa8us9C5esV3azpH37ohfUeecpiXSmgnt74W4OpDQ0K94ueBTihsOUPHLoulEv0vjeutrQGuXhgS/Z3EDl/G+JcCzx2HDuZhId667lJn5jh2n5sjo6kbfJKTzcn/Yi471XnoKHbfmyN+AfetYynJnP6ffRa6l/oRMNe07RvQ3/FsvSiLt7auudSF+U0/z3ASM2jAC3Ppt5KUZfVlEfp7f962eLI9xczlX8fC+ztV55kvNbu9h82iU1zq71h9hqm/H/TJP6HYO4uu378jhU7Uob+/PyqjXGax9YxTPSyp60gdxI9cXycsrp+R7ctOdWQ+eAQTZ6zca+X2Un8PBJD64BENXLByfq0VfrMgm+TK5bu3bzW7VQ1DX1y8d698B3H79pe3/o9+taRCoVAoFAqFojnoeiwWi8dzuZyNMCYos4wk5jRijpDgTH8K/CxaDa4RquYfRD/YMHA7UHPicdQwvW6POHQubcjGySQTFrJUIUOZlMjXRjqKnem4FvQqWEnpMtBLwC9AveQVCoVCoVAoFPWlfttYQiIPW8XpSffnTNqugtlisZiYqKogOe1VbbxYfaQ2nUA/7ElXqZ4vFjPJ6g1rsjh5ularD4XM/Cz6mdvJV6kb7qZkJiYS81WtOZ3wqnZup7pYz+wkNc2oUp9PTiSLmZyr2N4xZovuy3+oZIoZHWe/B3XI7KO7iZ7qseJs0X0gUp9DhR7q+MiMu5okOu50VR2HSeb05IQWm58t7k0dHe8q9lSfzWiJOXehnjHmMrXU7byry+fmMxP1vW3LzKK2J6ftvapXGXmp65mEMTcZryqd0PLJ6rEO6vq8+/BcYn66vqkn40W7aO9ZfdI9fXmp2zvFj8WPSVcpVrc/JjPuYlCfyLuK0Z26nndXcahkklpmMq/tVX2u6jgv9Wk8KpIZV3/F6trpvKd67uOsq3gO1TtdV3W0gNj/SWrGvFsp7443mU9M54vubqnNTSYSCadkbgcfFfvoqkGHHpOv7vDT05n5qpnBLiYSO3Ud7BPokqMLHq9ahmfd1yKeTM56LNa5ZDLpKqaVGe6lCaatqk/SZ1HFVVcUuc95LPYKhUKh2DNpy7LSMBXHLO8J1Rjed+W2ucubsXQkatmwjuiWa4a30/v+zL1jmbadjuJPike81c39qxvZ2u/ZyDtnROF661GXumHt+zP3joU3bTa2RuqxHLeP5Whr9GyaFOq5HF/q4+hA8iRB10ipKImJcw1Tj+doofhJaojCFdWtiM7UdXEkuma8krph4RbEInGsbkWjUbp9NdFLCCQejUSg0EAlEbJJ0fGB6QguzaFXcNnQnyaUGBacC+02LFQewVv0LPQrKdysSV+I1NNZeJmDE7OsAXVUx80djuq4YVkUYRTsTNwNzAjEYA7jP2z8hgHv6hY6EOkTdRO9G8MRxix414ji09L4gqDX6Jg0risHhSb/WD0i35QR9WGTvzRwW/RspK6PqCzLNEmbSSbZYXgZ45eFjnUSOLTOhhbFqDp+DXmhvgPqpL0W6QHMUkfvxaJC1zm6q9VJJZG6PqWxsoZhgyiZ5qgcvJeGedbkQwIfo7NiIgdpalkyTLKgbpJzTfZat6DYcsxdusOqWj0rNaBeWPzeVFInWZIewNQhMQh8OEsaL9TNtNAxLDJMTGZA1FHklmxr0sk/Zute6uQqZfe/uOwBi9cuqVMt0kFJh4emkvI4jA87KtRt6BM2Hetk9MBsJdQ103KM3Fg0TYYNfB711XElcamSuk7ybnUyFaHZyx6msz2LNGIbEZKoER220xEpdbQgGLYZoWMdnWuQpUtWz0WdEeaiEXQOzJJscYtY6EQ61tFHDEfrGrp0U61DDDnyd7TVMumkZNMjDIv22JiRMyPpOOnHwyRKO2ulUTk+zETnZsm5Obh4BmQXc++YdFRhOkc/Gt7Thy0zNxyDE2Mmb8DfCD2C+4FdY/NXawcnrWw+Jh6JmJFojYWHTnNu5JXN19h0QfRA935Dr/e2VKFQKBQKhUKhUCgUCoVCoVAoFAqFQqFQKBQKhUJRk/8CtHrUf+Hp61gAAAAASUVORK5CYII=" alt="profile-img">
                            </div>
                            <div class="name-container-people">
                                <h4 class="name"><a href="">Photography Club</a></h4>
                                <p class="notification-content">Shared a new announcement.</p>
                            </div>
                            <p class="notification-date">12 day ago</p>
                        </div>
                    </div>
                </div>
            </form>  
        </div>
    </div>
</div>