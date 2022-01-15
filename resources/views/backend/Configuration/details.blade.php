@extends('layouts.master')
@section('title')
    Company Information
@endsection
@section('content')
<div class="content-wrapper">

    <section class="content pt-2">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                        <div class="card-header p-2">
                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#information" data-toggle="tab">
                                        Company Information
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#details" data-toggle="tab">
                                        Edit Information
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <div class="active tab-pane" id="information">
                                    <div class="timeline timeline-inverse">
                                        @foreach ($info as $data)
                                        {{--  <div class="time-label">
                                            <span>
                                                <img src="{{ asset($data->logo) }}"
                                                    alt="&nbsp; Company Logo" style="height: 50px;">
                                            </span>
                                        </div>  --}}
                                        {{--  <div>
                                            <i class="fas fa-camera bg-purple"></i>
                                        </div>  --}}
                                        <div>
                                            <i class="fas fa-camera bg-purple"></i>
                                            <div class="timeline-item">
                                                <div class="timeline-header">
                                                    <img src="{{ asset($data->logo) }}"
                                                        alt="&nbsp; Company Logo"
                                                        style="border-radius: 50%; height: 50px;">
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-university bg-primary"></i>
                                            <div class="timeline-item">
                                                {{--  <span class="time"><i class="far fa-clock"></i> 12:05</span>  --}}
                                               {{-- <h3 class="timeline-header">
                                                    <a href="#" style="color: blue;">{{ $data->title }}</a>
                                                </h3>--}}
                                                <h3 class="timeline-header">
                                                    <a href="#" style="color: skyblue;">{{ $data->name }}</a>
                                                </h3>
                                                {{--  <div class="timeline-body">
                                                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                    weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                    jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                    quora plaxo ideeli hulu weebly balihoo...
                                                </div>  --}}
                                                {{--  <div class="timeline-footer">
                                                    <a href="#" class="btn btn-primary btn-sm">Read more</a>
                                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                                </div>  --}}
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-phone bg-orange"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header border-0 p-2">
                                                    <a href="#" style="color: orange;">{{ $data->phone }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-envelope bg-warning"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header border-0 p-2">
                                                    <a href="#" style="color:rgb(255, 208, 0);">{{ $data->email }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fas fa-globe bg-red"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header border-0 p-2">
                                                    <a href="#" style="color: red;">{{ $data->website }}</a>
                                                </h3>
                                            </div>
                                        </div>
                                        <div>
                                            <i class="fa fa-map-marker bg-info"></i>
                                            <div class="timeline-item">
                                                {{--  <span class="time"><i class="far fa-clock"></i> 27 mins ago</span>  --}}
                                                {{--  <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>  --}}
                                                <div class="timeline-header">{{ $data->address }}</div>
                                                {{--  <div class="timeline-footer">
                                                    <a href="#" class="btn btn-warning btn-flat btn-sm">View comment</a>
                                                </div>  --}}
                                            </div>
                                        </div>
                                        @if ($data->invoice_note)
                                        <div>
                                            <i class="fa fa-comments bg-gray"></i>
                                            <div class="timeline-item">
                                                <div class="timeline-header">{{ $data->invoice_note }}</div>
                                            </div>
                                        </div>
                                        {{--  @else   --}}
                                        @endif
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                        @break
                                        @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane" id="details">
                                    @foreach ($info as $data)
                                    <form action="{{ route('company.update') }}" method="POST"
                                        enctype="multipart/form-data">@csrf
                                        <input name="id" value="{{ $data->id }}" type="hidden"/>
<!--                                        <div class="form-group row">
                                            <label class="col-sm-2">Title</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="title" required
                                                    class="form-control form-control-sm"
                                                    value="{{ $data->title }}"
                                                    placeholder="Company Title">
                                            </div>
                                        </div>-->
                                        <div class="form-group row">
                                            <label class="col-sm-2">Name</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="name" required
                                                    class="form-control form-control-sm"
                                                    value="{{ $data->name }}"
                                                    placeholder="Company Name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Phone</label>
                                            <div class="col-sm-10">
                                                <input type="number" name="phone" required
                                                    class="form-control form-control-sm"
                                                    value="{{ $data->phone }}"
                                                    placeholder="Company Phone">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Email</label>
                                            <div class="col-sm-10">
                                                <input type="email" name="email"
                                                    class="form-control form-control-sm"
                                                    value="{{ $data->email }}"
                                                    placeholder="Company Email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Website</label>
                                            <div class="col-sm-10">
                                                <input type="text" name="website"
                                                    class="form-control form-control-sm"
                                                    value="{{ $data->website }}"
                                                    placeholder="Company Website">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Address</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="address"
                                                    class="form-control form-control-sm"
                                                    value=""
                                                    placeholder="Company Address">{{ $data->address }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Invoice Note</label>
                                            <div class="col-sm-10">
                                                <textarea type="text" name="invoice_note"
                                                    class="form-control form-control-sm"
                                                    value=""
                                                    placeholder="Invoice Note">{{ $data->invoice_note }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-2">Logo</label>
                                            <div class="col-sm-10">
                                                <input type="file" name="logo"
                                                    class="form-control form-control-sm"
                                                    placeholder="Company Logo">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="offset-sm-2 col-sm-10">
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </section>

</div>
@endsection
@section('customJs')
@endsection
