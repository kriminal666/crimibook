<div class="col-md-4 ">

    <div class="media">
        <div class="media-body">
            <h4 class="media-heading">{{$currentUser->name}}'s Albums</h4>
            <ul class="text-muted">
                @foreach($currentUser->albums as $album)
                    <li><a href="{{route('albums.show', $album->id)}}">{{$album->name}}</a></li>
                @endforeach

            </ul>

        </div>
    </div>
</div>