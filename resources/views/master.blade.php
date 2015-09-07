<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crimibook</title>
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('/css/libs.css')}}">
    <link rel="stylesheet" href="{{asset('/css/bootstrap-multiselect.css')}}">
    <link rel="stylesheet" href="{{asset('/css/dropzone.css')}}">
    <link rel="stylesheet" href="{{asset('/blueimp/css/blueimp-gallery.min.css')}}">
    <link rel="stylesheet" href="{{asset('/blueimp/css/bootstrap-image-gallery.min.css')}}">


</head>
<body>


<nav class="navbar navbar-inverse navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{url('/')}}">CRIMIBOOK</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="{{url('about')}}">{{trans('messages.about')}}</a></li>
                <li><a href="{{url('contact')}}">{{trans('messages.contact')}}</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if ($currentUser)
                    <li class="dropdown">

                        <a href="#" class="dropdown-toggle user-dropdown" data-toggle="dropdown" role="button"
                           aria-expanded="false">
                            <img class="nav-gravatar media-object avatar" src="{{ $currentUser->present()->gravatar }}"
                                 alt="{{ $currentUser->name }}">
                            {{ $currentUser->name }}
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">

                            <li><a href="{{route('profile_path',$currentUser->name) }}">Your profile</a></li>
                            <li><a href="{{url('users')}}">List users</a></li>
                            <li><a href="{{url('albums/create')}}">New album</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a target="_blank" href="https://es.gravatar.com">Create gravatar</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{ url('/auth/logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @else

                    {!! Form::open(array('url' => ['lang', 'lang'], 'method' => 'post', 'class' => 'lang_form')) !!}
                    <div class="form-group">
                        {!! Form::select('lang', array(''=>'Select language', 'en'=>'English','es'=>'Spanish', 'cat' => 'Catalán'), null, array('onchange' => 'this.form.submit()', 'class' => 'form-control'))!!}
                    </div>
                    {!! Form::close()!!}


                @endif
            </ul>

        </div>
        <!--/.nav-collapse -->

    </div>
</nav>
<div class="container">
    @yield('content')

</div>

@yield('footer')

<script src="{{asset('/js/jquery-2.1.4.min.js')}}"></script>
<script src="{{asset('/js/bootstrap.js')}}"></script>
<script src="{{asset('/js/libs.js')}}"></script>
<script src="{{asset('/js/crimibook.js')}}"></script>
@include('flash')
@yield('specific_scripts')
</body>
</html>