<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/blogpage.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.min.css" integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Create New Blog</title>
</head>

<body>
    @include('partials.navbar')

    <div class="main-container">
        <div class="left-section">
            <div class="page-header">
                <h2>Create New Post</h2>
            </div>
            <form action="">
                <div id="standalone-container">
                    <div class="title-input">
                        <input id="title" type="text" placeholder="Enter your blog title...">
                    </div>
                    <div id="toolbar-container">
                        <span class="ql-formats">
                        <select class="ql-font"></select>
                        <select class="ql-size"></select>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-strike"></button>
                        </span>
                        <span class="ql-formats">
                        <select class="ql-color"></select>
                        <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-script" value="sub"></button>
                        <button class="ql-script" value="super"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-header" value="1"></button>
                        <button class="ql-header" value="2"></button>
                        <button class="ql-blockquote"></button>
                        <button class="ql-code-block"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                        <button class="ql-indent" value="-1"></button>
                        <button class="ql-indent" value="+1"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-direction" value="rtl"></button>
                        <select class="ql-align"></select>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                        <button class="ql-formula"></button>
                        </span>
                        <span class="ql-formats">
                        <button class="ql-clean"></button>
                        </span>
                    </div>
                    <div id="editor-container"></div>
                    <div class="bottom-section">
                        <div class="category-selection">
                            <p>Select Your Post Type:</p>
                            <div class="blog-post-radio">
                                <input type="radio" id="blog-post" name="post-type" checked>
                                <label for="blog-post">Blog Post</label>
                            </div>
                            <div class="job-post-radio">
                                <input type="radio" id="job-post" name="post-type">
                                <label for="job-post">Job Post</label>
                            </div>
                        </div>
                        <div class="buttons">
                            <button id="publish-btn" type="button">Publish</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="right-section">
            <div class="page-header">
                <h2>Your Recent Posts</h2>
            </div>
            <div class="recent-posts-container">
                <div class="recent-post">
                    <h4 class="recent-post-title"><a href="">What is Agile Methodology?</a></h4>
                    <div class="recent-post-date">
                        <p><span>Published:</span> 14.01.23 - 10:08 AM</p>
                    </div>
                    <div class="recent-post-content">
                        <div class="recent-post-image">
                            <img class="" src="https://www.devteam.space/wp-content/uploads/2022/06/Agile-Methodology.jpg" alt="post-image">
                        </div>
                        <p class="desc">The Agile methodology is a way to manage a project by breaking it up into several phases. It involves constant collaboration with stakeholders and continuous improvement at every stage. Once the work begins, teams cycle through a process of planning...</p>
                        <div class="buttons">
                            <a href="" class="recent-post-update-btn"><ion-icon name="create-outline"></ion-icon></a>
                            <button id="delete-btn" class="recent-post-delete-btn"><ion-icon name="trash-outline"></ion-icon></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.min.js" integrity="sha512-IYzd4A07K9kxY3b8YIXi8L0BmUPVvPlI+YpLOzKrIKA3sQ4gt43dYp+y6ip7C7LRLXYfMHikpxeprZh7dYQn+g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/bootstrap-js/bootstrap.min.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <script>
    var quill = new Quill('#editor-container', {
        modules: {
        syntax: true,
        toolbar: '#toolbar-container'
        },
        placeholder: 'Write your blog...',
        theme: 'snow'
    });
    </script>

    <!-- SWALS -->
    <script>
        const removePostBtns = document.querySelectorAll(".recent-post-delete-btn")
        removePostBtns.forEach(function(removePostBtn){
                removePostBtn.addEventListener("click",function(){
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success my-btn-confirm',
                    cancelButton: 'btn btn-danger my-btn-cancel'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure to delete it?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Deleted!',
                    'Your post has been deleted.',
                    'success'
                    )
                } 
                })
            })
        })

        const publishPostBtn = document.getElementById("publish-btn")                
        publishPostBtn.addEventListener("click",function(){
                const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success my-btn-confirm',
                    cancelButton: 'btn btn-danger my-btn-cancel'
                },
                buttonsStyling: false
                })

                swalWithBootstrapButtons.fire({
                title: 'Are you sure to publish it?',
                text: "",
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, publish it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
                }).then((result) => {
                if (result.isConfirmed) {
                    swalWithBootstrapButtons.fire(
                    'Published!',
                    'Your post has been published.',
                    'success'
                    )
                } 
                })
            })
    </script>
    <script src="{{ asset('assets/js/navbar.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/bootstrap-js/bootstrap.min.js') }}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>