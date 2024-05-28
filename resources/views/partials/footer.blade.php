<div class="footer border-top--brown bg-tan">
  <div class="container-lrg">
    <div class="d-lg-flex align-items-center justify-content-lg-between row">
      <div class="col-12 col-lg-4 order-lg-1">
        <ul class="no-formate d-flex align-items-center justify-content-center social-icons">
          <li> <a href="https://www.instagram.com/ameliving/" target="_blank"> <img src="@asset('images/icons/instagram.svg')" alt=""> </a> </li>
          <li> <a href="https://www.pinterest.com/ameliving/" target="_blank"> <img src="@asset('images/icons/pinterest.svg')" alt=""> </a> </li>
          <li> <a href="https://www.facebook.com/amelivingco" target="_blank"> <img src="@asset('images/icons/facebook.svg')" alt=""> </a> </li>
          <li> <a href="https://twitter.com/amelivingco" target="_blank"> <img src="@asset('images/icons/twitter.svg')" alt=""> </a> </li>
          <li> <a href="https://www.youtube.com/channel/UC1W_-s386TJ3GP2l0nI3tdA/about?view_as=subscriber" target="_blank"> <img src="@asset('images/icons/youtube.svg')" alt=""> </a> </li>
        </ul>
      </div>

      <div class="col-12 col-md-6 col-lg-4 order-lg-0 d-md-flex justify-content-md-center justify-content-lg-start align-center-lg align-items-center">
        <div class="">
          <div class="sm-headline caps footer-terms">
            ©copyright Âmé
          </div>
        </div>
        <!-- <div class="">
          <a href="http://nicepeople.com" target="_blank" class="sm-headline caps footer-terms">Made By Nice People</a>
        </div> -->
      </div>
      <div class="col-12 col-md-6 col-lg-4 d-md-flex justify-content-md-center justify-content-lg-end align-items-center order-3 align-center-lg">
        <div class="">
          <a href="{{ home_url('privacy-policy') }}" target="_blank" class="sm-headline caps footer-terms">Privacy Policy</a>
        </div>
        <div>
        <a href="{{ home_url('terms-conditions') }}" target="_blank" class="sm-headline caps footer-terms">Terms & Conditions</a>
        </div>
      </div>
  </div>
</div>
</div>

<!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

<script>
// Start marquee
/*jQuery('.marquee_text').marquee({
    direction: 'top',
    duration: 10000,
    gap: 50,
    delayBeforeStart: 0,
    duplicated: true,
    startVisible: true,
    height:200,
    width:600
});*/
</script>

<style type="text/css">
  .marquee_text{
    font-size: 3rem;
    /*font-weight: bold;*/
    line-height: 7rem;
    position: absolute;
    transform: translateY(-50%);
    bottom: 480px;
    font-family: "Ogg Italic", sans-serif;
  }
  /*.marquee_text .marquee-second {
    font-size: 3.5rem;
    font-weight: bold;
    line-height: 7rem;
    position: absolute;
    transform: translateY(-50%);
    bottom: 480px;
    font-family: 'Ogg', serif !important;
  }*/
  .section-banner-2 {
    background-color: #f8f4f1;
/*    max-height: 700px;*/
    overflow: hidden;
  }
  .marquee-text {
    transform: rotate(90deg);
  }

  .marquee_text span {
    position: relative;
/*    top: 12px;*/
    justify-content: center;
  }
  .dot-icon {
    top: -13px !important;
    font-family: serif;
  }
  .marquee-text-inner {
    font-family: Ogg, serif !important;
/*    font-family: "Ogg Italic", sans-serif !important;*/
  }

  .custom-banner .mejs-container.wp-video-shortcode.mejs-video, .custom-banner video.wp-video-shortcode, .custom-banner .wp-video {
    width: 100% !important;
  }

  .custom-banner img {
/*    height: 62vh;*/
    max-width: 100%;
    width: 100%;
  }
  .custom-banner {
    height: 600px;
    display: flex;
    align-items: center;
  }
  .custom-banner .slider-banner-image .embed-container {
    padding-bottom: 0px;
  }
  
  @media only screen and (max-width: 1700px) {
    .marquee-text {
      position: relative;
      left: -80px;
    }
  }

  @media only screen and (max-width: 1500px) {
    .marquee-text {
      position: relative;
      left: -140px;
    }
  }

  @media only screen and (max-width: 1400px) {
    .marquee-text {
      position: relative;
      left: -180px;
    }
    .marquee_text {
      font-size: 4rem;
    }
  }

  @media only screen and (max-width: 1200px) {
    .marquee-text {
      position: relative;
      left: -250px;
    }
  }

  @media only screen and (max-width: 1024px) {
    .marquee-text {
      position: relative;
      left: -320px;
    }
  }

  @media only screen and (max-width: 767px) {
    .section-banner-2 {
      max-height: initial;
      height: initial;
    }
    .banner-section-3 {
      width: 100%;
    }
    .marquee-text {
      left: 0;
    }
    .marquee-text {
      transform: rotate(0);
    }
    .marquee_text {
      font-size: 28px;
      transform: translateY(0);
      bottom: -90px;
    }
    /*.marquee_text span {
      top: 7px;
    }*/
    .dot-icon {
      top: -6px !important;
      font-family: serif;
    }
    .js-marquee {
      margin-right: 0px !important;
    }
  }

</style>