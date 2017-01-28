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
      <div class="modal-body">
        <div class="customer-info row">
          <div class="col-md-8">
            <p>Full Name: Adrian Matos</p>
            <p>Address: Concepcion Grande Naga City</p>
            <p>Email Address: matos.adrianpaul@gmail.com</p>
            <p>Contact No: </p>
          </div>
          <div class="col-md-4">
            <p>Total: 12,989.12</p>
            <p></p>
            <p></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>

<script id="rowTemplate" type="text/x-handlebars-template">
  <tr>
    <td>{{ id }}</td>
    <td>{{ customer.firstname }} {{ customer.lastname }}</td>
    <td>{{ total_price }}</td>
    <td>{{ status }}</td>
  </tr>
</script>

<script src="../assets/js/dashboard-orders.js"></script>
<?php
$order = new Order();
$order->getAll();
include 'footer.php';
?>
