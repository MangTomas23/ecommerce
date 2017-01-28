$(document).ready( function() {
  console.log(getCartItems());
  var ids = [];
  $.each(getCartItems(), function(i,x) {
    console.log(x);
    ids[x] = (ids[x] || 0)+1;
  });
});
