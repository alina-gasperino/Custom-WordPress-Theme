<section class="is-dropdown contact-menu bg-tan align-center">
  <div class="container">
    <div class="d-flex justify-content-between contact-details">
      @while ( have_rows('contact_info', 'options') ) @php(the_row())
      <div class="contact-wrap align-center">
        <h3 class="headline-3 font-cadiz-light contact-desc">{{ get_sub_field('contact_desc') }}</h3>
        <div class="margin-top--20">
          <img src="@asset('images/icons/contact-arrow.svg')" alt="Contact">
        </div>
        <div class="sm-headline margin-top--20">
          <a href="mailto:{{ get_sub_field('contact_info') }}">{{ get_sub_field('contact_info') }}</a>
        </div>
      </div>
      @endwhile
    </div>
  </div>
</section>
