let shopWrapper = $('.shop-section');

export default {
  init() {
    // Shop widget
    isShopReady('.bo-garden', 500);
  },
};

function shopWidget() {
  $('.shop-tab').each(function(){
    let shopWidgetShow = $(this).find('.shop-widget-show');
    let widetHtml = $(this).find('.bo-garden').html();
    shopWidgetShow.html(widetHtml);
    shopWidgetShow.find('.bo-box').unwrap();
    shopWidgetShow.find('.bo-box a').unwrap();
    shopWidgetShow.find('a').wrap('<div class="col-6 col-md-3 shop-item"></div>');
    shopWidgetShow.find('img').wrap('<div class="reward-img d-flex justify-content-center align-items-center"><div></div></div>');
    $('.shop-all-html').append(shopWidgetShow.html());
  });

  setTimeout(function(){
    shopWrapper.addClass('go');
  }, 300);
}

function isShopReady(selector, time) {
  if(document.querySelector(selector)!=null) {
    shopWidget();
    return;
  } else {
    setTimeout(function() {
        isShopReady(selector, time);
    }, time);
  }
}

/*function shopArticleSlider() {

  // Shop This Article Pop-Up widget
  let shopArticleSlider = $('.shop-this-article-slider');

shopArticleSlider.slick({
  dots: false,
  infinite: false,
  arrows: true,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow:'<button type=\'button\' class=\'col_slider slick-prev pull-left\'><img src=\'../wp-content/uploads/2022/10/arrow-left.png\'></button>',
  nextArrow:'<button type=\'button\' class=\'col_slider slick-next pull-right\'><img src=\'../wp-content/uploads/2022/10/arrow-right.png\'></button>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: false,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
      },
    },
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
});



}*/
