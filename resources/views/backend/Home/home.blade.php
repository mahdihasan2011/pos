@extends('layouts.master')
@section('title', 'Home')
@section('content')
<div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-columns">
                        <div class="card">
                            <img class="card-img-top img-fluid" height="300px;" src="{{ !empty(Auth::user()->image) ? asset(Auth::user()->image) : asset('public/master/dist/img/user2-160x160.jpg') }}" alt="{{ Auth::user()->name }}">
                            <div class="card-body">
                                <h4 class="card-title">Name : {{ Auth::user()->name }}</h4>
                                <p class="card-text">Email : {{ Auth::user()->email }}</p>
                                <p class="card-text"><small class="text-muted">Role : {{ Auth::user()->role_user->roles->display_name }}</small></p>
                                <p class="card-text"><input type="file" name="image"/></p>
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
<script>
    // import { create, registerPlugin } from 'filepond';
    // import 'filepond/dist/filepond.css';
    // // Import the Image Preview plugin
    // import FilePondPluginImagePreview from 'filepond-plugin-image-preview';
    // Register the plugin with FilePond
    // registerPlugin(FilePondPluginImagePreview);
    // Get a reference to the file input element
    // const inputElement = document.querySelector('input[name="image"]');
    // // Create a FilePond instance
    // const pond = FilePond.create(inputElement);
    // FilePond.setOptions({
    //     server: {
    //         headers: {
    //             // 'X_CSRF_TOKEN': '{{ csrf_token() }}'
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         },
    //         // url: '/image-upload',
    //         url:  "{{ route('image.upload') }}",
    //         type: "POST",
        
    //     }
    // });
    // create(input, {
    //     server: '/upload',
    //     // Only accept images
    //     acceptedFileTypes: ['image/*'],
    //     files: [
    //         {
    //             // the server file reference
    //             source: '12345',
    //             // set type to local to indicate an already uploaded file
    //             options: {
    //                 type: 'local',
    //                 // file initial metadata
    //                 metadata: {
    //                     date: '2018-10-5T12:00',
    //                 },
    //             },
    //         },
    //     ],
    // });
    // get the data of the first file
    // const date = pond.getFile().getMetadata('date');
</script>
@endsection