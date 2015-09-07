@extends('master')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <blockquote>
            <h1>{{trans('messages.album')}} {{$album->name}}</h1>
            {{$album->description}}
            </blockquote>
        </div>


        @if($album->owner == $currentUser && ! $currentUser->followers->isEmpty() && !($album->sharedWith->count() == $currentUser->followers->count()))
            @include('users.albums.partials.album-share')
        @endif

    </div>

    @unless($album->photos->isEmpty())
        <div class="row">
            <div class="col-md-8 col-md-offset-2">

                <div id="links">
                    @foreach($album->photos as $photo)
                        <a href="{{$photo->path}}" title="{{$album->name}}" data-gallery>
                            <img src="{{$photo->path}}" alt="image" width=100 height=100>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
        <div id="blueimp-gallery" class="blueimp-gallery">
            <!-- The container for the modal slides -->
            <div class="slides"></div>
            <!-- Controls for the borderless lightbox -->
            <h3 class="title"></h3>
            <a class="prev">‹</a>
            <a class="next">›</a>
            <a class="close">×</a>
            <a class="play-pause"></a>
            <ol class="indicator"></ol>
            <!-- The modal dialog, which will be used to wrap the lightbox content -->
            <div class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" aria-hidden="true">&times;</button>
                            <h4 class="modal-title"></h4>
                        </div>
                        <div class="modal-body next"></div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary pull-left prev">
                                < Previous
                            </button>
                            <button type="button" class="btn btn-primary next">
                                Next >

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    @endunless


@endsection




@section('footer')

    @if($album->owner->id == $currentUser->id)
        <footer class="footer">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h4>Add your photos</h4>
                    {!!Form::open(array('route' =>array('store_photo_path', $album->id), 'files' => true, 'class' => 'dropzone', 'id' => 'addPhotosForm'))!!}

                    {!!Form::close()!!}

                </div>
            </div>
        </footer>
    @endif

@endsection

@section('specific_scripts')

    <script type="text/javascript" src="{{asset('/js/bootstrap-multiselect.js')}}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#share-album-multiselect').multiselect();
        });
    </script>
    <script src="/js/dropzone.js"></script>
    <script>
        Dropzone.options.addPhotosForm = {

            paramName: "photo", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            acceptedFiles: ' .jpg, .jpeg, .png, .bmp,',
            addRemoveLinks: true


        }

    </script>


    <script src="{{asset('/blueimp/js/jquery.blueimp-gallery.min.js')}}"></script>
    <script src="{{asset('/blueimp/js/bootstrap-image-gallery.min.js')}}"></script>



@stop