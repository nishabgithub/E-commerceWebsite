<?php 


// include('middleware/adminmiddleware.php')
// include('../middleware/adminmiddleware.php');
include('../middleware/adminmiddleware.php');
include('includes/header.php');


?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
             <div class="card-header">
                <h4>Products</h4>
             </div>
               <div class="card-body" id="products_table">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $products = getAll("products");

                      if(mysqli_num_rows($products) > 0)
                      {
                        foreach($products as $item)
                        {
                            ?>
                              <tr>
                               <td><?=$item['id']; ?></td>
                               <td><?=$item['name']; ?></td>
                                <td>
                                    <img src="../uploads/<?=$item['image']; ?> " width="50px" height="50px" alt="<?=$item['name'];?>">
                                </td>
                               <td><?=$item['status'] == '0'? "visible":"hidden" ?></td>
                               <td>
                                 <a href="edit-product.php?id=<?=$item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>                                
                                </td>
                                <td>
                                <!-- <form action="code.php" method="POST">
                                  <input type="hidden" name="product_id" value=""> -->
                                  <button type="button" class="btn btn-sm btn-danger delete-product-btn" value="<?= $item['id']; ?>" >Delete</button>
                                  <!-- </form> -->
                                </td>
                               </tr>
                           <?php

                        }
                      }
                      else{
                        echo"No Result Found";
                      }
                    ?>
                  
                  </tbody>
               </table>
               </div>
           </div>
         </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- <script src="./assests/js/custom.js"></script> -->
<script>
  // alert("working");
  $(document).ready(function (){ 

   $(document).on( 'click' , '.delete-product-btn' , function(e){
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
                $.ajax({
                method:"POST",
                url: "code.php",
                data: {
                   'product_id':id,
                   'delete-product-btn':true
                },
                success : function (response){
                  console.log(response);
                   if(response == 200)
                   {
                    swal("success!", "Product deleted Sucessfully!", "success");
                      $("#products_table").load(location.href +  " #products_table");
                    }
                   else if( response == 500)
                   {
                    swal("Error!" , "Something went wrong" , "error");
                   }
                }
               });
        } 
      });
});
});
</script>
<?php include('includes/footer.php'); ?>