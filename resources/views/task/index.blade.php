<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/r-2.3.0/datatables.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <title>Task List page </title>
</head>
<body>
    <main class="main-sec" id="main">
        <div class="container">
            <div class="pt-5">
                <div class="text-center mb-4">Task List</div>
                <div class="waiting mb-4">
                    <div class="table-search">
                        <div class="sec-input">
                            <i class="fa-solid fa-magnifying-glass main-icon"></i>
                            <input type="text" id="searchTable" class="input-me input-search"
                                placeholder="Search" />
                        </div>
                    </div>
                </div>
                <div class="shadow-table data mb-5">
                    <table id="myTable" dir="rtl" class="display table text-center" style="width: 100%">
                        <thead class="table-head">
                            <tr>
                                <th class="font14">#</th>
                                <th class="font14">Title</th>
                                <th class="font14">Description</th>
                                <th class="font14">Admin name</th>
                                <th class="font14">Assigned name</th>
                            </tr>
                        </thead>
                        <tbody data-class-name="table-body">

                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{ $task->id }}</td>
                                    <td>{{ $task->title }}</td>
                                    <td>{{ $task->description }}</td>
                                    <td>{{ $task->admin->name }}</td>
                                    <td>{{ $task->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="flex-group-me mt-4">
                    <a href="{{ route('task.statistics') }}" class="main-btn up lg">View Statistics</a>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <!-- Data Table -->
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/r-2.3.0/datatables.min.js"></script>
    <script src="{{ asset('assets/js/select2.js') }}"></script>
    <!--call select2 single-->
    <script>
        $(document).ready(function() {
            $(".main-select").select2({
                dropdownCssClass: "no-search",
            });
        });
    </script>

    <!-- DataTable -->
    <script>
        let myDataTable = document.getElementById("myTable");

        if (myDataTable) {
            var myTable = $("#myTable").dataTable({
                pageLength: 10,
                responsive: true,

                language: {
                    paginate: {
                        previous: `<i class="fa-solid fa-angles-left"></i>`,
                        next: `<i class="fa-solid fa-angles-right"></i>`,
                    },
                },
                bLengthChange: false,
                ordering: false,
            });

            $("#searchTable").on("keyup", function() {
                $("#myTable").DataTable().search($(this).val()).draw();
            });
        }
    </script>
</body>
</html>
