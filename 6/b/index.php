<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <style type="text/css">
      .card{
        margin-top: 20px;
    margin-bottom: 20px;
      }
    </style>
    <title>Hello, world!</title>
  </head>
  <body style="background: #a8aeae;">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="logo_arkademy.png" style="max-width: 100px;"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li><input class="form-control mr-sm-2" type="search" placeholder="Search" id="txtsearch" ></li>
        </ul>
        <button class="btn btn-outline-info" type="button" id="ADD_DATA" >ADD</button>
      </div>
    </nav>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <table class="table table-bordered table-striped table-hover" id="table_data">
                <thead class="text-white" style="background-color: #3e91ce;">
                  <tr>
                    <th>No</th>
                    <th>Cashier</th>
                    <th>Product</th>
                    <th>Category</th>
                    <th style="text-align: center;">Price</th>
                    <th style="text-align: center;">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>Pevita Pearce</td>
                    <td>Latte</td>
                    <td>Drink</td>
                    <td style="text-align: right;">Rp. 10.000</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Pevita Pearce</td>
                    <td>Cake</td>
                    <td>Food</td>
                    <td style="text-align: right;">Rp. 20.000</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Raisa Andriana</td>
                    <td>Latte</td>
                    <td>Drink</td>
                    <td style="text-align: right;">Rp. 10.000</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Raisa Andriana</td>
                    <td>Cake</td>
                    <td>Food</td>
                    <td style="text-align: right;">Rp. 20.000</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>Aditia Rasid</td>
                    <td>Soto</td>
                    <td>Food</td>
                    <td style="text-align: right;">Rp. 45.000</td>
                    <td style="text-align: center;">
                      <a href="#" class="btn btn-warning">Edit</a>
                      <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

      <!-- Modal -->
      <div class="modal" id="modal_add" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Add Data</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form>
                <div class="form-group">
                  <label>Cashier</label>
                  <select class="form-control" id="chasier">
                    <option value="Pevita Pearce">Pevita Pearce</option>
                    <option value="Raisa Andriana">Raisa Andriana</option>
                    <option value="Aditia Rasid">Aditia Rasid</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" id="category">
                    <option value="Food">Food</option>
                    <option value="Drink">Drink</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Product</label>
                  <input type="text" class="form-control" id="product" >
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" id="price" >
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary" id="submit_data">Submit</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Modal -->
    </div>

    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script type="text/javascript">
      $("#ADD_DATA").click(function(){
        $("#modal_add").modal('show');
      });

      $("#submit_data").click(function(){
        var no = $("#table_data tbody tr").length+1;
        var row = '<tr>'+
                    '<td>'+no+'</td>'+
                    '<td>'+$("#chasier").val()+'</td>'+
                    '<td>'+$("#product").val()+'</td>'+
                    '<td>'+$("#category").val()+'</td>'+
                    '<td style="text-align: right;">Rp. '+$("#price").val()+'</td>'+
                    '<td style="text-align: center;">'+
                      '<a href="#" class="btn btn-warning">Edit</a> '+
                      '<a href="#" class="btn btn-danger">Delete</a></td>'+
                '</tr>';
        $("#table_data tbody").append(row);
        $("#modal_add").modal('hide');
      });
    </script>
  </body>
</html>