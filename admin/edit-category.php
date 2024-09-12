<?php 
include('../middleware/adminmiddleware.php');
include('includes/header.php');
?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
          <?php
            if(isset($_GET['id']))
            {
              $id = $_GET['id'];
              $category =  getByID("categories" , $id);
             
             if(mysqli_num_rows($category) > 0)
             {
                $data = mysqli_fetch_array($category);
                ?>
                 <div class="card">
                <div class="card-header">
                    <h4>Edit Category 
                      <a href="category.php" class="btn btn-primary float-end">Back</a>
                    </h4> 
                </div>
                <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-6">
                          <input type="hidden" name="category_id" value="<?=$data['id'] ?>">
                          <label for="">Name</label>
                          <input type="text" name="name"  value="<?=$data['name']?>" class="form-control" placeholder="Enter Category Name">
                        </div>
                        <div class="col-md-6">
                          <label for="">Slug</label>
                          <input type="text" name="slug" value="<?=$data['slug']?>" class="form-control" placeholder="Enter Slug">
                        </div>
                        <div class="col-md-12">
                          <label for="">Description</label>
                          <textarea rows="3" name="description" class="form-control" placeholder="Enter Description"><?=$data['description']?></textarea>
                        </div>
                        <div class="col-md-12">
                          <label for="">Upload Image</label>
                          <input type="file" name="image" class="form-control" >
                          <label for="">Current Image</label>
                          <input type="hidden" name="old_image" value="<?=$data['image']?>">
                          <img src="../uploads/<?=$data['image'] ?>" height="50px" width="50px" alt="">
                        </div>
                        <div class="col-md-12">
                          <label for="">Meta Title<Title></Title></label>
                          <input type="text" name="meta_title" class="form-control" value="<?=$data['meta_title']?>" placeholder="Enter Meta-Title">
                        </div>
                        <div class="col-md-12">
                          <label for="">Meta Descrption</label>
                          <textarea rows="3" name="meta_descrption" class="form-control" placeholder="Enter Meta-Description"><?=$data['meta_description']?></textarea>
                        </div>
                        <div class="col-md-12">
                          <label for="">Meta Keywords</label>
                          <textarea rows="3" name="meta_keywords" class="form-control" placeholder="Enter Meta Keywords"><?=$data['meta_keywords']?></textarea>
                        </div>
                        <div class="col-md-6">
                          <label for="">Status</label>
                          <input type="checkbox"  <?=$data['status'] ? "checked":""?> name="status">
                        </div>
                        <div class="col-md-6">
                          <label for="">Popular</label>
                          <input type="checkbox"  <?=$data['popular']? "checked":""?> name="popular" >
                        </div>
                        <div class="col-md-6">
                          <label for="">New Arrival</label>
                          <input type="checkbox"  <?=$data['new_arrival']? "checked":""?> name="new_arrival" >
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" name="Update-category-btn">Update</button>
                        </div>
                        
                        
                    </div>
                    </form>
                    
                </div>
                 </div>
                <?php
             }
             else
             {
              echo "Category not found";
             }
            }
             else
              {
               echo "Id missing from url";
              }
              ?>
          
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>