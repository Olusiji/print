$( function() {
            
    // variable for size id pair
    var vendor_sizes;

    // Adds a new input field for size when add new size button is clicked
    $('#new_size').on("click" ,function () {

        $('<input type="text" name="width" placeholder="Enter Width"> By <input type="text" name="height" placeholder="Enter Height"><br>').insertBefore( "#new_size" );
    }) ;

    // Sends the #sizes form values to the server and recieves the size id pair array
    $('#sizes').submit(function() {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var sizesAll = $( this ).serializeArray();
        $.ajax({
            method: "POST",
            url: "/vendor/pricing/sizes",
            data: { _token: CSRF_TOKEN,  sizes: sizesAll },
            success: function( resp ){
                console.log( resp );
                // stores the size id pair return from server
                vendor_sizes = resp;
                $.each( vendor_sizes, function( key, value ) {
                    console.log( key + ": " + value );
                });
            }
        })  
            .done(function( msg ) { alert( "Data Saved: " + msg ); });
    }); 


    

    // Sends the #sizes form values to the server and recieves the size id pair array
    $('#new_cover_type').submit(function() {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        var cono = $( this ).serialize();
        console.log( cono );
        $.each( cono, function( key, value ) {
            console.log(value.value);
        });
        // $.ajax({
        //  method: "POST",
        //  url: "/vendor/covers/add_new",
        //  data: { _token: CSRF_TOKEN,  new_covers: newCovers },
        //  success: function( resp ){
        //      console.log( resp );
        //      // stores the size id pair return from server
        //      // vendor_sizes = resp;
        //      // $.each( vendor_sizes, function( key, value ) {
  //        //          console.log( key + ": " + value );
        //      // });
        //  }
        // })  
        //  .done(function( msg ) { alert( "Data Saved: " + msg ); });
    }); 










    for ($i=0, $a = count($covers); $i < ; $i++) 
        { 
            // Checks if cover exist in cover table 
            // returns null when it does not exist
            $table_cover = Cover::where('cover_type', '=', $covers[$i])->first();
            if ($table_cover === null) 
            {
               // Creates a new entries for all cover sizes for a particular cover type on the covers table  
                for ($j=0, $b = count($sizes); $j < $b; $j++) 
                { 
                    $new_cover = Cover::create([ 'cover_type' => $covers[$i], 'vendor_id' => $id, 'size_id' => $sizes[$j] ]);
                }
            }
        }
















    // Adds a new input field for cover type when add new cover button is clicked
    $('#new_cover').on("click" ,function () {

        $('<input type="text" name="cover" placeholder="Enter Cover type"><br>').insertBefore( "#new_cover" );

    }) ;


    // Sends the #sizes form values to the server and recieves the size id pair array
    $('#covers').submit(function() {
        
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        // retrives data from the form
        var coversAll = $( this ).serializeArray();

        console.log(coversAll);
        $.each( coversAll, function( key, value ) {
            console.log(value.value);
        });

        
        // stores the id of the last input
        var last_id;
        // iterates through the data structure 
        $.each( coversAll, function( key, value ) {
            console.log(value.value);
            console.log(vendor_sizes);
            $('<form action="#" method="post" id="'+ value.value + '" onsubmit="return false;">').insertAfter( "#coverpricing" );
            

            $('<input id="' + key + '" type="submit" name="Done">').insertAfter( "#" + last_id);
            $('<form>').insertAfter( "#" + key );

        });


        $.each( coversAll, function( key, value ) {
            $.each( vendor_sizes, function( size, id ) {
                var test = " '#" + value.value + "'";
                $('<input type="text" name="' + id + '" placeholder="Enter price for'+ size +' "><br>').insertAfter( "#" + value.value );
                last_id = "#" + value.value;
                console.log(last_id);

            });
        });

    }); 







