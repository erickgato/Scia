$(document).ready(() => {
    $("#opmenu").on('change', function () {
        if ($(this).is(":checked")) {
            $(".menu").addClass("MenuRed")
            $('.hamburger').addClass('is-active')
            $('.hammain').addClass('menuopened')
        }
        else {
            $(".menu").removeClass("MenuRed")
            $('.hamburger').removeClass('is-active')
            $('.hammain').removeClass('menuopened')
        }
    })
})
