// Model X Main Page - jQuery use

var slideIndex = 1
var stop = false

// start slideshow
jQuery(function() {
    controlSlides(-1)

    // click to open modal images
    $(".slide-img").on('click', function () {
        
        // adding img src to modal img
        var img_src = $(this).attr("src");

        // stoping carousel
        stop = true

        // modal container
        $(".modal-container").css("display", "flex");

        // opening big modal image
        $(".big-modal-image").attr("src", img_src)
        $('.big-modal-image').show()
    })

    // close action
    $(".modal-container").on('click', function () {

        // closing modal container
        $(".modal-container").hide()

        // closing big modal image
        $('.big-modal-image').hide()

        // restarting carousel
        stop = false
        setTimeout(showSlides, 3500)
    })
})

// controls
function controlSlides(n) {
    showSlides(slideIndex += n)
}

function showSlides() {

    // stop variable in order to stop carousel if we click on image
    if (stop == false) {
        var i;
        var slides = document.getElementsByClassName("mySlides")

        // hide images
        for (i = 0; i < slides.length; i++)
            slides[i].style.display = "none"

        // show next image
        slideIndex++;
        if (slideIndex > slides.length)
            slideIndex = 1

        slides[slideIndex - 1].style.display = "block"

        // repeat
        setTimeout(showSlides, 3500)
    }
}