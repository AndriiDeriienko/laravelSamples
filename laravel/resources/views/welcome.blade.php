<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous"
    >

    <style>
        .pointer {
            cursor: pointer;
        }
    </style>

    <title>Laravel Trial</title>
</head>
<body>

<div class="container-fluid">
    <br>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <span class="navbar-brand pointer">Laravel Trial</span>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li id="users-li" class="nav-item active">
                    <span class="nav-link pointer">Users</span>
                </li>
                <li id="posts-li" class="nav-item">
                    <span class="nav-link pointer">Posts</span>
                </li>
            </ul>
        </div>
    </nav>

    <br>
    <br>

    <div id="usersTable"></div>
    <div id="postsTable"></div>

    <div class="modal fade" id="userModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 id="user-model-title" class="modal-title">Create User</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="user-name"
                            name="name"
                            placeholder="Enter name"
                            autocomplete="off"
                        >
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input
                            type="email"
                            class="form-control"
                            id="user-email"
                            name="email"
                            placeholder="Enter email"
                            autocomplete="false"
                        >
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="user-password"
                            name="password"
                            placeholder="Password"
                            autocomplete="off"
                        >
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button
                        type="button"
                        class="btn btn-primary create-user-button"
                        style="display: none;"
                    >Create</button>
                    <button
                        type="button"
                        data-user-id="0"
                        class="btn btn-primary save-user-changes-button"
                        style="display: none;"
                    >Edit</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="postModal" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add new Post</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

</div>


<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"
    integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg=="
    crossorigin="anonymous"
></script>
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"
></script>
<script
    src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"
></script>

<script src="{{ \Illuminate\Support\Facades\URL::asset('js/state.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/users/templates.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/users/actions.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/users/events.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/posts/templates.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/posts/actions.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/posts/events.js') }}"></script>
<script src="{{ \Illuminate\Support\Facades\URL::asset('js/custom-spa.js') }}"></script>
</body>
</html>
