(function ($) {

    // Init Wow
    wow = new WOW( {
        animateClass: 'animated',
        offset:       100
    });
    wow.init();

    // Navigation scrolls
    $('.navbar-nav li a').bind('click', function(event) {
        $('.navbar-nav li').removeClass('active');
        $(this).closest('li').addClass('active');
        var $anchor = $(this);
        var nav = $($anchor.attr('href'));
        if (nav.length) {
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');

        event.preventDefault();
        }
    });
    // activaTab('home-2');
    // function activaTab(tab){
    //     $('.nav-tabs a[href="#' + tab + '"]').tab('show');
    // };
    // About section scroll
    $(".overlay-detail a").on('click', function(event) {
        event.preventDefault();
        var hash = this.hash;
        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 900, function(){
            window.location.hash = hash;
        });
    });

    //jQuery to collapse the navbar on scroll
    $(window).scroll(function() {
        if ($(".navbar-default").offset().top > 50) {
            $(".navbar-fixed-top").addClass("top-nav-collapse");
        } else {
            $(".navbar-fixed-top").removeClass("top-nav-collapse");
        }
    });

    // Testimonials Slider
    $('.bxslider').bxSlider({
      adaptiveHeight: true,
      mode: 'fade'
    });

    $('form[name=login-form]').submit(function(e){
        e.preventDefault();
        var a=$('input.login-username').val();
        var b=$('input.login-password').val();
        if (a==null || a=="",b==null || b=="")
        {
            $('#login-btn').addClass('alert-danger');
            $('#login-btn').html('Tests').fadeIn(500);
            setTimeout(timeout('#login-btn', '<strong>Oops!</strong>Please Fill All Required Fields!'),500);
        }
        else{
            var str1 = $('form[name=login-form]').serializeArray();
            $.ajax({
                type: "POST",
                url: 'actions/login.php',
                dataType: 'json',
                data: str1,
                success: function(data){
                    if(data['notice'] == "Error!"){
                            clearLoginForm();
                            confirmMessageLogin('alert-danger',"Username doesn't exist.");
                        }
                    else{
                            clearLoginForm();
                            confirmMessageLogin('alert-success','Login success!',data['type']);
                    }
                }
            });
        }
    });

    $('form[name=registration-form]').submit(function(e){
        e.preventDefault();
        var a=$('input.form-firstname').val();
        var b=$('input.form-lastname').val();
        var c=$('input.form-username').val();
        var d=$('input.form-password').val();
        var e=$('input.form-confpass').val();

        if (a==null || a==""|| b==null || b==""|| c==null || c==""|| d==null || d==""|| e==null||e=="")
        {
            $('#register-btn').addClass('alert-danger');
            $('#register-btn').html('<strong>Oops!</strong>Please Fill All Required Fields!').fadeIn(500);
            setTimeout(timeout('#register-btn', '<strong>Oops!</strong>Please Fill All Required Fields!'),500);
        }
        else if(d!=e){
            $('#register-btn').addClass('alert-danger');
            $('#register-btn').html('<strong>Oops!</strong>Password does not match.').fadeIn(500);
            setTimeout(timeout('#register-btn', '<strong>Oops!</strong>Password does not match.'),500);
        }
        else{
            var str = $('form[name=registration-form]').serializeArray();
            $.ajax({
                type: "POST",
                url: 'actions/register.php',
                dataType: 'json',
                data: str,
                success: function(data){
                    if(data['notice'] == "Success!"){
                        clearRegistrationForm();
                        confirmMessageRegister('alert-success','Record successfully added.');
                    }
                    else{
                        clearRegistrationForm();
                        confirmMessageRegister('alert-danger','Username already exists.');
                    }
                }
            });
        }
    });

    function confirmMessageRegister(className,message){
        var htmlText = '';


        if(className =='alert-success'){
            htmlText = '<strong>Well done!</strong> '+message;
            if ($('#register-btn').hasClass('alert-danger')){
                $('#register-btn').removeClass('alert-danger');
            }
            $('#register-btn').addClass(className);
            $('#register-btn').html(htmlText).fadeIn(500);
            setTimeout(timeout('#register-btn', htmlText),500);
        }
        else{
            htmlText = '<strong>Oops!</strong> '+message;
            if ($('#register-btn').hasClass('alert-success')){
                $('#register-btn').removeClass('alert-success');
            }
            $('#register-btn').addClass(className);
            $('#register-btn').html(htmlText).fadeIn(500);
            setTimeout(timeout('#register-btn', htmlText),500);
        }
    }


    function confirmMessageLogin(className,message,type){
        var htmlText = '';

        if(className =='alert-success'){
            htmlText = '<strong>Well done!</strong> '+message;
            if ($('#login-btn').hasClass('alert-danger')){
                $('#login-btn').removeClass('alert-danger');
            }
            $('#login-btn').addClass(className);
            $('#login-btn').html(htmlText).fadeIn(500);
            if(type == 'admin')
                setTimeout(timeoutAdminLogin('#login-btn', htmlText),500);
            else
                setTimeout(timeoutUserLogin('#login-btn', htmlText),500);;
        }
        else{
            htmlText = '<strong>Oops!</strong> '+message;
            if ($('#login-btn').hasClass('alert-success')){
                $('#login-btn').removeClass('alert-success');
            }
            $('#login-btn').addClass(className);
            $('#login-btn').html(htmlText).fadeIn(500);
            setTimeout(timeout('#login-btn', htmlText),500);
        }
    }

    function timeoutAdminLogin(obj,htmlText){
        $(obj).html(htmlText).fadeOut(500,function(){
            window.location = 'admin/index.php';
        });
    }

    function timeoutUserLogin(obj,htmlText){
        $(obj).html(htmlText).fadeOut(500,function(){
            window.location = 'index.php';
        });
    }

    function timeout(obj,htmlText){
        $(obj).html(htmlText).fadeOut(500);
    }

    function clearRegistrationForm(){
        $("form[name=registration-form] :input").each(function() {
            $(this).val('');
        });
        $('input.form-firstname').focus();
    };
    function clearLoginForm(){
        $("form[name=login-form] :input").each(function() {
            $(this).val('');
        });
    };

    $('.save-row,.save-row').click(function(e){
        e.preventDefault();
        alert();

    });
})(jQuery);
