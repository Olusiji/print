$( function() {
            
     


    

    // Sends the #sizes form values to the server and recieves the size id pair array
    $('#new_cover_type').submit(function() {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var covers = $( this ).serializeArray();
        console.log( covers );
        $.ajax({
            method: "POST",
            url: "/vendor/covers/add_new",
            data: { _token: CSRF_TOKEN,  new_covers: covers },
            success: function( roles ){
                console.log( roles );
            }
        })  
            .done(function( msg ) { alert( "Data Saved: " + msg ); });
    }); 




    // Adds a new input field for cover type when add new cover button is clicked
    $('#new_cover').on("click" ,function () {

        $('<input type="text" name="new_cover" placeholder="Enter Cover type"><br>').insertBefore( "#new_cover" );

    }) ;


}); 






