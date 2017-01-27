$(document).ready( function() {
  getAllProducts();


  function getAllProducts() {
    $('.product-list').empty();
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

  $('#uploadImage').on('change', function() {
    if(typeof(FileReader) != "undefined") {
      var reader = new FileReader();
      reader.onload = function(e) {
        $('.modal-add-product .product-image img').attr('src', e.target.result);
      }

      reader.readAsDataURL($(this)[0].files[0]);
    }
  });

  $('#btnAddProductSave').on('click', function() {
    $('#frmAddProduct').submit();
  });

  $('#frmAddProduct').on('submit', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('action', 'add');
    $.ajax({
      url: '../Controllers/Product.php',
      type: 'post',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        console.log(data);
        getAllProducts();
        $('#add-product-modal').modal('hide');
      }
    })
  });
});
