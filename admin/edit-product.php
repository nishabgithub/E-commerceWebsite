<?php 

include('includes/header.php');
// include('middleware/adminmiddleware.php')
// include('../middleware/adminmiddleware.php');
include('../middleware/adminmiddleware.php');

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
                if(isset($_GET['id']))
                {
                    $id = $_GET['id'];
                    $product = getByID("products" , $id);
                    if(mysqli_num_rows($product) > 0)
                    {
                        $data = mysqli_fetch_array($product);
                        ?>
                          <div class="card">
                     <div class="card-header">
                         <h4>Edit Products
                          <a href="products.php" class="btn btn-primary float-end">Back</a>
                         </h4>
                     </div>
                     <div class="card-body">
                         <form action="code.php" method="POST" enctype="multipart/form-data">
                         <div class="row">
                         <div class="col-md-12">
                               <label for="">Select Category</label>
                               <select name="category_id" class="form-select mb-2">
                               <option selected>Select Category</option>
                                 <?php
                                 $categories = getAll("categories");
     
                                 if(mysqli_num_rows($categories) > 0)
                                 {
                                     foreach ($categories as $item){
                                         ?>
                                          <option value="<?= $item['id']; ?>" <?= $data['category_id'] ==$item['id']?'selected':'' ?> ><?= $item['name']; ?></option>
                                         <?php
                                     }
                                 }
                                else{
                                 echo" No Category Available";
                                }
     
                                 ?>
                                 
                                
                                 
                                 </select>
                             </div>
                             <input type="hidden" name="product_id"value="<?= $data['id'];?>" >
                             <div class="col-md-6">
                               <label class="mb-0">Name</label>
                               <input type="text" name="name" class="form-control mb-2" value="<?= $data['name'];?>" placeholder="Enter Category Name">
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Slug</label>
                               <input type="text" name="slug" class="form-control mb-2" value="<?= $data['slug'];?>" placeholder="Enter Slug">
                             </div>
                             <div class="col-md-12">
                               <label class="mb-0"> SmallDescription</label>
                               <textarea rows="3" name="small_description" class="form-control mb-2" placeholder="Enter Small Description"><?= $data['small_description'];?></textarea>
                             </div>
                             <div class="col-md-12">
                               <label class="mb-0">Description</label>
                               <textarea rows="3" name="description" class="form-control mb-2" placeholder="Enter Description"><?= $data['description'];?></textarea>
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Original Price</label>
                               <input type="text" name="original_price" class="form-control mb-2" value="<?= $data['original_price'];?>" placeholder="Enter Original Price">
                             </div>
                             <div class="col-md-6">
                               <label class="mb-0">Selling Price</label>
                               <input type="text" name="selling_price" class="form-control mb-2" value="<?= $data['selling_price'];?>" placeholder="Enter Selling Price">
                             </div>
                             
                             <div class="col-md-12">
                               <label class="mb-0">Upload Image</label>
                               <input type="hidden" name="old_image" value="<?= $data['image'];?>">
                               <input type="file" name="image" class="form-control mb-2" >
                               <label for="mb-0">Current Image</label>
                               <img src="../uploads/" <?= $data['image'];?> alt="" height="50px" width="50px">
                             </div>
                             <div class="row">
                             <div class="col-md-6">
                               <label class="mb-0">Quantity</label>
                               <input type="number" name="qty" value="<?= $data['qty'];?>" class="form-control mb-2" placeholder="Enter Quantity">
                               
                            </div>
                             <div class="col-md-3">
                               <label class="mb-0">Status</label><br>
                               <input type="checkbox" name="status" <?= $data['status'] == '0'?'':'checked'?>>
                             </div>
                             <div class="col-md-3">
                               <label class="mb-0">Trending</label><br>
                               <input type="checkbox" name="trending" <?= $data['trending']  == '0'?'':'checked'?>>
                             </div>
                             <div class="col-md-3">
                               <label class="mb-0">New Arrival</label><br>
                               <input type="checkbox" name="new_arrival" <?= $data['new_arrival']  == '0'?'':'checked'?>>
                             </div>
                             </div>
                             <div class="col-md-12">
                               <label class="mb-0">Meta Title<Title></Title></label>
                               <input type="text" name="meta_title" value="<?= $data['meta_title'];?>" class="form-control mb-2" placeholder="Enter Meta Title">
                             </div>
                             <div class="col-md-12">
                               <label class="mb-0">Meta Keywords</label>
                               <textarea rows="3" name="meta_keywords"  class="form-control mb-2" placeholder="Enter Meta Keywords"><?= $data['meta_keywords'];?></textarea>
                             </div>
                             <div class="col-md-12">
                               <label class="mb-0">Meta Descrption</label>
                               <textarea rows="3" name="meta_descrption" class="form-control mb-2" placeholder="Enter Meta Description"><?= $data['meta_description'];?></textarea>
                             </div>
                            
                            
                             <div class="col-md-12">
                                 <button type="submit" class="btn btn-primary" name="update-product-btn">Update</button>
                             </div>
                             
                             
                         </div>
                         </form>
                         
                     </div>
                          </div>
                        <?php
                    }
                    else
                    {
                     echo "Product Not Found for given id" ;
                    }
                }
                else
                {
                 echo "Id missing from url" ;
                }
             ?>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>