@extends('dealer._layouts.default')
 


@section('main')
 
<div class="jumbotron">
    <h3>Create a new Quote</h3>
</div>

{{ Notification::showAll() }}

@if ($errors->any())
<div class="alert alert-error">
        {{ implode('<br>', $errors->all()) }}
</div>
@endif

{{ 
    GridRender::setGridId("quotegrid")
            ->enablefilterToolbar()
            ->setGridOption('url',URL::route('dealer.services.postquote'))
            ->setGridOption('rowNum',10)
            ->setGridOption('shrinkToFit',false)
            ->setGridOption('sortname','id')
            ->setGridOption('caption','Spare List')
            ->setNavigatorOptions('navigator', array('viewtext'=>'view'))
            ->setNavigatorOptions('view',array('closeOnEscape'=>false))
            ->setNavigatorOptions('search', array('multipleSearch'=>true,'multipleGroup'=>true))
            ->setFilterToolbarOptions(array('autosearch'=>true))
            ->setGridEvent('ondblClickRow', 'onSelectRowEvent')
            //->setFilterToolbarEvent('beforeSearch', 'function(){}') 
            ->addColumn(array('name'=>'id', 'index'=>'id', 'width'=>50))
            ->addColumn(array('name'=>'part_number', 'index'=>'part_number', 'width'=>100))
            ->addColumn(array('name'=>'description', 'index'=>'description', 'width'=>200, 'align'=>'left'))
            ->addColumn(array('name'=>'unit', 'index'=>'unit', 'width'=>30))
            ->addColumn(array('name'=>'price', 'index'=>'price', 'width'=>60))
            ->addColumn(array('name'=>'qty', 'width'=>30, 'editable' => true, 'edittype' => 'text', 'cellEdit' => true))
            ->renderGrid(); 
}}
 
 <br>
 <!-- Quote Form starts here -->
        <table id="quote_form" class="table table-bordered">
            <thead>
            <tr>
            <th>ID</th>    
            <th>Part Number</th>
            <th>Description</th>
            <th>Unit</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
            </tr>
            </thead>
            <tbody>
                <!-- Reords are injected here -->
            </tbody>
        </table>    

<!-- Total table -->
        <table id="quote_form_total" class="table table-bordered">
            <tbody>
                <!-- Reords are injected here -->
            </tbody>
        </table>    

        <button type="button" id="servicequote" class="btn btn-info btn-mini">Submit</button>
        <button type="button" id="cancel" class="btn btn-danger btn-mini">Cancel</button>
@stop

@section('javascript')
<script type='text/javascript'>
function onLoadCompleteEvent(data)
{
$(this).jqGrid('footerData','set', {'quantity': 'Total:', 'total': $(this).jqGrid('getCol', 'total', false, 'sum')});   
}

function onSelectRowEvent(rowId)
{
     var rowdata = $('#quotegrid').jqGrid('getRowData', rowId);
     //alert(rowdata['part_number']);
     //for(var i=0; i< rowdata.length; i++) {
     //  alert(rowdata[i]);
     //}
  
    if(!($('#'+rowdata['part_number']).length)) {     
         var row = ($('<tr>').attr("id", rowdata['part_number']))
            .append("<td id='partid'>" + rowdata["id"] + "</td>")
            .append("<td>" + rowdata["part_number"] + "</td>")
            .append("<td>" + rowdata["description"] + "</td>")
            .append("<td>" + rowdata["unit"] + "</td>")
            .append("<td id='qtyid'>" + '1' + "</td>")
            .append("<td class='pricerow'>" + rowdata["price"] + "</td>")
            .append("<td id='parttotal'>" + rowdata["price"] + "</td>")
            .append("<td>" + "<a class='quoterows' href='#'> Remove</a>" + "</td>");

         row.appendTo($("#quote_form tbody"));
    }
  
    if(!($('#quote_form_total #total').length) && $('#quote_form tr').length) {     
        var total_parts_cell = "<tr id='total' valign='right'><td colspan='6'>Total Parts cost: <strong></strong></td><td colspan='4' align='center'><strong></strong></td><</tr>";
        var total_vat_cell = "<tr id='total_vat'><td colspan='5' align='right'>VAT @2.50%</td><td align='right'>Total VAT:</td><td colspan='2' align='center'><strong></strong></td></tr>";
        var total_gross_cell = "<tr id='total_gross' valign='right'><td colspan='6'>Gross Total: <strong></strong></td><td colspan='4' align='center'><strong></strong></td><</tr>";
        

        ($("#quote_form_total tbody")).append(total_parts_cell);  
        ($("#quote_form_total tbody")).append(total_vat_cell); 
        ($("#quote_form_total tbody")).append(total_gross_cell); 
    } 

    priceCalc(1);
  
}

function beforeClearEvent()
{
$('#gs_invoice-id').val($('#id').val());    
$('#InvoiceItemsGrid').setGridParam({'postData':{"filters":"{'groupOp':'AND','rules':[{'field':'DEMO_Invoice.id','op':'eq','data':'"+$('#id').val()+"'}]}"}});
}   

function priceCalc(qty) {
        var sum = 0; 

        $("#quote_form tbody").children().each(function(id) {
            sum += +$(this).find('td#parttotal').text();
        });
        
        $('#total > td:last > strong').text(sum.toFixed(2));
        $('#total_vat > td:last > strong').text((sum*.0250).toFixed(2));
        $('#total_gross > td:last > strong').text( (sum + (sum*.0250)).toFixed(2) );
  }      

</script>

@stop
