$(document).ready( function() {
  getAllProducts();


  function getAllProducts() {
    $.ajax({
      url: '../Controllers/Product.php',
      data: {
        action: 'listall'
      }
    }).done( function(data) {
      var source = $('#product-container-template').html();
      var template = Handlebars.compile(source);

      $.each($.parseJSON(data), function(i, product) {
        $('.product-list').append(template(product));
      });
    });
  }
});
