<!-- Newsletter Pop-up -->
<div class="modal--wrapper new-scrollbar">
  <div class="center--it">
    <div class="modal--content modal--content-black">
      <img src="@asset('images/newsletter/close-btn.svg')" alt="" class="close-modal close-desktop">
      <!-- <img src="@asset('images/global/close-dark.svg')" alt="" class="close-modal close-mobile"> -->
      <div class="d-md-flex align-items-stretch">
        <div class="col-md-6 modal-email-photo bg-cover" style="background-image: url('@asset('images/newsletter/newsletter-bg.png')')">
        </div>
        <div class="col-md-6 modal-c-wrap">
          <!-- Form headline -->
          <div class="splash-form align-center">
            <h2 class="">
              Awaken Your Inbox.
            </h2>

            <div class="splash-page--form color--white margin-top--60">
              @php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]') @endphp
            </div>
            <div class="manual-close-form margin-top--70">
              <p class="md-headline caps modal--trigger">No Thanks</p>
            </div>
            <hr width="45%" height="0.5">

          </div> <!-- /splash-form -->
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal--trigger" style="display: none;"></div>

<?php
if (!isset($_COOKIE['email-newsletter'])) {
  setcookie("email-newsletter", "true", time()+86400, "/");
?>
<script type="text/javascript">
jQuery(window).load(function(){
  setTimeout(function(){
    jQuery('.modal--trigger').trigger('click');
  }, 55000);
});
</script>
<?php
}
?>
<style>
  .splash-form hr {
    background-color: #000;
  }
</style>