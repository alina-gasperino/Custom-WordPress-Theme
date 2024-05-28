<?php $tabs = get_field('tabs') ?>
<section class="shop-tabs bg-tan-light ">
  <nav class="shop-nav hide-lg">
    <ul class="d-flex justify-content-center no-formate nav nav-pills" id="pills-tab" role="tablist">
      <?php $tabCount = 1; ?>
      <li class="sm-headline caps nav-item"> <a class="active" data-toggle="pill" id="pills-shop-all-tab" href="#pills-shop-all" aria-controls="pills-shop-all" role="tab" aria-selected="true">All</a> </li>
      @foreach($tabs as $tab)
        <?php $tabName = str_replace(' ', '-', $tab['tab_name']); ?>
        <li class="sm-headline caps nav-item"> <a class="" data-toggle="pill" id="pills-{{ strtolower($tabName) }}-tab" href="#pills-{{ strtolower($tabName) }}" aria-controls="pills-{{ strtolower($tabName) }}" role="tab" aria-selected="false">{{ $tab['tab_name'] }}</a> </li>
      @php($tabCount++)
      @endforeach
    </ul>
  </nav>
</section>

<section class="shop-section">
  <div class="container-lrg margin-top--70">
    <div class="tab-content" id="pills-tabContent">

      <div class="shop-tab tab-pane fade active show" id="pills-shop-all" role="tabpanel" aria-labelledby="pills-shop-all-tab">
        <div class="shop-widget-show d-flex flex-wrap shop-all-html"></div>
      </div>

      <?php $tabCount = 1; ?>
      @foreach($tabs as $tab)
      <?php $tabName = str_replace(' ', '-', $tab['tab_name']); ?>
      <div class="shop-tab tab-pane fade" id="pills-{{ strtolower($tabName) }}" role="tabpanel" aria-labelledby="pills-{{ strtolower($tabName) }}-tab">
        <div class="shop-widget--hidden">
          <?php echo $tab['shop_widget'] ?>
        </div>
        <div class="shop-widget-show d-flex flex-wrap"></div>
      </div>
      @php($tabCount++)
      @endforeach
    </div>
  </div>
</section>
