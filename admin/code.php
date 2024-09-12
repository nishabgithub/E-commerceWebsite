<?php

include('config/dbcon.php');
include('functions/myfunction.php');

if(isset($_POST['add-category-btn']))
{
    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_descrption'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    $new_arrival = isset($_POST['new_arrival']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image , PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    $cate_query = "INSERT INTO  categories
    (name , slug , description , meta_title , meta_description , meta_keywords , status , popular, new_arrival, image)
    VALUES ('$name' , '$slug' , '$description' , '$meta_title' ,' $meta_description' , '$meta_keywords' , '$status' , '$popular', '$new_arrival','$filename')";

    $cate_query_run = mysqli_query($con , $cate_query);
     
    if($cate_query_run)
    {
        move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/' .$filename);
        redirect("add-category.php" , "Category Added Successfully");
    }else{
        redirect("add-category.php" , "Something Went wrong");
    }
    
}
else if (isset($_POST['Update-category-btn']))
{
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];  
    $slug = $_POST['slug'];   
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_descrption'];
    $meta_keywords = $_POST['meta_keywords'];
    $status = isset($_POST['status']) ? '1':'0';
    $popular = isset($_POST['popular']) ? '1':'0';
    $new_arrival = isset($_POST['new_arrival']) ? '1':'0';

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image , PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    $path = "../uploads";

    $update_query = "UPDATE categories SET name='$name' , slug='$slug' , description='$description' ,
    meta_title='$meta_title' , meta_description='$meta_description' , meta_keywords='$meta_keywords' ,
    status='$status' , popular='$popular' , new_arrival='$new_arrival', image='$update_filename' WHERE id='$category_id' ";

     $update_query_run = mysqli_query($con , $update_query);

     if($update_query_run)
     {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }        
        }
        redirect("edit-category.php?id=$category_id" , "Category Updated Sucessfully");
        // $_SESSION['message'] = "Category Updated Sucessfully";
        // header('Location: edit-category.php?id=$category_id');
     }else{
        redirect("edit-category.php?id=$category_id" , "Something Went Wrong");
     }
}
else if (isset($_POST['delete-category-btn']))
{
    $category_id = mysqli_real_escape_string($con , $_POST['category_id']);

     $category_query = "SELECT * FROM categories WHERE id='$category_id'";
     $category_query_run = mysqli_query($con, $category_query);
     $category_data = mysqli_fetch_array($category_query_run);
     $image = $category_data['image'];

    $delete_query = "DELETE FROM categories WHERE id='$category_id'";
    $delete_query_run = mysqli_query($con , $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
        // redirect("category.php" , "Category Deleted Sucessfully");
        echo 200;
    }
    else{
        // redirect("category.php" , "Something Went Wrong");
        echo 500;
    }
}
else if(isset($_POST['add-product-btn']))
{
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_descrption'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    $new_arrival = isset($_POST['new_arrival']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $image_ext = pathinfo($image , PATHINFO_EXTENSION);
    $filename = time().'.'.$image_ext;

    if($name !="" && $slug !="" && $description !="")
    {

    $product_query = "INSERT INTO products(category_id , name , slug , small_description , description , original_price , selling_price, qty , meta_title, meta_keywords , meta_description , status , trending , new_arrival ,image ) VALUES 
    ('$category_id' , '$name' , '$slug' ,'$small_description' , '$description' , '$original_price' , '$selling_price', '$qty' , '$meta_title' , '$meta_keywords' , '$meta_description' , '$status' , '$trending' , '$new_arrival' , '$filename'   )";

     $product_query_run = mysqli_query($con , $product_query);
     
     if($product_query_run)
     {
        move_uploaded_file($_FILES['image']['tmp_name'] , $path.'/' .$filename);
        redirect("add-product.php" , "Product Added Successfully");
     }
     else
     {
        redirect("add-product.php" , "Something Went Wrong");
     }
    }
     else{
        redirect("add-product.php" , "All Fields are Mendataory");
     }
}
else if(isset($_POST['update-product-btn']))
{
    $product_id = $_POST['product_id'];
    $category_id = $_POST['category_id'];

    $name = $_POST['name'];
    $slug = $_POST['slug'];
    $small_description = $_POST['small_description'];
    $description = $_POST['description'];
    $original_price = $_POST['original_price'];
    $selling_price = $_POST['selling_price'];
    $qty = $_POST['qty'];
    $meta_title = $_POST['meta_title'];
    $meta_keywords = $_POST['meta_keywords'];
    $meta_description = $_POST['meta_descrption'];
    $status = isset($_POST['status']) ? '1':'0';
    $trending = isset($_POST['trending']) ? '1':'0';
    $new_arrival = isset($_POST['new_arrival']) ? '1':'0';

    $image = $_FILES['image']['name'];

    $path = "../uploads";

    $new_image = $_FILES['image']['name'];
    $old_image = $_POST['old_image'];

    if($new_image != "")
    {
        // $update_filename = $new_image;
        $image_ext = pathinfo($new_image , PATHINFO_EXTENSION);
        $update_filename = time().'.'.$image_ext;
    }
    else
    {
        $update_filename = $old_image;
    }
    $update_product_query = "UPDATE products SET category_id='$category_id' , name='$name' , slug='$slug' ,
     small_description='$small_description' , description='$description', original_price='$original_price' ,
     selling_price='$selling_price' ,  qty='$qty' , status='$status' , trending='$trending' , new_arrival='$new_arrival', 
     meta_title='$meta_title' , meta_keywords='$meta_keywords' , meta_description='$meta_description' , image='$update_filename' WHERE id='$product_id' ";

     $update_product_query_run = mysqli_query($con , $update_product_query);

     if($update_product_query_run)
     {
        if($_FILES['image']['name'] != "")
        {
            move_uploaded_file($_FILES['image']['tmp_name'], $path.'/'.$update_filename);
            if(file_exists("../uploads/".$old_image))
            {
                unlink("../uploads/".$old_image);
            }        
        }
        redirect("edit-product.php?id=$product_id" , "Product Updated Sucessfully");
        // $_SESSION['message'] = "Category Updated Sucessfully";
        // header('Location: edit-category.php?id=$category_id');
     }else{
        redirect("edit-product.php?id=$product_id" , "Something Went Wrong");
     }
}else if(isset($_POST['delete-product-btn']))
{
    $product_id = mysqli_real_escape_string($con , $_POST['product_id']);

     $product_query = "SELECT * FROM products WHERE id='$product_id'";
     $product_query_run = mysqli_query($con, $product_query);
     $product_data = mysqli_fetch_array($product_query_run);
     $image = $product_data['image'];

    $delete_query = "DELETE FROM products WHERE id='$product_id'";
    $delete_query_run = mysqli_query($con , $delete_query);

    if($delete_query_run)
    {
        if(file_exists("../uploads/".$image))
            {
                unlink("../uploads/".$image);
            }
        // redirect("products.php" , "product Deleted Sucessfully");
        echo 200;
        
    }
    else{
        // redirect("products.php" , "Something Went Wrong");
        echo 500;
    }
}
else
{
  header('Location: ../index.php');
}
?>