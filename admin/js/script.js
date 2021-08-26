$(document).ready(function(){

    //ckeditor script.
    ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {console.error( error );} );

    //the rest of the code.
});