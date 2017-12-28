$(document).ready(function () {
    $(function () {
        if( $('#periodical').is(':checked')){
            $('#period').show();
        }
        else {
            $('#period').hide();
        }
    })

    $('#periodical').click(function () {
        var $this = $(this);
        if ($this.is(':checked')) {
            $('#period').show();
        } else {
            $('#period').hide();
        }
    });

    $('#span').click(function () {
        x = new Date($('#datetimepicker2').data('date'));
        $('#datetime').val(x.getTime());
        $('#form').submit();
    })
});