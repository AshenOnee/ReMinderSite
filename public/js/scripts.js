$(document).ready(function () {
    $(function () {
        $('#datetimepicker2').datetimepicker({
            locale: 'ru',
            format: 'YYYY-MM-DD HH:mm'
        });
    });

    $(function () {
        if( $('#periodical').is(':checked')){
            $('#period').show();
            }
        else {
            $('#period').hide();
        }
    })

});

