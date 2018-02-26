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


// $( window ).resize(function() {
//     if(window.innerWidth > 992)
//     {
//         $("#detail").css("paddingTop",0);
//
//     }
//     else if (window.innerWidth < 992)
//     {
//         var h = $("#detail-header").height();
//         $("#detail").css("paddingTop", h + 10);
//     }
//
// });


// sticky


    // $("#month-bar").sticky({topSpacing: 0});
    //
    // $("#dropdown-holder").sticky({topSpacing: 70});
    // $("#detail-header").sticky({topSpacing: 0});
    var calWrapper = $('.cal-wrap');
    var calWrapperWidth = calWrapper.width();
    var calWrapperHeight = calWrapper.height();
    $('.cal-head').css('width', calWrapperWidth);

    $(window).resize(function () {
        var calWrapper = $('.cal-wrap');
        var calWrapperWidth = calWrapper.width();
        $('.cal-head').css('width', calWrapperWidth);
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
                $($this).trigger("change");
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
        $('.select-options li').on('click', function (e) {
            e.preventDefault();
            var href = $(this).attr('rel');
            var current_div = $(href);
            var target_div = $(".description");
            var animateTo = target_div.scrollTop() - target_div.position().top + current_div.position().top;
            console.log(animateTo);
            target_div.animate(
                {scrollTop: animateTo},
                "slow"
            );
        });
    }

    //show-hide food rows desktop - checkbox
    $("input[type=checkbox]").change(function () {
        var data_family = $(this).attr('data-family');
        var $rows = $('.p-label[data-family=' + data_family + ']');
        var $cell = $('.cell[data-family=' + data_family + ']');
        if (this.checked) {
            $rows.show();
            $cell.show();
        } else {
            $rows.hide();
            $cell.hide();
        }
    });

    //show-hide food rows mobile - select field
    $("#family-selector-m").change(function () {
        var data_family = $(this).val();
        var $rows = $('.p-label[data-family=' + data_family + ']');
        var $cell = $('.cell[data-family=' + data_family + ']');
        $('.p-label').hide();
        $('.cell').hide();
        $rows.show();
        $cell.show();
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
            $('.p-label, .cell').show();
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

            $('.p-label, .cell').hide();
            $rows.show();
            $cell.show();
            $childrenRows.show();
            $childrenCell.show();

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
            $('.p-label, .cell').show();
            $('.ajaxed-data').empty();
        }
    }

//ajax magic
    $(".p-label").click(function () {

        //mobile pop-up show hide
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
                    var productHeader = $('#detail-header');
                    var productHeaderHeight = productHeader.height();
                    var descriptionHeight = productWrapper.height() - productHeaderHeight;
                    var dDescHeight = calWrapperHeight - productHeaderHeight;
                    $('.description').css('height', dDescHeight);
                    if (window.innerWidth < 992) {
                        $('.description').css({'margin-top': productHeaderHeight, 'height': descriptionHeight});

                    }


                }
            }
        });
    }

})
;

