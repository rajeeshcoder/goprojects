$(document).ready(function(){
         
    /* Action On Manufacturer Select Box Change */
    $('select[name="manufacturer"]').change(function(){
        var id = $(this).val(); // Get Selected Value
         
        // Display Loader
        $('.loader').ajaxStart(function(){
            $(this).removeClass('hide');
        });
        $('.loader').ajaxComplete(function(){
            $(this).addClass('hide');
        });
         
        /* Send Ajax Request on Every
         * Select Box Change Event
         */           
        $.ajax({
            type: 'GET',
            contentType: "application/json; charset=utf-8",
            url: '/api/main/models/id/' + id,
            //data: {'id': id},
            dataType: 'json',
            success: function(data){
                var str = "<option value=''>Please Select</option>";
                 
                $.each(data.models, function(i, item) {
                   // $.each(item.models, function(j, model) {
                        str += "<option value='"+item.id+"'>"+item.title+"</option>";
                    //});    
                });
                 
                $('select[name="model"]').html( str );
            }
        });
         
    });

    $(function() {
        $( "#datepicker" ).datepicker({ dateFormat: 'dd-mm-yy' });
    });
 
});