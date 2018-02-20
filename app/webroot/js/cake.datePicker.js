function datepick(field_id,date_start,date_end){
    $('#'+field_id)
        .datePicker(
            {
                createButton:false,
                startDate:date_start,
                endDate:date_end
            }
        ).bind(
            'click',
            function()
            {
                updateSelects($(this).dpGetSelected()[0],$(this).attr("id"));
                $(this).dpDisplay();
                return false;
            }
        ).bind(
            'dateSelected',
            function(e, selectedDate, $td, state)
            {
                // ($(this).get()[0].localName == 'img' : calendar icon
                try{
                    $(this).parent('div.date').children("select").each( function(){
                        if ( $(this).val() == '' )
                            throw Exception('one of year,month and day is not selected');
                    });
                    updateSelects($(this).dpGetSelected()[0],$(this).attr("id"));
                    updateSelects(selectedDate,$(this).attr("id"));
                }catch(e){
                }
            }
        ).bind(
            'dpClosed',
            function(e, selected)
            {
                updateSelects(selected[0],$(this).attr("id"));
            }
        );

    var updateSelects = function (selectedDate)
    {
        var selectedDate = new Date(selectedDate);
                if (selectedDate.getDate()<10){
                    $('#'+field_id+'Day option[value=0' + selectedDate.getDate() + ']').attr('selected', 'selected');
                } else {
                    $('#'+field_id+'Day option[value=' + selectedDate.getDate() + ']').attr('selected', 'selected');
                }
                if (selectedDate.getMonth()<9){
                    $('#'+field_id+'Month option[value=0' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                } else {
                    $('#'+field_id+'Month option[value=' + (selectedDate.getMonth()+1) + ']').attr('selected', 'selected');
                }
        $('#'+field_id+'Year option[value=' + (selectedDate.getFullYear()) + ']').attr('selected', 'selected');
        if (! isNaN(selectedDate)) {
            $('#'+field_id+'_str').html("<small>平成" + (selectedDate.getFullYear()-1988) + "年" + (selectedDate.getMonth()+1) + "月" + selectedDate.getDate() + "日</small>");
            $('#'+field_id+'_str').trigger('change');
        }
    }


    $('#'+field_id+'Day, #'+field_id+'Month, #'+field_id+'Year')
        .bind(
            'change',
            function()
            {
                var d = new Date(
                            $('#'+field_id+'Year').val(),
                            $('#'+field_id+'Month').val()-1,
                            $('#'+field_id+'Day').val()
                        );
                $('#'+field_id).dpSetSelected(d.asString());
            }
        );
    
    $('#'+field_id+'Day').trigger('change');

    // Can i use drop?
    $('#'+field_id+'_drop').bind(
        'click',
        function()
        {
            $('#'+field_id+'Year').val("");
            $('#'+field_id+'Month').val("");
            $('#'+field_id+'Day').val("");
            $('#'+field_id+'_str').html("");
        }
    );
} 
