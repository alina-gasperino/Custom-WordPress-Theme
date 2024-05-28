<!-- Homepage Newsletter Embed -->
<section class="bg-tan block-padding">
  <div class="container-lrg">
    <div class="d-md-flex row align-items-center justify-content-between">
      <div class="news-img col-md-7 col-md-7--lrg">
        <img src="{{ get_field('newsletter_image') }}" alt="Newsletter" class="w-100">
      </div>

      <div class="col-md-5 col-md-5--lrg align-center margin-top-md--20">
        <h2>@php(the_field('newsletter_headline'))</h2>
        <div class="newsletter-form margin-top--40">
          <?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
        </div>
      </div>
    </div>
  </div>
</section>

<style>

.gform_button {
    background-color: #D6BFAE !important;
  }
</style>
