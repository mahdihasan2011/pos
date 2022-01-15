@extends('layouts.master')

@section('title', 'User Role')

@section('content')
    <div class="content-wrapper">
        <section class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">User Role Table</h3>
                            <button type="button" class="btn btn-primary aDD btn-xs float-right" data-toggle="modal" data-target="#add-modal-sm">
                                <i class="fas fa-plus-circle"></i> {{ __('Add New User') }}
                            </button>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag"></i></th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Role</th>
                                    <th class="text-center"><i class="fas fa-cog"></i></th>
                                </tr>
                                </thead>
                                <tbody>
                                @php $sl = 1 @endphp
                                @forelse($user as $data)
                                    @if( $data->role != 'superadmin' )
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->role_name }}</td>
                                        <td class="text-center">
                                            @if( $data->role != 'superadmin' )
                                                <button type="button" value="{{ $data->id }}" class="btn btn-primary
                                                edIT btn-xs" data-toggle="modal" data-target="#role-modal-sm"
                                                        title="Update User">
                                                    <i class="fas fa-pencil-alt"></i>
                                                </button>
                                                <button type="button" value="{{ $data->id }}" class="btn btn-info
                                                btn-xs user_pass" data-toggle="modal" data-target="#password-modal-sm" title="Change Password">
                                                    <i class="fas fa-unlock-alt"></i>
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                    @endif
                                @empty
                                    <tr>
                                        <th colspan=6 class="text-center">{{ __('No record found.') }}</th>
                                    </tr>
                                @endforelse
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th><i class="fas fa-hashtag"></i></th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Role</th>
                                    <th class="text-center"><i class="fas fa-cog"></i></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!--Add modal Start-->
    <div class="modal fade" id="add-modal-sm">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="useradd">@csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select name="role" id="role" class="form-control form-control-sm">
                                <option value="">--- Select Role ---</option>
                                @foreach ($role as $data)
                                    <option value="{{ $data->name }}">{{ $data->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input id="name" name="name" class="form-control form-control-sm" type="text"
                                   placeholder="User Name" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="email">User Email</label>
                            <input id="email" name="email" class="form-control form-control-sm" type="email"
                                   placeholder="User Email" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" name="password" class="form-control form-control-sm" type="password"
                                   placeholder="Password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" name="password_confirmation" class="form-control
                            form-control-sm" type="password" placeholder="Confirm Password" autocomplete="off">
                        </div>
                    </div>
                    <div class="modal-footer justify -content-between">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm userSave">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add modal Ends-->

    <!--Edit modal Start-->
    <div class="modal fade" id="role-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit User Info</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE"> @csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <label for="name">User Name</label>
                            <input name="name" class="form-control form-control-sm name" placeholder="User Name"/>
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control form-control-sm role">
                                <option value="">--- Select Role ---</option>
                                @foreach ($role as $data)
                                    <option value="{{ $data->name }}">{{ $data->display_name }}</option>
                                    {{--@if( $data->name = 'superadmin' )
                                        <option disabled="disabled" value="{{ $data->name }}">{{ $data->display_name }}</option>
                                    @else
                                        <option value="{{ $data->name }}">{{ $data->display_name }}</option>
                                    @endif--}}
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit modal Ends-->
    <!--Password modal Start-->
    <div class="modal fade" id="password-modal-sm">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="change_password"> @csrf
                    <div class="modal-body">
                        <input class="uid" name="id" type="hidden"/>
                        <div class="form-group">
                            <label for="old_password">Old Password</label>
                            <input id="old_password" name="old_password" type="password" class="form-control
                            form-control-sm old_password" placeholder="Old Password" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input id="password" name="password" type="password" class="form-control form-control-sm password"
                                   placeholder="New Password" autocomplete="off"/>
                        </div>
                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" name="password_confirmation" type="password" class="form-control
                            form-control-sm password-confirm" placeholder="Confirm Password" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success btn-sm passconfirm">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Password modal Ends-->
@endsection
@section('customJs')
    <script>
        $(document).ready(function () {
            $('#useradd').on('submit', function (e) {
                e.preventDefault();
                $('#useradd').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        role: {
                            required: true,
                        },
                        email: {
                            required: true,
                            email: true,
                        },
                        password: {
                            required: true,
                            minlength: 6,
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 6,
                            equalTo: "#password"
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter user name",
                        },
                        role: {
                            required: "Please select user role",
                        },
                        email: {
                            required: "Please enter user email",
                            email: "Please enter a valid email address",
                        },
                        password: {
                            required: "Please enter password",
                            minlength: "Password minimum 6 characters needed",
                        },
                        password_confirmation: {
                            required: "Please enter password confirmation",
                            minlength: "Password minimum 6 characters needed",
                            equalTo: "Password must be matched",
                        },
                    },
                    submitHandler: function(form) {
                        let formData = new FormData(document.getElementById("useradd"));
                        $('.userSave').html('Submitting...');
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.role.add') }}",
                            data: formData,
                            dataType: 'JSON',
                            processData: false,
                            contentType: false,
                            success: function (response) {
                                $('.userSave').html('Save');
                                // $('#example1').DataTable().ajax.reload();
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 4000
                                });
                                $(function () {
                                    Toast.fire({
                                        type: '' + response.type + '',
                                        title: '&nbsp; ' + response.message + ''
                                    })
                                });
                                if (response.type === 'success') {
                                    $('#add-modal-sm').modal('hide');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 3000);
                                }
                            },
                            error: function (response) {
                                $('.userSave').html('Save');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function () {
                                    Toast.fire({
                                        type: '' + response.type + '',
                                        title: '&nbsp; ' + response.message + ' '
                                    })
                                });
                            }
                        });
                    }
                })
            });
            $('.edIT').on('click', function () {
                let id = $(this).val();
                $.ajax({
                    type: "GET",
                    url: "{{ route('user.role.edit') }}",
                    data: {id: id},
                    success: function (data) {
                        $('.id').val(data.id);
                        $('.name').val(data.name);
                        $('.role').val(data.role);
                    }
                });
            });
            $('#updatE').on('submit', function (e) {
                e.preventDefault();
                $('#updatE').validate({
                    rules: {
                        name: {
                            required: true,
                        },
                        role: {
                            required: true,
                        },
                    },
                    messages: {
                        name: {
                            required: "Please enter user name",
                        },
                        role: {
                            required: "Please select user role",
                        },
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.role.update') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id': $(".id").val(),
                                'name': $(".name").val(),
                                'role': $(".role").val(),
                            },
                            success: function (response) {
                                $('#role-modal-sm').modal('hide');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function () {
                                    Toast.fire({
                                        type: 'success',
                                        title: '&nbsp; User role info update Successfully... '
                                    })
                                });
                                setTimeout(function () {
                                    location.reload();
                                }, 2000);
                            },
                            error: function (error) {
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function () {
                                    Toast.fire({
                                        type: 'error',
                                        title: '&nbsp; User not updated !! '
                                    })
                                });
                            }
                        });
                    }
                })
            });
            $('#change_password').on('submit', function (e) {
                e.preventDefault();
                $('#change_password').validate({
                    rules: {
                        old_password: {
                            required: true,
                            minlength: 6,
                        },
                        password: {
                            required: true,
                            minlength: 6,
                        },
                        password_confirmation: {
                            required: true,
                            minlength: 6,
                            equalTo: ".password"
                        },
                    },
                    messages: {
                        old_password: {
                            required: "Please enter old password",
                            minlength: "Old password minimum 6 characters needed",
                        },
                        password: {
                            required: "Please enter new password",
                            minlength: "New password minimum 6 characters needed",
                        },
                        password_confirmation: {
                            required: "Please enter new password confirmation",
                            minlength: "Confirm password minimum 6 characters needed",
                            equalTo: "Confirm Password must be matched",
                        },
                    },
                    submitHandler: function(form) {
                        $('.passconfirm').html('Updating...');
                        $.ajax({
                            type: "POST",
                            url: "{{ route('user.change.password') }}",
                            data: {
                                '_token': $('input[name=_token]').val(),
                                'id': $(".uid").val(),
                                'old_password': $(".old_password").val(),
                                'password': $(".password").val(),
                                'password_confirmation': $(".password-confirm").val(),
                            },
                            success: function (response) {
                                $('.passconfirm').html('Confirm');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 4000
                                });
                                $(function () {
                                    Toast.fire({
                                        type: '' + response.type + '',
                                        title: '&nbsp; ' + response.message + ''
                                    })
                                });
                                if (response.type === 'success') {
                                    $('#password-modal-sm').modal('hide');
                                    setTimeout(function () {
                                        location.reload();
                                    }, 3000);
                                }
                            },
                            error: function (response) {
                                $('.passconfirm').html('Confirm');
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top',
                                    showConfirmButton: false,
                                    timer: 3000
                                });
                                $(function () {
                                    Toast.fire({
                                        type: '' + response.type + '',
                                        title: '&nbsp; ' + response.message + ' '
                                    })
                                });
                            }
                        });
                    }
                })
            });
        });
    </script>
@endsection
