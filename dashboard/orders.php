<?php
$page_title = 'Orders';
include 'header.php';
require '../Classes/Order.php';
?>

<h1 class="header-title">ORDERS</h1>

<table class="table table-default table-striped order-table">
  <thead>
    <tr>
      <th>ID</th>
      <th>CUSTOMER</th>
      <th>TOTAL</th>
      <th>STATUS</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>

<div id="orderModal" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" name="button">
          <span>&times;</span>
        </button>
        <h4 class="modal-title">ORDER DETAILS</h4>
      </div>
      <div class="order-info modal-body">

      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<script id="customerInfoTemplate" type="text/x-handlebars-template">
  <div class="customer-info row">
    <div class="col-xs-8">
      <p>Full Name: {{ customer.firstname }} {{ customer.lastname }}</p>
      <p>Address: {{ customer.address }}</p>
      <p>Email Address: {{ customer.email }}</p>
      <p>Contact No: {{ customer.contact_no }}</p>
    </div>
    <div class="col-xs-4">
      <p>Total: {{ total_price }}</p>
      <p class="status">Status:
        <select>
          {{#select status}}
          <option value="IN PROCESS">IN PROCESS</option>
          <option value="PROCESSING">PROCESSING</option>
          <option value="COMPLETED">COMPLETED</option>
          {{/select}}
        </select>
        <button id="btnUpdateStatus" data-id="{{ id }}">Update</button>
      </p>
    </div>
  </div>
  <div class="row">
    <div class="order-items-list">

    </div>
  </div>
</script>

<script id="rowTemplate" type="text/x-handlebars-template">
  <tr data-id="{{ id }}">
    <td>{{ id }}</td>
    <td>{{ customer.firstname }} {{ customer.lastname }}</td>
    <td>{{ total_price }}</td>
    <td>{{ status }}</td>
  </tr>
</script>

<script id="orderItemsTemplate" type="text/x-handlebars-template">
  <div class="order-item row">
    <div class="col-xs-2">
      <img src="../uploads/14.jpg" />
    </div>
    <div class="col-xs-5">
      <table>
        <tbody>
          <tr>
            <td>ID:</td>
            <td>{{ product.id }}</td>
          </tr>
          <tr>
            <td>Product Name:</td>
            <td>{{ product.name }}</td>
          </tr>
          <tr>
            <td>Price</td>
            <td>{{ product.price }}</td>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="col-xs-2 quantity">
      x {{ quantity }}
    </div>
    <div class="col-xs-3 total">
      {{ product.total }}
    </div>
  </div>
</script>
<script src="../assets/js/dashboard-orders.js"></script>
<?php
$order = new Order();
$order->getAll();
include 'footer.php';
?>
