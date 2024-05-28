// import external dependencies
import 'jquery';

// Import everything from autoload
import './autoload/**/*'

import 'slick-carousel/slick/slick.min'

// import local dependencies
import Router from './util/Router';
import common from './routes/common';
import home from './routes/home';
import shop from './routes/shop';

/** Populate Router instance with DOM routes */
const routes = new Router({
  // All pages
  common,
  // Home
  home,
  // Shop
  shop,
});

// Load Events
jQuery(document).ready(() => routes.loadEvents());



// ShopWP - Add product type before product title
wp.hooks.addFilter('before.productTitle', 'shopwp', function (defaultValue, productState) {
  return '<p class="wps-product-type">' + productState.payload.productType + '</p>';
})

// ShopWP - Add brand name (aka vendor) after product title
wp.hooks.addFilter('after.productTitle', 'shopwp', function (defaultValue, productState) {
  return '<p class="wps-vendor-title">' + productState.payload.vendor + '</p>';
})

function myFunction() {
   var element = document.getElementById("myDIV");
   element.classList.toggle("mystyle");
}

