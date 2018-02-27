// Wait for window load
(function ($) {
    $(window).load(function () {
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
    });
})(jQuery);

jQuery(document).ready(function ($) {

    $('.slider-product').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        asNavFor: '.slider-month',
        dots: false,
        centerMode: false,
        focusOnSelect: false,
        arrows: true,
        touch: false,

        responsive: [
            {
                breakpoint: 600,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 3
                }
            }
        ]

    });

    $('.slider-month').slick({
        slidesToShow: 6,
        slidesToScroll: 1,
        arrows: true,
        asNavFor: '.slider-product',
        dots: false,
        centerMode: false,
        focusOnSelect: false,
        touch: false,
        responsive: [
            {
                breakpoint: 600,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: true,
                    centerMode: true,
                    centerPadding: '0px',
                    slidesToShow: 3
                }
            }
        ]


    });


// toggle class

    $(".btn-close").click(function () {
        $("#detail").removeClass("show");
        $(".tint").removeClass("show");
        $(".btn-close").removeClass("show");
        $("body").removeClass("hidescroll");
        // $("#detail").css("paddingTop",0);


    });

function dynamicWidthHeight () {
    var $calWrapper = $('.cal-wrap');
    var $calWrapperW = $calWrapper.width();
    var $calWrapperH = $calWrapper.height();
    // set calendar header width
    $('.cal-head').css('width', $calWrapperW);

    var $headerHeight = $('#top-header-bar').height() + $('#header-search-bar').height();
    var $footerHeight = $('#colophon').outerHeight();
    var $headerFooterHeight = $headerHeight + $footerHeight;
    // set calendar wrapper height
    $calWrapper.height($(window).height()-$headerFooterHeight);
    if (window.innerWidth < 767) {
        $calWrapper.height($(window).height()-$('#header-search-bar').height());

    }
}
    dynamicWidthHeight();

    $(window).resize(function () {
        dynamicWidthHeight();
    });

// custom Select
    function custom_select(food_fields) {
        var selector;
        if (food_fields == 'food-fields') {
            selector = $('#category-selector');
        } else {
            selector = $('#family-selector-m');
        }


        selector.each(function () {
            var $this = $(this), numberOfOptions = $(this).children('option').length;

            $this.addClass('select-hidden');
            $this.wrap('<div class="select"></div>');
            $this.after('<div class="select-styled"></div>');

            var $styledSelect = $this.next('div.select-styled');
            $styledSelect.text($this.children('option').eq(0).text());

            var $list = $('<ul />', {
                'class': 'select-options'
            }).insertAfter($styledSelect);

            for (var i = 1; i < numberOfOptions; i++) {
                $('<li />', {
                    text: $this.children('option').eq(i).text(),
                    rel: $this.children('option').eq(i).val()
                }).appendTo($list);
            }

            var $listItems = $list.children('li');

            $styledSelect.click(function (e) {
                e.stopPropagation();
                $('div.select-styled.active').not(this).each(function () {
                    $(this).removeClass('active').next('ul.select-options').hide();
                });
                $(this).toggleClass('active').next('ul.select-options').toggle();
            });

            $listItems.click(function (e) {
                e.stopPropagation();
                $styledSelect.text($(this).text()).removeClass('active');
                $this.val($(this).attr('rel'));
                $list.hide();
                $this.trigger("change");
                //console.log($this.val());
            });

            $(document).click(function () {
                $styledSelect.removeClass('active');
                $list.hide();
            });

        });
    }

    custom_select();

    // Smooth scrolling for product detail
    function smooth_scrolling() {

        var $target_div = $(".description"),
            refTargetH = 0;

        $('.select-options li').on('click', function (e) {
            e.preventDefault();
            var href = $(this).attr('rel');
            var $current_div = $(href);

            $target_div.find('dt,dd').removeClass('active');
            $target_div.find('dd').hide();

            var animateTo = $target_div.scrollTop() - $target_div.position().top + $current_div.position().top - parseInt($target_div.css('margin-top'));
            console.log(animateTo);

            refTargetH = $target_div.height();
            $target_div.addClass('auto-scrolling').find('.accordion').height(refTargetH+10000);

            $target_div.animate(
                {scrollTop: animateTo},
                "slow",function(){
                    $current_div.trigger('accordionUpdate');
                    setTimeout(function(){
                        $target_div.removeClass('auto-scrolling');
                    },800);
                    //$target_div.find('.accordion').height(refTargetH);
                }
            );
        });

        $target_div.scroll(function(){
            if(!$target_div.hasClass('auto-scrolling')){
                $target_div.find('.accordion').height($target_div.find('.accordion dl').height()+100);
            }
        });

        $('.accordion dt h2').click(function(){
           $('#detail .select-options li[rel="#'+$(this).attr('id')+'"]').click();
        });

    }

    //show-hide food rows desktop - checkbox
    $(".cal-head input[type=checkbox]").change(function () {
        resetSubVarietiesDisplay();
        resetSearchInput();
        $(".cal-head input[type=checkbox]").each(function(){
            var data_family = $(this).attr('data-family');
            var $rows = $('.p-label[data-family=' + data_family + ']');
            var $cell = $('.cell[data-family=' + data_family + ']');
            if (this.checked) {
                $rows.filter('.parent-level-0').addClass('active');
                $cell.filter('.parent-level-0').addClass('active');
            } else {
                $rows.removeClass('active');
                $cell.removeClass('active');
            }
        });
    });

    //show-hide food rows mobile - select field
    $("#family-selector-m").change(function () {
        resetSubVarietiesDisplay();
        resetSearchInput();
        var data_family = $(this).val();
        var $rows = $('.p-label[data-family=' + data_family + ']');
        var $cell = $('.cell[data-family=' + data_family + ']');
        $('.p-label').removeClass('active');
        $('.cell').removeClass('active');
        $rows.filter('.parent-level-0').addClass('active');
        $cell.filter('.parent-level-0').addClass('active');
    });

    //Search auto-complete jQuery UI
    var $search_input = $('#header-search-bar-input'),
        $search_value = $("#header-search-bar-value"),
        data;

    $search_input.autocomplete({
        source: availableFood,
        select: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $search_value.val(ui.item.value);

        },
        focus: function (event, ui) {
            event.preventDefault();
            $(this).val(ui.item.label);
            $search_value.val(ui.item.value);
        },
        response: function (event, ui) {
            // ui.content is the array that's about to be sent to the response callback.
            if (ui.content.length === 0) {
                $search_value.val('');
            }
        }
    });

    //Reset products in calendar if search field empty
    $search_input.on('input', function () {
        var search_selection = $(this).val();
        if (!search_selection) {
            $('.p-label, .cell').addClass('active');
            $search_value.val('');
        }
    });

    //Display selective products using search field
    $("#header-search-trigger").click(searchResults);
    $search_input.on('autocompleteselect', function (e, ui) {
        searchResults();
    });

    function searchResults() {
        var search_selection = $search_value.val();
        if (search_selection) {
            var $rows = $('.p-label[data-slug*=' + search_selection + ']'),
                $cell = $('.cell[data-slug*=' + search_selection + ']'),
                $childrenRows = $('.p-label[data-direct-parent*=' + search_selection + ']'),
                $childrenCell = $('.cell[data-direct-parent*=' + search_selection + ']');

            $('.p-label, .cell').removeClass('active');
            $('#products .display-sub-varieties').text('[-] Masquer variétés').addClass('active');

            $rows.addClass('active');
            $cell.addClass('active');
            $childrenRows.addClass('active');
            $childrenCell.addClass('active');

            //ajax magic
            var button = $(this);
            var id = $('[data-slug=' + search_selection + ']').attr('data-id');
            data = {
                'action': 'loadfood',
                'query': ajax_food_params.posts,
                'id': id
            };
            if (id) {
                call_ajax();
            } else {
                $('.ajaxed-data').empty();
            }


        } else {
            $('.p-label, .cell').addClass('active');
            $('.ajaxed-data').empty();
        }
    }

//ajax magic
    $(".p-label").click(function (event) {
        event.stopPropagation();
        //console.log($(event.target).attr('class').indexOf('display-sub-varieties')>=0);
        if(!$(event.target).attr('class').indexOf('display-sub-varieties')>=0 && !$(event.target).hasClass('display-sub-varieties')){
            //mobile pop-up show hide
            console.log($(event.target).attr('class'));
            $("#detail").addClass("show");
            $(".tint").addClass("show");
            $(".btn-close").addClass("show");
            $("body").addClass("hidescroll");


            //ajax magic
            var button = $(this);
            var id = $(this).attr('data-id');

            data = {
                'action': 'loadfood',
                'query': ajax_food_params.posts,
                'id': id

            };

            call_ajax();
        }
    });

    function call_ajax() {
        $.ajax({
            url: ajax_food_params.ajaxurl, // AJAX handler
            data: data,
            type: 'POST',
            beforeSend: function (xhr) {
                $('.ajaxed-data').html('' +
                    '<div class="post-loader">' +
                    '<svg width="26px" height="26px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid" class="uil-ripple"><rect x="0" y="0" width="100" height="100" fill="none" class="bk"></rect><g> <animate attributeName="opacity" dur="2s" repeatCount="indefinite" begin="0s" keyTimes="0;0.33;1" values="1;1;0"></animate><circle cx="50" cy="50" r="40" stroke="#8ECCC0" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="r" dur="2s" repeatCount="indefinite" begin="0s" keyTimes="0;0.33;1" values="0;22;44"></animate></circle></g><g><animate attributeName="opacity" dur="2s" repeatCount="indefinite" begin="1s" keyTimes="0;0.33;1" values="1;1;0"></animate><circle cx="50" cy="50" r="40" stroke="#FBBA30" fill="none" stroke-width="6" stroke-linecap="round"><animate attributeName="r" dur="2s" repeatCount="indefinite" begin="1s" keyTimes="0;0.33;1" values="0;22;44"></animate></circle></g></svg>' +
                    '</div>');
            },
            success: function (data) {
                if (data) {
                    var productWrapper = $('#detail');
                    productWrapper.scrollTop(0);
                    $('.ajaxed-data').html(data); // insert new posts
                    custom_select('food-fields');
                    smooth_scrolling();

                    function productDesHeight(){
                        var productHeader = $('#detail-header');
                        var pHeaderHeight = productHeader.height();
                        var descriptionHeight = productWrapper.height() - pHeaderHeight;
                        var $calWrapperH = $('.cal-wrap').height();
                        var dDescHeight = $calWrapperH - pHeaderHeight;
                        $('.description').css('height', dDescHeight);
                        if (window.innerWidth < 992) {
                            $('.description').css({'height': descriptionHeight});

                        }
                    }
                    productDesHeight();

                    $(window).resize(function () {
                        productDesHeight();
                    });

                    $(".accordion").accordion();

                }
            }
        });
    }


    // init main parent item visibility
    $('#products').find('.parent-level-0').addClass('active');

    $('#products .display-sub-varieties').click(function(){
        var $this = $(this);
        var thisSlug = $this.parents('.p-label').attr('data-slug');
        //console.log(thisSlug);
        if(!$this.hasClass('active')){
            $('#products').find('*[data-direct-parent="'+thisSlug+'"]').addClass('active');
            $this.text('[-] Masquer variétés').addClass('active');
        }
        else{
            $('#products').find('*[data-direct-parent="'+thisSlug+'"]').not('.parent-level-0').removeClass('active');
            $this.text('[+] Afficher variétés').removeClass('active');
        }

    });

    function resetSubVarietiesDisplay(){
        var $products = $('#products');
        $products.find('.p-label,.cell').not('.parent-level-0').removeClass('active');
        $products.find('.display-sub-varieties').text('[+] Afficher variétés').removeClass('active');
    }

    function resetSearchInput(){
        $('#header-search-bar-input').val('');
    }

    // init accordion system
    $(".accordion").accordion();


});


/*** css animation support check ***/
var supportAnimation = (function($){
    var animation = false,
        animationstring = 'animation',
        keyframeprefix = '',
        domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
        pfx  = '',
        elem = document.createElement('div');

    if( elem.style.animationName !== undefined ) { animation = true; }

    if( animation === false ) {
        for( var i = 0; i < domPrefixes.length; i++ ) {
            if( elem.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
                pfx = domPrefixes[ i ];
                animationstring = pfx + 'Animation';
                keyframeprefix = '-' + pfx.toLowerCase() + '-';
                animation = true;
                break;
            }
        }
    }

    if(animation){
        $('body').addClass('cssanimations');
    }

    return animation;
})(jQuery);

/*** accordion extended function ***/
(function($) {
// What does the accordion plugin do?
    $.fn.accordion = function(options) {

        //console.log('accordion init');
        var elem = document.createElement('div');

        if (!this.length) { return this; }

        var opts = $.extend(true, {}, $.fn.accordion.defaults, options);

        this.each(function() {
            var $this = $(this).find('dl');

            var $all_panels = $this.find("dd");

            if(supportAnimation)
            {
                $this.find("dt:first .arrow").addClass('down-anim');
            }
            else
            {
                $this.find("dt:first .arrow").addClass('down');
            }

            $this.find("dt > a, dt > h2").on('accordionUpdate', function(event){

                event.preventDefault();

                if(!$(this).parent().hasClass('active'))
                {

                    $all_panels.slideUp();
                    var $active = $('dl .active').removeClass('active');

                    $(this).parent().next().slideDown().addClass('active');
                    $(this).parent().addClass('active');

                    if(supportAnimation)
                    {
                        $this.find('dt .arrow').removeClass('down-anim');
                        $active.filter('dt').find('.arrow').removeClass('down-anim');
                        $(this).parent().find('.arrow').addClass('down-anim');
                    }
                    else
                    {
                        $this.find('dt .arrow').removeClass('down');
                        $active.filter('dt').find('.arrow').removeClass('down');
                        $(this).parent().find('.arrow').addClass('down');
                    }
                }

            });

        });

        return this;
    };

// default options
    $.fn.accordion.defaults = {};

    // call plugin

})(jQuery);
