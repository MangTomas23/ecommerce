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
        product.price = formatNumber(product.price);
        $('.product-list').append(template(product));
      });
    });
  }

  function previewImage(input, img) {
    if(typeof(FileReader) != "undefined") {
      var reader = new FileReader();
      reader.onload = function(e) {
        $(img).attr('src', e.target.result);
      }

      reader.readAsDataURL($(input)[0].files[0]);
    }
  }

  $('#uploadImage').on('change', function() {
    previewImage($(this), $('.modal-add-product .product-image img'));
  });

  $(document.body).on('change','#btnUpdateImage', function() {
    previewImage($(this), $('#productModal img'));
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
        clearForm();
        $('#add-product-modal').modal('hide');
      }
    })
  });

  function clearForm() {
    var formInputs = $('#frmAddProduct input');
    console.log(formInputs);
    $.each(formInputs, function() {
      $(this).val('');
    })
    $('#frmAddProduct img').attr('src', '../assets/img/placeholder-image.png');
    $('#frmAddProduct textarea').val('');
  }

  window.clearForm = clearForm;

  $(document.body).on('click', '.product-container', function() {
    $.ajax({
      url: '../Controllers/Product.php',
      data: {
        action: 'get',
        id: $(this).data('id')
      }
    }).done( function(data) {
      var modal = $('#productModal .modal-body');
      modal.empty();
      var template = Handlebars.compile($('#productModalTemplate').html());
      modal.append(template($.parseJSON(data)));
    });

    $('#productModal').modal('show');
  });

  $(document.body).on('submit', '#productModalForm', function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    formData.append('action', 'update');
    formData.append('id', $(this).data('id'));
    $.ajax({
      url: '../Controllers/Product.php',
      type: 'post',
      data: formData,
      contentType: false,
      cache: false,
      processData: false,
      success: function(data) {
        getAllProducts();
        setTimeout(function() {
          getAllProducts();
        }, 5000);
      }
    });
  });

  $('#btnUpdate').on('click', function() {
    $('#productModalForm').submit();
    $('#productModal').modal('hide');
  });
});
