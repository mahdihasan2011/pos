@extends('layouts.master')

@section('title', 'Role List')

@section('content')
<div class="content-wrapper">
    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Role <small>( List )</small></h3>
                        <!-- <button type="button"
                            class="btn btn-primary aDD btn-xs float-right"
                            data-toggle="modal" data-target="#add-modal-sm">
                            <i class="fas fa-plus-circle"></i> {{ __('Add New') }}
                        </button> -->
                        <a href="{{ route('role.create') }}" class="btn btn-primary btn-xs float-right">
                            <i class="fas fa-plus-circle"></i> {{ __('Add New') }}
                        </a>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th><i class="fas fa-hashtag"></i></th>
                                    <th>Role Name</th>
                                    <th>Display Name</th>
                                    <!-- <th>Permission(s)</th> -->
                                    <th class="text-center"><i class="fas fa-cog"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $sl = 1 @endphp
                                @forelse($role as $data)
                                <tr>
                                    <td>{{ $sl++ }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->display_name }}</td>
                                    <!-- <td></td> -->
                                    <td class="text-center">
                                    @if( $data->name != 'superadmin' )
                                        <!-- <button type="button" value="{{ $data->id }}"
                                            class="btn btn-info edIT btn-xs"
                                            data-toggle="modal" data-target="#edit-modal-sm">
                                            <i class="fas fa-edit"></i>
                                        </button> -->
                                        <a href="{{ route('role.edit',['id'=>$data->id]) }}" class="btn btn-info btn-xs">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <!-- <button class="btn btn-danger NewDelete btn-xs"
                                            value="{{ $data->id }}"><i class="fas fa-trash-alt"></i>
                                        </button> -->
                                    @endif
                                    </td>
                                </tr>
                                @empty
                                <tr><th colspan=6 class="text-center">{{ __('No record found.') }}</th></tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th><i class="fas fa-hashtag"></i></th>
                                    <th>Role Name</th>
                                    <th>Display Name</th>
                                    <!-- <th>Permission(s)</th> -->
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="adD">
                @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name">Role Name</label>
                                    <input name="name" class="form-control form-control-sm"
                                        type="text" placeholder="Role Name" required>
                                </div>
                                <div class="col-lg-6">
                                    <label for="display_name">Display Name</label>
                                    <input name="display_name" class="form-control form-control-sm"
                                        type="text" placeholder="Display Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            <!-- @foreach($permissions as $key => $permission)
                                @php
                                    $spacelesskey = str_replace(" ", "", $key);
                                @endphp
                                <div class="row">
                                    <div class="col-md-3 controllersName">
                                        <b> {{ $key }} </b>
                                    </div>

                                    <div class="col-md-9 methodsName">

                                        <div class="checkbox-inline"> <label>
                                            @php
                                                $checkAllPb = "";
                                                if(!empty(old('selectall_'.$spacelesskey))) {
                                                    $checkAllPb = "checked";
                                                }
                                            @endphp
                                            <input type="checkbox" name="selectall_{{$spacelesskey}}" id="selectall_{{$spacelesskey}}" class="checkAll" module="{{$spacelesskey}}" value="1" {{$checkAllPb}} >All</label>
                                        </div>

                                        @foreach($permission as $ikey => $value)
                                            <div class="checkbox-inline"> <label>
                                                <input type="checkbox" class="permcheck {{$spacelesskey}}" name="permission[]"  module="{{$spacelesskey}}" value="<?= $ikey ?>" @if(is_array(old('permission')) && in_array($ikey, old('permission'))) checked @endif >{{ $value }}</label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach -->
                            @forelse($permissions as $key => $permission)
                                @php
                                    $spacelesskey = str_replace(" ", "", $key);
                                @endphp
                                <div class="col-lg-4">
                                    <label for="modulename">{{ $key }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="icheck-primary d-inline">
                                        <!-- <input type="checkbox" id="checkboxPrimary0" > -->
                                        <!-- <label for="checkboxPrimary0">All</label> -->
                                        @php
                                            $checkAllPb = "";
                                            if(!empty(old('selectall_'.$spacelesskey))) {
                                                $checkAllPb = "checked";
                                            }
                                        @endphp
                                        <input type="checkbox" name="selectall_{{ $spacelesskey }}"
                                            id="selectall_{{ $spacelesskey }}" class="checkAll"
                                            module="{{ $spacelesskey }}" value="1" {{$checkAllPb}}/>
                                        <label for="selectall_{{ $spacelesskey }}">All</label>
                                    </div>
                                    @foreach($permission as $ikey => $value)
                                    <div class="icheck-primary d-inline">
                                        <!-- <input type="checkbox" id="checkboxPrimary1" >
                                        <label for="checkboxPrimary1">View</label> -->
                                        <input type="checkbox" class="permcheck {{ $spacelesskey }}"
                                            id="{{ $value }}" name="permission[]" module="{{ $spacelesskey }}"
                                            value="<?= $ikey ?>" @if(is_array(old('permission'))
                                            && in_array($ikey, old('permission'))) checked @endif/>
                                        <label for="{{ $value }}">{{ $value }}</label>
                                    </div>
                                    @endforeach
                                    <!-- <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary2" >
                                        <label for="checkboxPrimary2">Add</label>
                                    </div>&nbsp;
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary3" >
                                        <label for="checkboxPrimary3">Edit</label>
                                    </div>&nbsp;
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" id="checkboxPrimary4" >
                                        <label for="checkboxPrimary4">Delete</label>
                                    </div> -->
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <label for="modulename">No module available yet.</label>
                                </div>
                            @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify -content-between">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Add modal Ends-->

    <!--Edit modal Start-->
    <div class="modal fade" id="edit-modal-sm">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="updatE">@csrf
                    <div class="modal-body">
                        <input class="id" type="hidden"/>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name">Role Name</label>
                                    <input class="form-control form-control-sm name"
                                        placeholder="Role Name" readonly>
                                </div>
                                <div class="col-lg-6">
                                    <label for="display_name">Display Name</label>
                                    <input name="display_name" class="form-control form-control-sm display_name"
                                        type="text" placeholder="Display Name">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-lg-4 card-header">
                                    <h3 class="card-title">Modules</h3>
                                </div>
                                <div class="col-lg-8 card-header">
                                    <h3 class="card-title">Permissions</h3>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                            @forelse($permissions as $key => $permission)
                                @php
                                    $spacelesskey = str_replace(" ", "", $key);
                                @endphp
                                <div class="col-lg-4">
                                    <label for="modulename">{{ $key }}</label>
                                </div>
                                <div class="col-lg-8">
                                    <div class="icheck-primary d-inline">
                                        @php
                                            $checkAllPb = "";
                                            if(!empty(old('selectall_'.$spacelesskey))) {
                                                $checkAllPb = "checked";
                                            }
                                        @endphp
                                        <input type="checkbox" name="selectall_{{ $spacelesskey }}"
                                            id="selectall_{{ $spacelesskey }}" class="checkAll"
                                            module="{{ $spacelesskey }}" value="1" {{$checkAllPb}}/>
                                        <label for="selectall_{{ $spacelesskey }}">All</label>
                                    </div>&nbsp;
                                    @foreach($permission as $ikey => $value)
                                    <div class="icheck-primary d-inline">
                                        <input type="checkbox" class="permcheck {{ $spacelesskey }}"
                                            id="{{ $value }}" name="permission[]" module="{{ $spacelesskey }}"
                                            value="<?= $ikey ?>"/>
                                        <label for="{{ $value }}">{{ $value }}</label>
                                    </div>&nbsp;
                                    @endforeach
                                </div>
                            @empty
                                <div class="col-lg-12">
                                    <label for="modulename">No module available yet.</label>
                                </div>
                            @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Edit modal Ends-->
@endsection
@section('customJs')
    <script type="text/javascript">
        $('.checkAll').click(function(){
            var modulename = $(this).attr('module');
            if($(this).prop("checked") == true){
                $("."+modulename).prop("checked", true);
            }
            else if($(this).prop("checked") == false){
                $("."+modulename).prop("checked", false);
            }
        });
        $('.permcheck').click(function(){
            var allChecked  = true;
            var modulename = $(this).attr('module');
            $('.'+modulename).each(function () {
                if(!(this.checked)){
                    allChecked  = false;
                }
            });
            if (allChecked == true) {
                $("#selectall_"+modulename).prop("checked", true);
            } else {
                $("#selectall_"+modulename).prop("checked", false);
            }
        });

    $(document).ready(function () {
        $('.edIT').on('click', function () {
            var id = $(this).val();
            $.ajax({
                type: "GET",
                url: "{{ route('role.edit') }}",
                data: { id: id },
                success: function (data) {
                    $('.id').val(data[0]['id']);
                    $('.name').val(data[0]['name']);
                    $('.display_name').val(data[0]['display_name']);
                }
            });
        });
        $('#updatE').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "",
                data: {
                    '_token'        : $('input[name=_token]').val(),
                    'id'            : $(".id").val(),
                    'display_name'  : $(".display_name").val(),
                    'role'          : $(".role").val(),
                },
                success: function () {
                    $('#edit-modal-sm').modal('hide');
                },
                error: function (error) {
                    console.log(error);
                    alert('Data Not Saved');
                }
            });
        });
    });
</script>
@endsection
