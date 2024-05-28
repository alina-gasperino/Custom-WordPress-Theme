import anime from 'animejs'
require('waypoints/lib/jquery.waypoints.js');
require('waypoints/lib/shortcuts/sticky.js');

let timer;
let isDropdownActive = false;

export default {
  init() {

    // JavaScript to be fired on all pages
    pageLoad();

    // JavaScript to be fired on all pages
    shareHover();

    // Follow Dropdown
    followDropdown();

    // Category Dropdown
    categoryDropdown();

    // Search Bar
    searchBar();

    // Contact Dropdown
    contactDropdown();

    // Shop Dropdown
    shopDropdown();

    // Mobile Menu
    mobileMenu();

    mobileSubMenu();

    newsletterModal();

    featuredSlider();

    quoteSlider();


    shopThisArticleSlider();



    $('.linkPinIt').click(function(){
      var url = $(this).attr('href');
      var media = $(this).attr('data-image');
      var desc = $(this).attr('data-desc');
      window.open("//www.pinterest.com/pin/create/button/"+
      "?url="+url+
      "&media="+media+
      "&description="+desc,"_blank","top=0,right=0,width=750,height=320");
      return false;
    });

    $('.mobile-menu-links li.menu-item-has-children a:first-of-type').append('<div class="open-close"><i class="icon ion-md-add"></i></div>');
    // Mobile Contact Trigger
    $('.mobile-contact-trigger').click(function(e){
      e.preventDefault();
      $('.mobile-contact').toggleClass('go');
    });

    // Mobile Shop Trigger
     $('.mobile-shop-trigger').click(function(e){
      e.preventDefault();
      $('.mobile-shop').toggleClass('go');
    });

    $('.down-arrow').click(function(){
      let btn = $(this);
      var page = $(this).attr('data-page');
      var related_to = $(this).attr('data-related-to');
      var maxpages = parseInt($(this).attr('data-max'));

  		$.ajax({ // you can also use $.post here
  			url : ajax_url, // AJAX handler
  			data : {
          action: 'vanish_loadmore',
          page: page,
          related_to: related_to,
        },
  			type : 'POST',
  			beforeSend : function ( xhr ) {
  				//button.text('Loading...'); // change the button text, you can also add a preloader image
  			},
  			success : function( data ){
  				if( data ) {
            $('.related-wrapper').append(data);
            if(parseInt(page) == maxpages) {
              console.log('no-more');
              btn.remove();
            }

            let newpage = parseInt(page) + 1;

            btn.attr('data-page', newpage);
  				} else {
  				      btn.remove();
  				}
  			}
  		});
	   });

  },
  finalize() {

    // Reward Style Widget
    rewaredStyleSlider();

    new Waypoint.Sticky({
      element: $('#primary-nav')[0],
    });

  },
};

function pageLoad(){
  $(window).load(function(){
    anime({
      targets: '.max-wrapper',
      opacity: 1,
    });
  });
}

function shareHover() {
  $('.share-post').mouseenter(function(){
    $(this).find('.share-text').addClass('fade-out');
    $(this).find('.social-icons-share').addClass('fade-in');
  });

  $('.share-post').mouseleave(function(){
    $(this).find('.share-text').removeClass('fade-out');
    $(this).find('.social-icons-share').removeClass('fade-in');
  });

  $('.share-post').click(function(){
    $(this).find('.share-text').addClass('fade-out');
    $(this).find('.social-icons-share').addClass('fade-in');
  });
}

function mobileSubMenu() {
  let currentMenuItem = false;

  $('.mobile-menu li .sub-menu a').click(function(){
    window.location.href = $(this).attr('href');
  });

  $('.mobile-menu li.menu-item-has-children').click(function(e){

    e.preventDefault();

    //$('.mobile-menu li.menu-item-has-children').removeClass('go');

    if(!currentMenuItem) {
      $(this).addClass('go');
      currentMenuItem = $(this);
      return;
    }

    if($(this).hasClass('go')) {
      $(this).removeClass('go');
    } else {
      $('.mobile-menu li.menu-item-has-children').removeClass('go');
      $(this).addClass('go');
    }


  });
}

let animationReverse = false;

function mobileMenu() {
  $('.hamburger--slider').click(function(){
    $('body').toggleClass('no-scroll');
    if($(this).hasClass('is-active')) {
      animationReverse = true;
      $(this).removeClass('is-active');
      setTimeout(function() {
        $('.primary-nav-wrapper').removeClass('bg-tan')
      }, 600);
    } else {
      animationReverse = false;
      $('.mobile-menu').addClass('go');
      $(this).addClass('is-active');
      $('.primary-nav-wrapper').addClass('bg-tan')
    }

    if(animationReverse) {
      let mobileMenuTimelineReverse = anime.timeline({
        easing: 'linear',
        duration: 200,
      });

      mobileMenuTimelineReverse
      .add({
        targets: '.mobile-menu-links',
        translateY: (0, '-50px'),
        opacity: 0,
        easing: 'linear', //'linear', // easeInOutExpo
        duration: 200,
      })
      .add({
        targets: '.mobile-menu',
        opacity: 0,
        easing: 'linear', //'linear', // easeInOutExpo
        duration: 100,
        complete: function(){
          $('.mobile-menu').removeClass('go');
        },
      });

    } else {
      let mobileMenuTimeline = anime.timeline({
        easing: 'linear',
        duration: 200,
      });

      mobileMenuTimeline
      .add({
        targets: '.mobile-menu',
        opacity: 1,
        easing: 'linear', //'linear', // easeInOutExpo
        duration: 100,
      })
      .add({
        targets: '.mobile-menu-links',
        translateY: ('-50px', 0),
        opacity: 1,
        easing: 'linear', //'linear', // easeInOutExpo
        duration: 200,
      });
    }

  });
}

function contactDropdown() {
  //let isFollowWorking = false;

  var contactMenu = anime.timeline({
    easing: 'linear',
    autoplay: false,
    begin: function() {
      //isFollowWorking = true;
    },
    complete: function() {
      setTimeout(function(){
        //isFollowWorking = false;
      }, 1000);
    },
  });

  contactMenu.add({
    targets: '.contact-menu',
    translateY: [0, '100%'],
    duration: 200,
  })
  .add({
    targets: '.contact-menu .contact-details',
    opacity: [0, 1],
    translateY: [-10, 0],
    duration: 200,
  }, 400);


  $('.contact-parent').on('mouseenter', function(e){
    e.preventDefault();

    if(isDropdownActive){
      return;
    }

    isDropdownActive = true;
    clearTimeout(timer);

    if (contactMenu.reversed) {
      contactMenu.reverse();
    }

    contactMenu.play();
  });

  $('.contact-parent, .contact-menu').on('mouseleave', function(){

      timer = setTimeout(function(){
        //if(!isFollowWorking) {
          if( !isHovered('.contact-menu') && !isHovered('.contact-parent') ) {
            if (!contactMenu.reversed) {
              contactMenu.reverse();
            }
            contactMenu.play();
            isDropdownActive = false;
          }
        //}
      }, 400);

  });
}

function shopDropdown() {
  //let isFollowWorking = false;

  var shopMenu = anime.timeline({
    easing: 'linear',
    autoplay: false,
    begin: function() {
      //isFollowWorking = true;
    },
    complete: function() {
      setTimeout(function(){
        //isFollowWorking = false;
      }, 1000);
    },
  });

  shopMenu.add({
    targets: '.shop-menu',
    translateY: [0, '100%'],
    duration: 200,
  })
  .add({
    targets: '.shop-menu .shop-details',
    opacity: [0, 1],
    translateY: [-10, 0],
    duration: 200,
  }, 400);


  $('.shop-parent').on('mouseenter', function(e){
    e.preventDefault();

    if(isDropdownActive){
      return;
    }

    isDropdownActive = true;
    clearTimeout(timer);

    if (shopMenu.reversed) {
      shopMenu.reverse();
    }

    shopMenu.play();
  });

  $('.shop-parent, .shop-menu').on('mouseleave', function(){

      timer = setTimeout(function(){
        //if(!isFollowWorking) {
          if( !isHovered('.shop-menu') && !isHovered('.shop-parent') ) {
            if (!shopMenu.reversed) {
              shopMenu.reverse();
            }
            shopMenu.play();
            isDropdownActive = false;
          }
        //}
      }, 400);

  });
}


function searchBar() {
  var searchMenu = anime.timeline({
    easing: 'linear',
    autoplay: false,
  });

  searchMenu.add({
    targets: '.search-menu',
    translateY: [0, '100%'],
    duration: 200,
  })
  .add({
    targets: '.search-menu .search-form',
    opacity: [0, 1],
    translateY: [-10, 0],
    duration: 200,
    complete: function() {
      $('.search-field').focus();
    },
  }, 400);


  $('.search-event').on('click', function(e){
    e.preventDefault();
    $(this).toggleClass('is-active');

    if($(this).hasClass('is-active')) {
      if (searchMenu.reversed) {
        searchMenu.reverse();
      }
      searchMenu.play();
    } else {
      if (!searchMenu.reversed) {
        searchMenu.reverse();
      }
      searchMenu.play();
    }

  });



  // $('.search-event, .search-menu').on('mouseleave', function(){
  //   timer = setTimeout(function(){
  //     if( !isHovered('.search-menu') && !isHovered('.search-event') ) {
  //       if (!searchMenu.reversed) {
  //         searchMenu.reverse();
  //       }
  //       searchMenu.play();
  //       isDropdownActive = false;
  //     }
  //   }, 600);
  // });
}

function categoryDropdown() {
  var catMenu = anime.timeline({
    easing: 'linear',
    autoplay: false,
  });

  catMenu.add({
    targets: '.category-menu',
    translateY: [0, '100%'],
    duration: 200,
  })
  .add({
    targets: '.cat-wrapper',
    opacity: [0, 1],
    translateY: [-10, 0],
    duration: 200,
  }, 400);

  $('.menu-item-object-category').on('mouseenter', function(e){
    e.preventDefault();
    $('.sub-menu--drop').removeClass('active');
    let activeDropdown = $(this).find('a').data('dropdown');
    $('.' + activeDropdown).addClass('active');

    if(isDropdownActive){
      return;
    }

    isDropdownActive = true;
    clearTimeout(timer);

    if (catMenu.reversed) {
      catMenu.reverse();
    }
    catMenu.play();
  });

  $('.cat-nav li, .category-menu').on('mouseleave', function(){
    timer = setTimeout(function(){
      if (!isHovered('.cat-nav li') && !isHovered('.category-menu')) {

        if (!catMenu.reversed) {
          catMenu.reverse();
        }
        catMenu.play();

        isDropdownActive = false;
      }
    }, 200);
  });
}

function followDropdown() {
  //let isFollowWorking = false;

  var followMenu = anime.timeline({
    easing: 'linear',
    autoplay: false,
    begin: function() {
      //isFollowWorking = true;
    },
    complete: function() {
      setTimeout(function(){
        //isFollowWorking = false;
      }, 1000);
    },
  });

  followMenu.add({
    targets: '.follow-menu',
    translateY: [0, '100%'],
    duration: 200,
  })
  .add({
    targets: '.follow-menu .social-icons',
    opacity: [0, 1],
    translateY: [-10, 0],
    duration: 200,
  }, 400);


  $('.follow-parent').on('mouseenter', function(e){
    e.preventDefault();

    if(isDropdownActive){
      return;
    }

    isDropdownActive = true;
    clearTimeout(timer);

    if (followMenu.reversed) {
      followMenu.reverse();
    }

    followMenu.play();
  });

  $('.follow-parent, .follow-menu').on('mouseleave', function(){

        timer = setTimeout(function(){
          //if(!isFollowWorking) {
            if( !isHovered('.follow-menu') && !isHovered('.follow-parent') ) {
              if (!followMenu.reversed) {
                followMenu.reverse();
              }
              followMenu.play();
              isDropdownActive = false;
            }
          //}
        }, 400);

  });
}

function isHovered(selector) {
  return $(selector+':hover').length;
}

function setupStylesSlider(rwidget) {
  let slideHtml = rwidget.find('.stp-slide').html();
  rwidget.find('.vanish-reward-widget').html(slideHtml);
  rwidget.find('a').wrap('<div></div>');
  rwidget.find('img').wrap('<div class="reward-img d-flex justify-content-center align-items-center"><div></div></div>');
}

function rewaredStyleSlider() {

  if($('.stp-slide').length > 0){ //if the container is visible on the page
    let rewardSlider = $('.vanish-reward-widget');
    let numShow = rewardSlider.attr('data-count');
    let numShowMobile = rewardSlider.attr('data-count-mobile');

    if(!numShow) {
      numShow = 4;
    }

    if(!numShowMobile) {
      numShowMobile = 1;
    }

    $('.shopable-widget').each(function(){
        setupStylesSlider($(this));
    });

    setTimeout(function(){
      rewardSlider.slick({
        slidesToShow: numShow,
        arrows: true,
        draggable: true,
        dots: false,
        autoplay: false,
        responsive: [
          {
            breakpoint: 768,
            settings: {
              slidesToShow: numShowMobile,
            },
          },
        ],
      });
      rewardSlider.addClass('go');
    }, 1000);
  } else {
    setTimeout(rewaredStyleSlider, 50); //wait 50 ms, then try again
  }

}

function featuredSlider() {
  let featuredSlider =  $('.featured-slider');
  featuredSlider.slick({
    slidesToShow: 4,
    arrows: false,
    draggable: true,
    dots: true,
    autoplay: true,
    infinite: true,
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        },
      },
    ],
  });
}

function quoteSlider(){
  let quoteSlider = $('.quote-slider');

  quoteSlider.slick({
    slidesToShow: 1,
    arrows: false,
    draggable: true,
    dots: false,
    autoplay: true,
    infinite: true,
    fade: true,
  });
}


function newsletterModal() {
  $('.modal--trigger').click(function(e){
      e.preventDefault();

      let modalTarget = $('.modal--wrapper');
      let modalContent = $('.modal--content');
      $(modalTarget).addClass('active');

      anime({
        targets: modalTarget[0],
        opacity: [0, 1],
      });

      anime({
        targets: modalContent[0],
        opacity: [0, 1],
        translateY: [-50, 0],
        delay: 500,
      });

    });

    $('.close-modal').click(function(e){
      e.preventDefault();

      let modalTarget = $('.modal--wrapper');
      let modalContent = $('.modal--content');

      anime({
        targets: modalContent[0],
        opacity: [1, 0],
        translateY: [0, -50],
      });

      anime({
        targets: modalTarget[0],
        opacity: [1, 0],
        delay: 200,
        complete: function(anim) {
         $(modalTarget).removeClass('active');
        },
      });

    });
}
function shopThisArticleSlider(){
  // JavaScript to be fired on the single blog post page
    let shopThisArticleSlider1 = $('.shop-this-article-slider');
    //let metaBox = $('.featured--slider-controls');

    // Init slider
    shopThisArticleSlider1.slick({
      dots: false,
      infinite: false,
      arrows: true,
      draggable: false,
      lazyLoad: 'ondemand',
      speed: 300,
      slidesToShow: 4,
      slidesToScroll: 1,
      prevArrow:'<button type=\'button\' class=\'bg-transparent col_slider slick-prev pull-left\'><img src=\'../wp-content/uploads/2022/10/arrow-left.png\'></button>',
      nextArrow:'<button type=\'button\' class=\'bg-transparent slick-next pull-right\'><img src=\'../wp-content/uploads/2022/10/arrow-right.png\'></button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 3,
            slidesToScroll: 1,
            infinite: false,
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
            slidesToShow: 1,
            slidesToScroll: 1,
          },
        },
        ],
    });

    shopThisArticleSlider1.on('beforeChange', function(){
      // Fade out the meta data for current slide
      anime({
        targets: '.slick-center .slide-headline',
        opacity: 0,
      });
    });
}
