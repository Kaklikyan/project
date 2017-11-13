$(document).ready(function () {

    $('.photo').parent().css('width', '30%');

    $(":file").filestyle({
        buttonText: 'Loading...'
    });

    $('#form-message').on('beforeSubmit', function () {
        var form = $(this);
        $.ajax({
            url : form.attr('action'),
            type: 'post',
            data: form.serialize(),
            success: function(response){
                $('.successMessage').text('Success').show();
            },

            error: function (error) {

            }
        })
    }).on('submit', function (e) {
        e.preventDefault();
        return false;
    });

    $('#player-line').after($('#add-player'));

    var data_keys = [];

    function randomForData(){
        return Math.floor(Math.random() * 10) + 1;
    }


    $('#add-player').off();
    $('#add-player').on('click', function(){

        $('.additional-fields').show();

        var key = randomForData();
        var check = true;
        var t = '';


        $(".additional-field").each(function () {
            if (!$(this).is(':visible')){
                check = false;
            }
        });

        if(!check){
            if($.inArray(key, data_keys) == -1){
                t = key;
                data_keys.push(key);
            }else{

                while(true) {
                    key = randomForData();
                    if($.inArray(key, data_keys) == -1){
                        data_keys.push(key);
                        t = key;
                        break;
                    }
                }
            }
        }else{
            alert('good');
        }

        $(".additional-field").each(function () {
            if ($(this).attr('data-key') == t){
                $(this).fadeIn();
                $(this).find('.leader-check').show();
            }
        });
    });

    // Disabling current user data picker part

    $('.player-card #w0').prop("disabled", true);

    // Is user checkbox functionality

    $('.is-user-checkbox input').on('click', function () {
        var second_part;
        if($(this).is(':checked')){
            $(this).closest('.is-user-question').next().find('input').prop('disabled', false).removeClass('is-user-adding-class');
            second_part = $(this).closest('.player-card-first-part').next();
            $(second_part).find('.additional-name-field').val('').prop('disabled', true).addClass('is-user-adding-class');
            $(second_part).find('.date input').val('').prop('disabled', true).addClass('is-user-adding-class');
        }else{
            $(this).closest('.is-user-question').next().find('input').val('').prop('disabled', true).addClass('is-user-adding-class');
            second_part = $(this).closest('.player-card-first-part').next();
            $(second_part).find('.additional-name-field').prop('disabled', false).removeClass('is-user-adding-class');
            $(second_part).find('.date input').prop('disabled', false).removeClass('is-user-adding-class');
        }
    });



    $('.field-remove').on('click', function(){
        var delete_key = $(this).closest('.additional-field').attr('data-key');

        data_keys = $.grep(data_keys, function(value) {
            return value != delete_key;
        });

        $(this).parent().find('.leader-check').prop('checked', false);
        $(this).closest('.additional-field').fadeOut();
        $(this).closest('div').find('input').val('');

        var isVisible = false;

        $(".additional-fields .additional-field").each(function () {
            if ($(this).is(':visible')){
                isVisible = true;
            }
        });

        if(!isVisible){
            $('.additional-fields').hide();
        }
    });

    $('.leader-check').change(function () {
        var checkId = $(this).attr('id');
        if ($(this).is(':checked')){
            $('.leader-check').each(function () {
                if ($(this).attr('id') != checkId){
                    $(this).prop('checked', false);
                }
            })
        }
    });
/*
    $(document).on('beforeSubmit','#team-form', function () {

        var allData = [];
        allData['players'] = [];

        if($('.additional-fields').is(':visible')){
            $('.additional-field').each(function (i) {
                if ($(this).is(':visible')){

                    console.log($(this).find('#photo-div input').val());

                    var obj = {};
                    obj.playerName = $(this).find('.additional-name-field').val();
                    obj.playerDate = $(this).find('.form-control').val();
                    obj.playerPhoto = $(this).find('#photo-div input').prop('files');
                    allData['players'].push(obj);
                }
            })
        }

        //allData.teamTitle = $('#teams-title').val();

        console.log(allData);

        var form = $(this);
        $.ajax({
            url : '/main/create-team',
            type: 'get',
            data: allData,
            success: function(response){
                $('.successMessage').text('Success').show();
            },

            error: function (error) {

            }
        })

    }).on('submit', function (e) {
        e.preventDefault();
        return false;
    })*/

    $(document).on('submit','#team-form', function (e) {

        var checkFields = true;
        var checkDate = true;
        var check_is_user = true;
        var checkCaptain = false;

        if($('.additional-fields').is(':visible')){

            var field_count = $('.additional-field:visible').length;

            $('.additional-field').each(function (i) {
                if ($(this).is(':visible')){

                    var nameField = $(this).find('.additional-name-field').val();
                    var dateField = $(this).find('.date input').val();
                    var is_user_input = $(this).find('.user-additional-name-field').val();
                    var is_user_checkbox = $(this).find('.is-user-checkbox input');

                    if(!nameField && !$(is_user_checkbox).is(':checked')){
                        checkFields = false;
                        $('.inputValidate').show();
                        $(this).find('.additional-name-field').css('border', '1px solid red');
                    }else{
                        $(this).find('.additional-name-field').css('border', '1px solid #ccc');
                    }

                    if (!dateField && !$(is_user_checkbox).is(':checked')){
                        checkDate = false;
                        $('.inputValidate').show();
                        $(this).find('.date input').css('border', '1px solid red')
                    }else{
                        $(this).find('.date input').css('border', '1px solid #ccc');
                    }

                    if($(".additional-fields .leader-check:checked").length > 0){
                        checkCaptain = true;
                        $('.checkboxValidate').hide();
                    }else {
                        $('.checkboxValidate').show();

                    }

                    if($(is_user_checkbox).is(':checked') && !is_user_input){
                        check_is_user = false;
                        $('.is-user-validation').show();
                        $(this).find('.user-additional-name-field').css('border', '1px solid red');

                    }else{
                        $(this).find('.user-additional-name-field').css('border', '1px solid #ccc');
                    }

                    if(checkFields && checkDate) $('.inputValidate').hide();

                    if(check_is_user) $('.is-user-validation').hide();

                    if(field_count >= 5){
                        $('.field-count-message').hide();
                        if(checkCaptain){
                            $('.checkboxValidate').hide();
                            if (checkFields && checkDate && check_is_user){
                                $('#send-form').trigger('click');
                            }else {
                                e.preventDefault();
                            }
                        }else{
                            e.preventDefault();
                        }
                    }else{
                        $('.field-count-message').show();
                        e.preventDefault();
                    }
                }
            })
        }
    });

    $('.results-info').on('click', function () {

        var content = $(this).closest('.results-content').find('.additional-info');

        if($(content).is(':visible')) {
            $(this).prop('src', '/images/round-add-button.png');
        }else{
            $(this).prop('src', '/images/minus-circular-button-outline.png');
        }

        $(this).closest('.results-content').find('.additional-info').slideToggle();
    });

    $(".single-item").on('beforeChange', function (event, slick, currentSlide, nextSlide) {

        var li = $('.slick-track').find('li');
        var current_hall_id = $(li).eq(currentSlide).attr('id');
        var next_hall_id = $(li).eq(nextSlide).attr('id');

        $('.rematch-content').find('#hall-info-' + current_hall_id).hide();
        $('.rematch-content').find('#hall-info-' + next_hall_id).show();

    });

    $('.results-rematch').on('click', function () {

        $(this).closest('.results-content-main').find('.results-content-bottom').clone().appendTo('.teams-content');
        $('.modal-body').find('.results-score').html('VS');

        function createSlick(){
            setTimeout(function () {
                $(".single-item").not('.slick-initialized').slick({
                    arrows: true,
                    speed: 1000,
                    fade: true,
                    responsive: [{
                        breakpoint: 500,
                    }]
                });
            }, 200)
        }
        createSlick();

        //Now it will not throw error, even if called multiple times.
        $(window).on( 'resize', createSlick );

        setTimeout(function () {
            $('.rematch-content').find('#hall-info-' + $('.slick-active').attr('id')).show();
        }, 200);

    });

    $('#rematch-modal').on('hidden.bs.modal', function () {
        $(this).find('.teams-content').html('');

    });

    /*$('.rematch-block-icon').on('click', function () {
        $(this).closest('.rematch-block').slideUp();
        $(this).closest('.results-content').find('.results-content-main').slideDown();
    });*/
    
    $('#rematch-button').on('click', function () {

        var parent = $(this).closest('.rematch-content');
        var field_id;
        var from;
        var to;

        $(this).closest('.rematch-block').prev().find('.results-content-bottom').find('.results-team').each(function () {
            if($(this).hasClass('result-current-team')) {
                from = $(this).data('team');
            }else {
                to = $(this).data('team');
            }
        });

        var previous_match_id = $(this).closest('.rematch-block').prev().find('.results-content-bottom').data('match');
        var duration = $(parent).find('#duration').is(':checked');
        var referee = $(parent).find('#referee').is(':checked');
        var vest = $(parent).find('#vest').is(':checked');

        var date = $(parent).find('.rematch-date').val();
        $(parent).find('.slick-slide').each(function () {
            if($(this).hasClass('slick-active')){
                field_id = $(this).attr('id');
            }
        });

        var key_1 = "" + from + to;
        var key_2 = "" + to + from;


        $.post("/match/challenge",
            {   field_id : field_id,
                date: date,
                duration: duration,
                referee: referee,
                vest: vest,
                from: from,
                to: to,
                previous_match_id: previous_match_id
            }).done(function () {
                $('.rematch-success').fadeIn();
                $('.close').trigger('click');
                $("html").animate({ scrollTop: 0 });
                $('.rematch-waiting').each(function () {

                    if($(this).data('hash') == key_1 || $(this).data('hash') == key_2){
                        console.log(123123123)
                        $(this).show();
                        $(this).next().hide();
                    }
                })
            });
        });
});