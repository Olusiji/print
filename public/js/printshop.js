$( function() {
    // Sends the #sizes form values to the server and recieves the size id pair array
    // $('#new_cover_type').submit(function() {
        
    //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //     var covers = $( this ).serializeArray();
    //     console.log( covers );
    //     $.ajax({
    //         method: "POST",
    //         url: "/vendor/pricing/covers/add_new",
    //         data: { _token: CSRF_TOKEN,  new_covers: covers },
    //         success: function( roles ){
    //             console.log( roles );
    //         }
    //     })  
    //         .done(function( msg ) { alert( "New cover type(s) successful : " + msg ); });
    // }); 




    // Adds a new input field for cover type when add new cover button is clicked
    $('#new_cover').on("click" ,function () {

        $('<input type="text" name="new_cover[]" placeholder="Enter Cover type"><br>').insertBefore( "#new_cover" );

    }) ;


        // Adds a new input field for paper type when add new paper button is clicked
    $('#new_paper').on("click" ,function () {

        $('#cover_types_select').clone().insertBefore( "#new_paper" );

    }) ;


    // Adds a new input field for packaging type when add new cover button is clicked
    $('#new_packaging').on("click" ,function () {

        $('<input type="text" name="new_packaging[]" placeholder="Enter Packaging type"><br>').insertBefore( "#new_packaging" );

    }) ;


    // Deletes a cover type
    $('.delete_cover').on("click", function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var cover = $(this).val();
        $.ajax({
            method: "POST",
            url: "/vendor/pricing/covers/delete",
            data: { _token: CSRF_TOKEN,  cover: cover },
            success: function( msg ){
            }
        })
            .done(function( msg ) { alert( msg + " has been deleted " ); });

        // removes cover type from dom
        $(this).parents('.cover_type').remove();
    });


    // Deletes a paper type
    $('.delete_paper').on("click", function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var paper = $(this).val();
        $.ajax({
            method: "POST",
            url: "/vendor/pricing/papers/delete",
            data: { _token: CSRF_TOKEN,  paper: paper },
            success: function( msg ){
                console.log(msg)
            }
        })
            .done(function( msg ) { alert( msg + " has been deleted " ); });

        // removes cover type from dom
        $(this).parents('.paper_type').remove();
    });



    // Deletes a paper type
    $('.delete_packaging').on("click", function () {

        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var packaging = $(this).val();
        $.ajax({
            method: "POST",
            url: "/vendor/pricing/packaging/delete",
            data: { _token: CSRF_TOKEN,  packaging: packaging },
            success: function( msg ){
                console.log(msg)
            }
        })
            .done(function( msg ) { alert( msg + " has been deleted " ); });

        // removes cover type from dom
        $(this).parents('.packaging_type').remove();
    });


}); 







