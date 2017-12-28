$(document).ready(function () {
    $('#datetimepicker2').datetimepicker({
        date: new Date(parseInt(window.task.date)),
        locale: 'ru',
        format: 'YYYY-MM-DD HH:mm'
    });
});