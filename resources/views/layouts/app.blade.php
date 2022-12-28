<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- fontawesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
        <!-- boostrap core css  -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <!-- Toastr css -->
        <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">

        <!-- include summernote css -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    </head> 
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- list active -->
            @php
                $route = Route::current()->getName();
                
            @endphp

            <div class="container mt-3">
                <div class="row">
                    <div class=" col-lg-3">
                        <ul class=" list-group">
                            <a href="{{ route('category')}}" class=" list-group-item list-group-item-action {{ ($route == 'category') ? 'active' : '' }}">Category</a>
                            <a href="{{ route('AddCategory')}}" class=" list-group-item list-group-item-action {{ ($route == 'AddCategory') ? 'active' : '' }}">Add Category</a>

                            <!-- Tag -->
                            <a href="{{ route('tag') }}" class=" list-group-item list-group-item-action {{ ($route == 'tag') ? 'active' : '' }}">Tag</a>
                            <a href="{{ route('create_tag') }}" class=" list-group-item list-group-item-action {{ ($route == 'create_tag') ? 'active' : '' }}">Create Tag</a>

                            <!-- Post -->
                            <a href="{{ route('post') }}" class=" list-group-item list-group-item-action {{ ($route == 'post') ? 'active' : '' }}">Post</a>
                            <a href="{{ route('create_post') }}" class=" list-group-item list-group-item-action {{ ($route == 'create_post') ? 'active' : '' }}">Create Post</a>
                            <a href="{{ route('trashed_post') }}" class=" list-group-item list-group-item-action {{ ($route == 'trashed_post') ? 'active' : '' }}">All Trashed Post</a>

                            <!-- User -->

                            @if(Auth::user()->admin)
                            <a href="{{ route('user') }}" class=" list-group-item list-group-item-action {{ ($route == 'user') ? 'active' : '' }}">User</a>
                            <a href="{{ route('create_user') }}" class=" list-group-item list-group-item-action {{ ($route == 'create_user') ? 'active' : '' }}">Create User</a>
                            @endif

                            <!-- User -->
                            <a href="{{ route('profile') }}" class=" list-group-item list-group-item-action {{ ($route == 'profile') ? 'active' : '' }}">My Profile</a>
                            <a href="{{ route('edit_profile') }}" class=" list-group-item list-group-item-action {{ ($route == 'edit_profile') ? 'active' : '' }}">Edit Profile</a>
                            
                            <!-- Setting -->
                            <a href="{{ route('setting') }}" class=" list-group-item list-group-item-action {{ ($route == 'setting') ? 'active' : '' }}">Setting</a>
                        </ul>
                    </div>
                    <div class=" col-lg-9">
                        @yield('content')
                    </div>
                </div>
            </div>

           

        @stack('modals')

        @livewireScripts

        <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

        <!-- bootstrap js file  -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        

        <!-- Toastr js -->
        <script src="{{ asset('js/toastr.min.js') }}"></script>       
        <script type="text/javascript">
            @if(Session::has('success'))
                toastr.success("{{ Session::get('success') }}");
            @endif

            @if(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}");
            @endif
        </script> 
        
        <!-- include summernote js -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#content').summernote({
                    

                    placeholder: "What's on your mind?",
                    tabsize: 2,
                    height: 120,
                    toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });
            });
        </script>

    </body>
</html>
