<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css.map') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.12.1/b-2.2.3/r-2.3.0/datatables.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/select2.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    <title> New Task </title>
</head>
<body>
    <main class="main-sec" id="main">
        <div class="container">
            <div class="pt-5">
                <div class="main-form mb-5">
                    <form method="POST" action="{{ route('task.create') }}"class="store form-horizontal" novalidate>
                      @csrf
                        <div class="text-center mb-4"> Add New Task By Convertedin</div>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <div class="mb-3 main-input-cont">
                                    <h6 class="mb-2 font14">Title </h6>
                                    <input type="test" name="title" class="main-input" required/>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <div class="main-input-cont mb-3">
                                    <h6 class="mb-2 font14">

                                        Admin Name :
                                    </h6>
                                    <select name="admin_id" class="main-select" required>
                                        <option value> Choose Admin Name</option>

                                        @foreach ($admins as $admin)
                                        <option value="{{$admin->id}}">{{$admin->name}}
                                        </option>
                                    @endforeach
                                    </select>
                                    <div class="main-float gray-col">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12 mb-3">
                                <div class="main-input-cont mb-3">
                                    <h6 class="mb-2 font14">
                                        Assigned User :
                                    </h6>
                                    <select name="user_id" class="main-select" required>
                                        <option value="" selected disabled>
                                           Choose Assigned User
                                        </option>

                                        @foreach ($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                    @endforeach
                                    </select>
                                    <div class="main-float gray-col">
                                        <i class="fa-solid fa-angle-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-3">
                                <div class="main-input-cont">
                                    <h6 class="mb-2 font14"> Description</h6>
                                    <textarea name="description" id="" rows="5" class="main-textarea" required
                                        placeholder= "Description"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="flex-group-me mt-4">
                            <button type="submit" class="main-btn up lg">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

    <script src="{{ asset('assets/js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
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
</body>
</html>
