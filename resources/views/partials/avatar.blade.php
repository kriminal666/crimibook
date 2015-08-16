<a href="{{route('profile_path',$user->name) }}">

    <img class="nav-gravatar media-object avatar" src="{{ $user->present()->gravatar(isset($size) ? $size : 30) }}"
         alt="{{ $user->name }}">

</a>