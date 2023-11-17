// Activate the Bootstrap Carousel component
$('#carouselExampleIndicators').carousel();

// Optionally, add custom event handlers
$('#carouselExampleIndicators').on('slide.bs.carousel', function (e) {
    // Do something when the carousel slides (e.g., update indicators or captions)
    var slideFrom = $(this).find('.active').index();
    var slideTo = $(e.relatedTarget).index();

    // Custom logic here
});

// Optionally, control the carousel programmatically
function nextSlide() {
    $('#carouselExampleIndicators').carousel('next');
}

function prevSlide() {
    $('#carouselExampleIndicators').carousel('prev');
}
