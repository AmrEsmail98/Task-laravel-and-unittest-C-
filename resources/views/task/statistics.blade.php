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

    <title>Top Users page </title>
</head>

<body>

    <main class="main-sec" id="main">
        <div class="container">
            <div class="pt-5">
                <div class="text-center mb-4">Top 10 users with highest tasks</div>

                <div class="shadow-table mb-5">
                    <table class="display table text-center" style="width: 100%">
                        <thead class="table-head">
                            <tr>
                                <th>Task Count</th>
                                <th>Name</th>
                            </tr>
                        </thead>
                        <tbody data-class-name="table-body">
                            @foreach ($topUsers as $user)
                                <tr>
                                    <td>{{ $user->tasks_count }}</td>
                                    <td>{{ $user->user->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if ($topUsers->count() == 0)
                        <div class="d-flex flex-column w-100 align-center mt-4">
                            <span class="mt-2"
                                style="font-family: cairo">There is no data recorded </span>
                        </div>
                    @endif
                </div>
                <div class="flex-group-me mt-4">
                    <a href="{{ route('new.task') }}" class="main-btn up lg"> Add New Task</a>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
