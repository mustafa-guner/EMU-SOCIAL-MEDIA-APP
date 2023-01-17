<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/sl-1.5.0/sr-1.2.0/datatables.min.css" />
    <title>Admin | Overview</title>


    <!--Logo font -->
    <link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!--Custom styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!--Navbar styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminnavbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/modal.css') }}">

    <!--Admin styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
</head>

<body>
    @include('partials.adminnavbar')

    <div class="container">
        <div class="admin-panel-header">
            <h2>Overview</h2>
            <p class="section-description">You can review all the data in social app under the overview section.</p>
        </div>
        <div class="overview-cards">
            <div class="overview-card">
                <div class="overview-card-body">
                    <div class="overview-card-icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    <div class="overview-amount ">
                        527
                    </div>
                    <div class="overview-subtitle ">
                        Total no of users
                    </div>
                    <a class="overview-link">
                        Go to users
                    </a>
                </div>
                <div class="overview-card-footer">
                    <div class="status">
                        <h5 class="status-subtitle">
                            Active:
                        </h5>
                        <p class="status-amount active">490</p>
                    </div>
                    <div class="status">
                        <h5 class="status-subtitle">
                            Inactive:
                        </h5>
                        <p class="status-amount inactive">490</p>
                    </div>
                </div>
            </div>
            <div class="overview-card">
                <div class="overview-card-body">
                    <div class="overview-card-icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    <div class="overview-amount ">
                        527
                    </div>
                    <div class="overview-subtitle ">
                        Total no of users
                    </div>
                    <a class="overview-link">
                        Go to users
                    </a>
                </div>
                <div class="overview-card-footer">
                    <div class="status">
                        <h5 class="status-subtitle">
                            Active:
                        </h5>
                        <p class="status-amount active">490</p>
                    </div>
                    <div class="status">
                        <h5 class="status-subtitle">
                            Inactive:
                        </h5>
                        <p class="status-amount inactive">490</p>
                    </div>
                </div>
            </div>
            <div class="overview-card">
                <div class="overview-card-body">
                    <div class="overview-card-icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    <div class="overview-amount ">
                        527
                    </div>
                    <div class="overview-subtitle ">
                        Total no of users
                    </div>
                    <a class="overview-link">
                        Go to users
                    </a>
                </div>
                <div class="overview-card-footer">
                    <div class="status">
                        <h5 class="status-subtitle">
                            Active:
                        </h5>
                        <p class="status-amount active">490</p>
                    </div>
                    <div class="status">
                        <h5 class="status-subtitle">
                            Inactive:
                        </h5>
                        <p class="status-amount inactive">490</p>
                    </div>
                </div>
            </div>
            <div class="overview-card">
                <div class="overview-card-body">
                    <div class="overview-card-icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </div>
                    <div class="overview-amount ">
                        527
                    </div>
                    <div class="overview-subtitle ">
                        Total no of users
                    </div>
                    <a class="overview-link">
                        Go to users
                    </a>
                </div>
                <div class="overview-card-footer">
                    <div class="status">
                        <h5 class="status-subtitle">
                            Active:
                        </h5>
                        <p class="status-amount active">490</p>
                    </div>
                    <div class="status">
                        <h5 class="status-subtitle">
                            Inactive:
                        </h5>
                        <p class="status-amount inactive">490</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="admin-panel-header">
            <h2>Recent Activities</h2>
            <p class="section-description">You can review all the data in social app under the overview section.</p>
        </div>

        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="{{ asset('assets/js/navbar.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/sl-1.5.0/sr-1.2.0/datatables.min.js">
        </script>
        <script src="{{ asset('assets/js/bootstrap-js/bootstrap.min.js') }}"></script>

</body>

</html>
