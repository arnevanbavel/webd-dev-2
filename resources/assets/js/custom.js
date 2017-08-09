$(document).ready(function(){  

    var time = 5;
    var $bar,
    $slick,
    isPause,
    tick,
    percentTime;

    $slick = $('.header-photos');
        $slick.slick({
        arrows: false,
        draggable: true,
        adaptiveHeight: false,
        dots: true,
        mobileFirst: true,
        pauseOnDotsHover: true,
    });

    $bar = $('.slider-progress .progress');

    $('.slider-wrapper').on({
        mouseenter: function() {
            isPause = true;
        },
        mouseleave: function() {
            isPause = false;
        }
    })

    function startProgressbar() {
        resetProgressbar();
        percentTime = 0;
        isPause = false;
        tick = setInterval(interval, 10);
    }

    function interval() {
        if(isPause === false) {
            percentTime += 1 / (time+0.1);
            $bar.css({
                width: percentTime+"%"
            });
            if(percentTime >= 100)
            {
                $slick.slick('slickNext');
                startProgressbar();
            }
        }
    }


    function resetProgressbar() {
        $bar.css({
            width: 0+'%' 
        });
        clearTimeout(tick);
    }

    startProgressbar();

    $('.main-picture').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        asNavFor: '.other-pictures'
    });
    $('.other-pictures').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        asNavFor: '.main-picture',
        dots: true,
        centerMode: true,
        arrows: false,
        focusOnSelect: true
    });
    

    $('.nav-text').hide();
    $('.logo-kowloon').hide();

    $('.toggle-nav').click(function(){
        $('aside').toggleClass("nav-extend");
        $('.nav-text').toggle();
        $('.logo-k').toggle();
        $('.logo-kowloon').toggle();
        $('li').toggleClass("nav-normal");
    })

    $(".advanced-search-filter").hide();

    $('.toggle-search-filter').click(function(){
        $(".advanced-search-filter").slideToggle();
    });

    $('.category-filter').hide();

    $('.toggle-category-filter').click(function(){
        $(".category-filter").slideToggle();
    });


    $("#slider").slider({
        min: 8,
        max: 499,
        step: 1,
        values: [8, 499],
        slide: function(event, ui) {
            for (var i = 0; i < ui.values.length; ++i) {
                $("input.sliderValue[data-index=" + i + "]").val(ui.values[i]);
            }
        }
    });

    $("input.sliderValue").change(function() {
        var $this = $(this);
        $("#slider").slider("values", $this.data("index"), $this.val());
    });

    $('.product-answer').hide();

    $('.close-cookie').click(function(){
        $('.cookie').hide();
    });

    $('.product-question').click(function() {
       $(this).next('.product-answer').slideToggle();
    });
});
