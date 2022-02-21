@extends('layouts.master')

@section('title', 'Role Edit')

@section('content')
<div class="content-wrapper">
    <section class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Role Edit</h3>
                        <a href="{{ route('role.index') }}" class="btn btn-warning btn-xs float-right">
                            <i class="fas fa-step-backward"></i> {{ __('Back') }}
                        </a>
                    </div>
                    <form class="form-horizontal" action="{{ route('role.update') }}" method="post">
                    @csrf
                        <div class="card-body">
                            <div class="container">
                                <input name="id" value="{{ $role->id }}" type="hidden"/>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label for="name">Role Name</label>
                                            <input name="name" class="form-control form-control-sm @error('name') is-invalid @enderror"
                                                type="text" value="{{ $role->name }}" placeholder="Role Name" required>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="col-lg-6">
                                            <label for="display_name">Display Name</label>
                                            <input name="display_name" class="form-control form-control-sm  @error('display_name') is-invalid @enderror"
                                                type="text" value="{{ $role->display_name }}" placeholder="Display Name">
                                            @error('display_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
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
                                                @php
                                                    $checked = "";
                                                    if((is_array(old('permission')) && in_array($ikey, old('permission'))) || (in_array($ikey, $role_permissions))) {
                                                        $checked = "checked";
                                                    }
                                                @endphp
                                            <div class="icheck-primary d-inline">
                                                <input type="checkbox" class="permcheck {{ $spacelesskey }}"
                                                    id="{{ $value }}" name="permission[]" module="{{ $spacelesskey }}"
                                                    value="<?= $ikey ?>" {{ $checked }}/>
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
                        </div>
                        @can('role_update')
                        <div class="card-footer text-center">
                            <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                            <button type="submit" class="btn btn-success btn-sm">Update</button>
                        </div>
                        @endcan
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('customJs')
<script type="text/javascript">
    $('.permcheck').each(function(){
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
</script>
@endsection
