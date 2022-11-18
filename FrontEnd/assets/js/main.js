'use strict';

(function ($) {

    // =====Catage menu====
    $('.hero__categories__all').on('click', function () {
        $('.hero__categories ul').slideToggle(400);
    });

    $(".mobile__open").on('click', function () {
        $(".mobile__menu__wrapper").addClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    /*------------------
           Background Set
       --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".mobile__open").on('click', function () {
        $(".mobile__menu__wrapper").addClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").addClass("active");
        $("body").addClass("over_hid");
    });

    $(".mobile__menu__overlay").on('click', function () {
        $(".mobile__menu__wrapper").removeClass("show__mobile__menu__wrapper");
        $(".mobile__menu__overlay").removeClass("active");
        $("body").removeClass("over_hid");
    });


    /*------------------
        Navigation
    --------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });


})(jQuery)

// nút tăng giảm số lượng
$('input.input-qty').each(function() {
    var $this = $(this),
      qty = $this.parent().find('.is-form'),
      min = Number($this.attr('min')),
      max = Number($this.attr('max'))
    if (min == 0) {
      var d = 0
    } else d = min
    $(qty).on('click', function() {
      if ($(this).hasClass('minus')) {
        if (d > min) d += -1
      } else if ($(this).hasClass('plus')) {
        var x = Number($this.val()) + 1
        if (x <= max) d += 1
      }
      $this.attr('value', d).val(d)
    })
  })


      /*------------------
       Product List
    --------------------*/
    // For Filters
    document.addEventListener("DOMContentLoaded", function () {
        var filterBtn = document.getElementById('filter-btn');
        var btnTxt = document.getElementById('btn-txt');
        var filterAngle = document.getElementById('filter-angle');

        $('#filterbar').collapse(false);
        var count = 0, count2 = 0;
        function changeBtnTxt() {
            $('#filterbar').collapse(true);
            count++;
            if (count % 2 != 0) {
                filterAngle.classList.add("fa-angle-right");
                btnTxt.innerText = "show filters"
                filterBtn.style.backgroundColor = "#36a31b";
            }
            else {
                filterAngle.classList.remove("fa-angle-right")
                btnTxt.innerText = "hide filters"
                filterBtn.style.backgroundColor = "#ff935d";
            }

        }

        // For Applying Filters
        $('#inner-box').collapse(false);
        $('#inner-box2').collapse(false);

        // For changing NavBar-Toggler-Icon
        var icon = document.getElementById('icon');

        function chnageIcon() {
            count2++;
            if (count2 % 2 != 0) {
                icon.innerText = "";
                icon.innerHTML = '<span class="far fa-times-circle" style="width:100%"></span>';
                icon.style.paddingTop = "5px";
                icon.style.paddingBottom = "5px";
                icon.style.fontSize = "1.8rem";


            }
            else {
                icon.innerText = "";
                icon.innerHTML = '<span class="navbar-toggler-icon"></span>';
                icon.style.paddingTop = "5px";
                icon.style.paddingBottom = "5px";
                icon.style.fontSize = "1.2rem";
            }
        }

        // Showing tooltip for AVAILABLE COLORS
        $(function () {
            $('[data-tooltip="tooltip"]').tooltip()
        })

        // For Range Sliders
        var inputLeft = document.getElementById("input-left");
        var inputRight = document.getElementById("input-right");

        var thumbLeft = document.querySelector(".slider > .thumb.left");
        var thumbRight = document.querySelector(".slider > .thumb.right");
        var range = document.querySelector(".slider > .range");

        var amountLeft = document.getElementById('amount-left')
        var amountRight = document.getElementById('amount-right')

        function setLeftValue() {
            var _this = inputLeft,
                min = parseInt(_this.min),
                max = parseInt(_this.max);

            _this.value = Math.min(parseInt(_this.value), parseInt(inputRight.value) - 1);

            var percent = ((_this.value - min) / (max - min)) * 100;

            thumbLeft.style.left = percent + "%";
            range.style.left = percent + "%";
            amountLeft.innerText = parseInt(percent * 100);
        }
        setLeftValue();

        function setRightValue() {
            var _this = inputRight,
                min = parseInt(_this.min),
                max = parseInt(_this.max);

            _this.value = Math.max(parseInt(_this.value), parseInt(inputLeft.value) + 1);

            var percent = ((_this.value - min) / (max - min)) * 100;

            amountRight.innerText = parseInt(percent * 100);
            thumbRight.style.right = (100 - percent) + "%";
            range.style.right = (100 - percent) + "%";
        }
        setRightValue();

        inputLeft.addEventListener("input", setLeftValue);
        inputRight.addEventListener("input", setRightValue);

        inputLeft.addEventListener("mouseover", function () {
            thumbLeft.classList.add("hover");
        });
        inputLeft.addEventListener("mouseout", function () {
            thumbLeft.classList.remove("hover");
        });
        inputLeft.addEventListener("mousedown", function () {
            thumbLeft.classList.add("active");
        });
        inputLeft.addEventListener("mouseup", function () {
            thumbLeft.classList.remove("active");
        });

        inputRight.addEventListener("mouseover", function () {
            thumbRight.classList.add("hover");
        });
        inputRight.addEventListener("mouseout", function () {
            thumbRight.classList.remove("hover");
        });
        inputRight.addEventListener("mousedown", function () {
            thumbRight.classList.add("active");
        });
        inputRight.addEventListener("mouseup", function () {
            thumbRight.classList.remove("active");
        });
    });