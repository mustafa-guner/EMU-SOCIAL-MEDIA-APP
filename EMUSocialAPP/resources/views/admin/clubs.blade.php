<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/sl-1.5.0/sr-1.2.0/datatables.min.css" />
    <title>Admin | Clubs</title>


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
            <h2>Clubs</h2>
            <p class="section-description">You can review all the data in social app under the overview section.</p>
        </div>



        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Office</th>
                    <th>Age</th>
                    <th>Start date</th>
                    <th>Salary</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Tiger Nixon</td>
                    <td>System Architect</td>
                    <td>Edinburgh</td>
                    <td>61</td>
                    <td>2011-04-25</td>
                    <td>$320,800</td>
                </tr>
                <tr>
                    <td>Garrett Winters</td>
                    <td>Accountant</td>
                    <td>Tokyo</td>
                    <td>63</td>
                    <td>2011-07-25</td>
                    <td>$170,750</td>
                </tr>
                <tr>
                    <td>Ashton Cox</td>
                    <td>Junior Technical Author</td>
                    <td>San Francisco</td>
                    <td>66</td>
                    <td>2009-01-12</td>
                    <td>$86,000</td>
                </tr>
            </tbody>
        </table>


        <script src="{{ asset('assets/js/navbar.js') }}"></script>
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.1.min.js"
            integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
        <script type="text/javascript"
            src="https://cdn.datatables.net/v/dt/dt-1.13.1/b-2.3.3/fh-3.3.1/r-2.4.0/sb-1.4.0/sl-1.5.0/sr-1.2.0/datatables.min.js">
        </script>
        <script src="{{ asset('assets/js/bootstrap-js/bootstrap.min.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#example').DataTable({
                    stateSave: true,
                });
            });
        </script>

</body>

</html>
