<?php
$page_title = 'Products';
include 'header.php';
?>

<div class="top-controls">
  <button type="button" class="btn btn-default" name="button" data-toggle="modal"
          data-target="#add-product-modal">
    Add Product
  </button>
</div>

<div class="product-list container">
</div>

<div id="add-product-modal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" name="button">
          <span>&times;</span>
        </button>
        <h4 class="modal-title">Add Product</h4>
      </div>
      <div class="modal-body">
        <div class="modal-add-product">
          <form id="frmAddProduct">
            <div class="product-image">
              <img src="../assets/img/placeholder-image.png" alt="" />
              <div class="upload-button">
                <input type="file" id="uploadImage" name="image" value="">
              </div>
            </div>
            <div class="product-form">
              <div class="form-group">
                <label for="">Product Name: </label>
                <input type="text" class="form-control" name="name" value="">
              </div>
              <div class="form-group">
                <label for="">Price: </label>
                <input type="text" class="form-control" name="price" value="">
              </div>
              <div class="form-group">
                <label for="">Description: </label>
                <textarea name="description" class="form-control"></textarea>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="modal-footer">
        <button id="btnAddProductSave" type="button" class="btn btn-primary" name="button">Save</button>
      </div>
    </div>
  </div>

</div>

<div id="productModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" name="button" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <h4 class="modal-title">Product Details</h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" name="button">Update</button>
      </div>
    </div>
  </div>
</div>

<script id="product-container-template" type="text/x-handlebars-template">
  <div class="col-md-3 col-sm-6">
    <div class="product-container" data-id="{{ id }}">
      <div class="product-image">
        <img src="../uploads/{{ image }}" alt="" />
      </div>
      <div class="product-info">
        <p class="product-name">{{ name }}</p>
        <p class="product-price">₱ {{ price }}</p>
      </div>
    </div>
  </div>
</script>

<script id="productModalTemplate" type="text/x-handlebars-template">
  <div class="row">
    <div class="col-sm-6">
      <img src="../uploads/14.jpg" alt="" />
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Product Name:</label>
        <input type="text" class="form-control" name="name" value="{{ name }}">
      </div>
      <div class="form-group">
        <label>Price:</label>
        <input type="text" class="form-control" name="price" value="{{ price }}">
      </div>
      <div class="form-group">
        <label>Description:</label>
        <textarea name="description" class="form-control">{{ description }}</textarea>
      </div>
    </div>
  </div>
</script>

<script src="../assets/js/dashboard-products.js"></script>
<?php include 'footer.php'; ?>
