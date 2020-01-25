<?php
require_once 'config/connection.php';
?>
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
            <form id="SAVE_DATA">
            <div class="modal-body">
                <div class="form-group">
                  <input type="hidden" name="id">
                  <label>Cashier</label>
                  <select class="form-control" id="chasier" name="chasier">
                    <?php
                      $q_chasier = mysqli_query($con, "SELECT id,name FROM cashier") or die(mysqli_error($con));
                      while ($row = mysqli_fetch_assoc($q_chasier)) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Category</label>
                  <select class="form-control" id="category" name="category">
                    <?php
                      $q_category = mysqli_query($con, "SELECT id,name FROM category") or die(mysqli_error($con));
                      while ($row = mysqli_fetch_assoc($q_category)) {
                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                      }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Product</label>
                  <input type="text" class="form-control" id="product" name="product">
                </div>
                <div class="form-group">
                  <label>Price</label>
                  <input type="number" class="form-control" id="price" name="price">
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn btn-primary" id="submit_data">Submit</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- Modal -->
    </div>

    <script src="js/jquery-3.4.1.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <script type="text/javascript">
      var save_method;
      GET_DATA();
      $("#ADD_DATA").click(function(){
        $("#modal_add").modal('show');
        $('.modal-title').text('Add Data'); 
        save_method = 'save';
      });
      
      $("#txtsearch").change(function(){
        GET_DATA($(this).val());
      });

      function GET_DATA(id){
        if (id == undefined) {
          id = "";
        }
        var arr = [];
        $("#table_data tbody tr").remove()
        $.ajax({
          url: 'getdata/getdata.php?act=get_all&cari='+id,
          type:'GET',
          dataType: 'json',
          success: function(data){
            data = data['data'];
            $.each(data, function(index,array){
              var no = index+1;
              var mbuh = {'NO': no, 'ID':array['id'], 'cashier' : array['cashier'], 'product' : array['product'], 'category' : array['category'], 'price' : array['price']};
              arr.push(mbuh);
            })
            //console.log(arr);
            tampilTable(arr);
          } 
        });
      }

      function tampilTable(arr){
        var row = '';
        $.each(arr, function(index, value){
          
          row += '<tr>'+
                  '<td>'+value.NO+'</td>'+
                  '<td>'+value.cashier+'</td>'+
                  '<td>'+value.product+'</td>'+
                  '<td>'+value.category+'</td>'+
                  '<td style="text-align: right;">Rp. '+value.price+'</td>'+
                  '<td style="text-align: center;">'+
                    '<button onclick="edit_data(\''+value.ID+'\')" class="btn btn-warning">Edit</button> '+
                    '<button onclick="delete_data(\''+value.ID+'\')" class="btn btn-danger">Delete</button></td>'+
              '</tr>';
          
        });
        
        $("#table_data tbody").append(row);
      }

      function edit_data(id){
        save_method = "edit";
       
        $.ajax({
            url : "getdata/getdata.php?act=get_by_id&id="+id,
            type: "GET",
            success: function(data){
              console.log(data);
              dapet = $.parseJSON(data);
              data = dapet['data'];
              
              $('[name="product"]').val(data[0].name);
              $('[name="category"]').val(data[0].id_category);
              $('[name="chasier"]').val(data[0].id_cashier);
              $('[name="price"]').val(data[0].price);
              $('[name="id"]').val(data[0].id);
              $("#modal_add").modal('show');
              $('.modal-title').text('Edit Data'); 
                
            }
        });
      }

      function delete_data(id){
        var result = confirm("Are you sure to delete this data ?");
        if (result) {
            $.ajax({
              url: "postdata/postdata.php",
              type: "POST",
              data: "id="+id+"&act=delete_data",
              dataType: "JSON",
              success: function(data){
                //console.log(data);
                if(data.status == "success") {
                  alert('Data Has Been Deleted');
                  GET_DATA();
                }else{
                  alert('Error Delete :'+data.message);
                }
              }
          });
        }
      }

      $("#SAVE_DATA").submit(function(e){
        if (save_method == "save") {
          act = "&act=add_data";
        }else{
          act = "&act=edit_data";
        }
        e.preventDefault();
        var formData = $(this).serialize();
        $.ajax({
          url: "postdata/postdata.php",
          type: "POST",
          data: formData+act,
          dataType: "JSON",
          success: function(data){
            //console.log(data);
            if(data.status == "success") {
              $("#modal_add").modal('hide');
              alert('Data Has Been Saved');
              GET_DATA();
            }else{
              alert('Error Saving: '+data.message);
            }
          }
        });
      });
    
    </script>
  </body>
</html>