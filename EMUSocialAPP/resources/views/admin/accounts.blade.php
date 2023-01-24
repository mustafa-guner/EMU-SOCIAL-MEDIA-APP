<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/sl-1.5.0/sr-1.2.0/datatables.min.css" />
    <title>Admin | Users</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.css"
        integrity="sha512-72McA95q/YhjwmWFMGe8RI3aZIMCTJWPBbV8iQY3jy1z9+bi6+jHnERuNrDPo/WGYEzzNs4WdHNyyEr/yXJ9pA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Logo font -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!--Custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--Navbar styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminnavbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">

    <!--Admin styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">

    <!--Sweet Alert -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.min.css"
        integrity="sha512-NvuRGlPf6cHpxQqBGnPe7fPoACpyrjhlSNeXVUY7BZAj1nNhuNpRBq3osC4yr2vswUEuHq2HtCsY2vfLNCndYA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.0/sweetalert2.min.js"
        integrity="sha512-IYzd4A07K9kxY3b8YIXi8L0BmUPVvPlI+YpLOzKrIKA3sQ4gt43dYp+y6ip7C7LRLXYfMHikpxeprZh7dYQn+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!--Modal Styles-->
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <!--Moment Library for dates-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <!--Admin Js-->
    <script src="{{ asset('assets/js/admin.js') }}"></script>


</head>

<body>
    @include('partials.adminnavbar')


    <div id="edit-user-modal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div id="modal-content-details" class="modal-dialog modal-lg  modal-dialog-centered"></div>
    </div>
    <nav>
        <div class="container dflex">
            <div class="nav-left">
                <div class="nav-logo">
                    <a href="/admin/overview">
                        <h1 class="logo">EMU APP</h1>
                    </a>
                </div>
                <ul class="navbar-links">
                    <li class="navbar-item ">
                        <a href="/admin/overview" class="navbar-link">Overview</a>
                    </li>
                    <li class="navbar-item active">
                        <a href="/admin/accounts" class="navbar-link">Users</a>
                    </li>
                    <li class="navbar-item">
                        <a href="/admin/clubs" class="navbar-link">Clubs</a>
                    </li>
                </ul>


            </div>

            <div class="nav-right end">
                <button type="button">
                    <ion-icon name="notifications"></ion-icon>
                </button>
                <button type="button">
                    <ion-icon name="person"></ion-icon>
                </button>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="admin-panel-header">
            <h2>Accounts</h2>

        </div>


        <div class="table-container">
            <div class="table-container-header">
                <h3>All Users </h3>
                <div class="section-count">
                    {{ count($users) }} users
                </div>
            </div>
            <table id="example" class="display " style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Email Address</th>
                        <th>Academic Career</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr id={{ $user->_id }}>
                            <td class="user-image">
                                <div class="profile-image">
                                    <img src={{ $user->profileImage }} />
                                </div>
                                <div class="fullname">
                                    <span> {{ $user->firstname }} </span>
                                    <span> {{ $user->lastname }} </span>
                                </div>
                            </td>
                            @if ($user->isActive == 1)
                                <td class="status active"><span><i class="fa fa-circle" aria-hidden="true"></i>
                                        Active</span></td>
                            @else
                                <td class="status pending"><span><i class="fa fa-circle" aria-hidden="true"></i>
                                        Pending</span></td>
                            @endif
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->userType }}</td>

                            <!--Actions-->
                            <td class="action-btns">
                                <button id="removeUserBtn" onclick="openRemoveSwall('{{ $user->_id }}',false);"
                                    class="remove-btn btn"><i class="fa fa-times" aria-hidden="true"></i></button>
                                <button id="user-edit-btn-{{ $user->_id }}" data-target="#edit-user-modal"
                                    data-toggle="modal" onclick="getUserByID('{{ $user->_id }}');" type="button"
                                    class="edit-btn btn"><i class="fa fa-pencil" aria-hidden="true"></i></button>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



        <script src="{{ asset('assets/js/navbar.js') }}"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="{{ asset('assets/js/bootstrap-js/bootstrap.min.js') }}"></script>

        <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/sl-1.5.0/sr-1.2.0/datatables.min.js">
        </script>
        <script src="{{ asset('assets/js/bootstrap-js/bootstrap.min.js') }}"></script>

        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    stateSave: true,
                    "lengthChange": false,
                    "info": false
                });
            });
        </script>


</body>

</html>
