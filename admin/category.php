<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php');



?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
           <div class="card">
             <div class="card-header">
                <h4>Categories</h4>
             </div>
               <div class="card-body" id="category_table">
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
                      $category = getAll("categories");

                      if(mysqli_num_rows($category) > 0)
                      {
                        foreach($category as $item)
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
                                 <a href="edit-category.php?id=<?=$item['id']; ?>" class="btn btn-sm btn-primary">Edit</a>
                                  <!-- <form action="code.php" method="POST">
                                  <input type="hidden" name="category_id" value="<?=$item['id']; ?>">
                                  <button type="submit" class="btn btn-danger" name="delete-category-btn">Delete</button>
                                  </form> -->
                                </td>
                                <td>
                                <button type="button" class="btn btn-sm btn-danger delete-category-btn" value="<?= $item['id']; ?>" >Delete</button>
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
<script>
  // alert("working");
  $(document).ready(function (){

   $(document).on('click' , '.delete-category-btn', function(e){
    
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
                   'category_id':id,
                   'delete-category-btn':true
                },
                success : function (response){
                  console.log(response);
                   if(response == 200)
                   {
                    swal("success!", "Product deleted Sucessfully!", "success");
                      $("#category_table").load(location.href +  " #category_table");
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