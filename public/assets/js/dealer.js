    $(document).ready(function(){

    /*
    Service related JS starts here.
    */
    var service_status =  { '1' : 'Pickup-Source',
                             '2' : 'Started',
                             '3' : 'Finished',
                             '4' : 'Payment Due',
                             '5' : 'Payment Complete',
                             '6' : 'Pickup Delivery',
                             '7' : 'Feedback',
                             '8' : 'Completed'  
                        };


    $('#service').on('submit','form',function(event){
   // $('form').live('submit', function (event) {
        event.preventDefault();
        //alert('method');
        var name = $("textarea#textbox").val(); 
        var sr_data = $('form[name="sr_form"]').serialize();
        //alert(sr_data);
        
        $.ajax({
           // headers: {
            //    'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
           // },
            type: 'POST',
            url: '/api/main/rule',
            async: 'true',
            data: sr_data, 
            //dataType: 'json',
            success: function (res) { 
                 $('.form').each(function() {
                     $(this).remove();

                    // Get the searialized object;    
                     var tmp = sr_data.split('&'), data_obj = {};
    
                    for (var i = 0; i < tmp.length; i++)
                    {
                        var keyValPair = tmp[i].split('=');
                        data_obj[keyValPair[0]] = keyValPair[1];
                    }
                 
                    service_id = data_obj['service_id'];
                    status_id = (data_obj['next_status_id'])-1;
                    next_status_id = data_obj['next_status_id'];

                    curr_button_id = service_id + '_' + status_id;
                    new_button_id = service_id + '_' + next_status_id; 

                    new_button_label =  service_status[++next_status_id];

                    var new_button = $('<button>', {
                                    'text'  : new_button_label,
                                    'type'  : 'button',
                                    'id'  : new_button_id,
                                    'class' : "btn btn-info btn-mini"  
                                    });    
                    
                    //alert(new_button_label);

                    $('#'+curr_button_id).replaceWith(new_button);    

                 });
            }
        });
        return false;
    });

    $(function() {
         //$('#autobutton').on('click', 'button', function(event){

         $('#service').on('click', 'button', function(event){
        //$('button[type="button"]').on('click', function() { 
       // $('button[type="button"]').click(function() { 
           
           var button_obj_id = $(this).attr('id');

           button_arr = button_obj_id.split('_');
           service_id = button_arr[0];
           status_id = button_arr[1];
           next_status_id = ++status_id;

            $('.form').each(function() {
                $(this).remove();
            });

            
            var my_form = ($('<form>', {
                'name'  : 'sr_form',
                'id'    : service_id,
                'method'   : 'POST'
            }))
            .append($('<label>Description: </label>'))
            .append($('<textarea>', {
                'type': 'textarea',
                'id'  : 'description', 
                'name': 'description',
                'rows': '4',
                'cols': '25'
            }))
            .append($('<input>', {
                'name': 'submit',
                'value': 'Submit',
                'type': 'submit',
                'class' : "btn btn-default"
            }))
            .append($('<button/>', {
                'name': 'Reset',
                'type': 'button',
                'text': 'Cancel',
                'class' : "btn btn-warning btn-mini",
                'click' : function() {
                    $('.form').each(function() {
                        $(this).remove();
                    });
                }
            }))    
            .append($('<input>', {
                'type': 'hidden',
                'id': 'service_id',
                'name': 'service_id',
                'value' : service_id,
            }))
            .append($('<input>', {
                'type': 'hidden',
                'id': 'next_status_id',
                'name': 'next_status_id',
                'value' : next_status_id,
            }));


            my_form.appendTo($('<div>', {
                'class': 'form'
                })
            .appendTo($('#msg_'+service_id))
            );

        });      
    });

    $(function() {
        //$('#quoter').datepicker();
        
        $("#quoter").autocomplete({
            source: "/api/main/quote",
            minLength: 1,
            select: function( event, ui ) {
                        alert(ui.item.value);
                    }
        });
    
    });  

   // $(function() {
        jQuery("#quotegrid").jqGrid({
            onSelectRow: function(rowid) {
                alert("t");
                //$("<body>").append("<p>raj</p>");
            }
        });
 // });

      $(function() {
         //$('#autobutton').on('click', 'button', function(event){

         $('body').on('click', 'a.quoterows', function(event){
            var quoterow_id =  this.parentNode.parentNode.id;
            var row_price = $('#'+quoterow_id).find('.pricerow').text();
            var curr_total = $('#total > td > strong').text();
            var new_total = (curr_total-row_price);
            //alert(curr_total+ "=" +row_price );
            $('#total > td > strong').text(new_total.toFixed(2));
            $('#'+quoterow_id).remove(); 
         });   


      });      

});