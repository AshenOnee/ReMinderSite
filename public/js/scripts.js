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

    $('#periodical').click(function () {
        var $this = $(this);
        if ($this.is(':checked')) {
            $('#period').show();
        } else {
            $('#period').hide();
        }
    });










    $('.btn-number').click(function(e){
        e.preventDefault();

        fieldName = $(this).attr('data-field');
        type      = $(this).attr('data-type');
        var input = $("input[name='"+fieldName+"']");
        var currentVal = parseInt(input.val());
        if (!isNaN(currentVal)) {
            if(type == 'minus') {

                if(currentVal > input.attr('min')) {
                    input.val(currentVal - 1).change();
                }
                if(parseInt(input.val()) == input.attr('min')) {
                    $(this).attr('disabled', true);
                }

            } else if(type == 'plus') {

                if(currentVal < input.attr('max')) {
                    input.val(currentVal + 1).change();
                }
                if(parseInt(input.val()) == input.attr('max')) {
                    $(this).attr('disabled', true);
                }

            }
        } else {
            input.val(0);
        }
    });
    $('.input-number').focusin(function(){
        $(this).data('oldValue', $(this).val());
    });
    $('.input-number').change(function() {

        minValue =  parseInt($(this).attr('min'));
        maxValue =  parseInt($(this).attr('max'));
        valueCurrent = parseInt($(this).val());

        $name = $(this).attr('name');
        if(valueCurrent >= minValue) {
            $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            $(this).val($(this).data('oldValue'));
        }
        if(valueCurrent <= maxValue) {
            $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
        } else {
            $(this).val($(this).data('oldValue'));
        }


    });
    $(".input-number").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
            // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
            // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
            // let it happen, don't do anything
            return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });

});






var appliction = new Vue({
  	el: '#application',
  	data: {
  		topics: window.topics,
		topic: window.topic
 	},
	create: function () {
        $('#datetimepicker12').data("DateTimePicker").datetimepicker({
            inline: true,
            sideBySide: true
        });
    },
 	methods:{
		onDeleteTopic: function ($topic) {
            $component = this;
            $url="/topics/" + $topic.id;
            axios.delete($url)
                .then(function(response) {
                    location.reload();
                });
		},

		onEditTopic: function ($topic) {
            $url="/edit/topic/" + $topic.id;
            location = $url;
        }
	}
})
