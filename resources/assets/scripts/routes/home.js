import anime from 'animejs'

export default {
  init() {
    // JavaScript to be fired on the home page
    homeSlider();
    blogProductSlider();
    homeSliderAnimation();
  },
  finalize() {
    // JavaScript to be fired on the home page, after the init JS
  },
};

function homeSliderAnimation()
{
  setTimeout(function(){
    anime({
      targets: '.hero-slider .slick-slide',
      opacity: [0, 1],
      translateY: ['30px', 0],
      complete: function() {
        $('.slick-slide').addClass('finished');
      },
    });
  }, 1000);
}

function homeSlider()
{
  // JavaScript to be fired on the home page
    let homeSlider = $('.featured--slider-wrapper');
    //let metaBox = $('.featured--slider-controls');

    // Init slider
    homeSlider.slick({
      centerMode: true,
      centerPadding: '0px',
      slidesToShow: 3,
      arrows: false,
      draggable: true,
      dots: true,
      autoplay: true,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            centerMode: false,
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });

    homeSlider.on('beforeChange', function(){
      // Fade out the meta data for current slide
      anime({
        targets: '.slick-center .slide-headline',
        opacity: 0,
      });
    });

}

function blogProductSlider()
{
  // JavaScript to be fired on the home page
  // Product previews below featured images
    let blogProductSlider = $('.blog-product-slider');
    //let metaBox = $('.featured--slider-controls');

    // Init slider
    blogProductSlider.slick({
      dots: false,
      infinite: false,
      arrows: true,
      slidesToShow: 2,
      slidesToScroll: 1,
      prevArrow:'<button type=\'button\' class=\'col_slider slick-prev pull-left\'><img src=\'../wp-content/uploads/2022/10/arrow-left.png\'></button>',
      nextArrow:'<button type=\'button\' class=\'col_slider slick-next pull-right\'><img src=\'../wp-content/uploads/2022/10/arrow-right.png\'></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
            infinite: true,
            dots: false,
          },
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1,
          },
        },
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ],
    });

    blogProductSlider.on('beforeChange', function(){
      // Fade out the meta data for current slide
      anime({
        targets: '.slick-center .slide-headline',
        opacity: 0,
      });
    });
}


$('#validation_message_1_1').on('change', function() {

	console.log('changed');
})
