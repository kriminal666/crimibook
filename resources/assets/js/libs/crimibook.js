function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
});

$( ".img" ).click(function() {
    var width = $(this).css("width");
    var height = $(this).css("height");
    if (width == "200px")
    {
        $( this ).css( "width","90%" );
        $( this).css( "height","150%" );

    } else{

        $( this ).css( "width","200" );
        $( this).css( "height","200" );
    }


});

$('.comments__create-form').on('keydown', function(e){

    //Check if enter was pressed
    if(e.keyCode == 13) {

        e.preventDefault();
        $(this).submit();

    }

});