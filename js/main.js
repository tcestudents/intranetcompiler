(function($) {

    $( "#birth_date" ).datepicker({
        dateFormat: "mm - dd - yy",
        showOn: "both",
        buttonText : '<i class="zmdi zmdi-calendar-alt"></i>',
    });

    $('.add-info-link ').on('click', function() {
        $('.add_info').toggle( "slow" );
    });

    $('#year').parent().append('<ul class="list-item" id="newyear" name="year"></ul>');
    $('#year option').each(function(){
        $('#newyear').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#year').remove();
    $('#newyear').attr('id', 'year');
    $('#year li').first().addClass('init');
    $("#year").on("click", ".init", function() {
        $(this).closest("#year").children('li:not(.init)').toggle();
    });

    $('#dept').parent().append('<ul class="list-item" id="newdept" name="dept"></ul>');
    $('#dept option').each(function(){
        $('#newdept').append('<li value="' + $(this).val() + '">'+$(this).text()+'</li>');
    });
    $('#dept').remove();
    $('#newdept').attr('id', 'dept');
    $('#dept li').first().addClass('init');
    $("#dept").on("click", ".init", function() {
        $(this).closest("#dept").children('li:not(.init)').toggle();
    });

    var allOptions = $("#year").children('li:not(.init)');
    $("#year").on("click", "li:not(.init)", function() {
        allOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#year").children('.init').html($(this).html());
        allOptions.toggle('slow');
    });

    var FoodOptions = $("#dept").children('li:not(.init)');
    $("#dept").on("click", "li:not(.init)", function() {
        FoodOptions.removeClass('selected');
        $(this).addClass('selected');
        $("#dept").children('.init').html($(this).html());
        FoodOptions.toggle('slow');
    });

    $('#signup-form').validate({
        rules : {
            first_name : {
                required: true,
            },
            last_name : {
                required: true,
            },
            phone_number : {
                required: true
            },
            password : {
                required: true
            },
            re_password : {
                required: true,
                equalTo: "#password"
            }
        },
        onfocusout: function(element) {
            $(element).valid();
        },
    });

    jQuery.extend(jQuery.validator.messages, {
        required: "",
        remote: "",
        email: "",
        url: "",
        date: "",
        dateISO: "",
        number: "",
        digits: "",
        creditcard: "",
        equalTo: ""
    });
})(jQuery);