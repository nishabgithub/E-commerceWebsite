

//       D  E L E T E   F R O M    C A R T     B U T T O N 

$(document).ready(function(){
  
  $(document).on('click', '.deleteItem', function (){
    var cart_id = $(this).val();
   //  alert(cart_id);
    $.ajax({
     method: "POST",
     url:"admin/functions/handlecart.php",
     data: { 
       "cart_id": cart_id,
       "scope": "delete"
       },
     success: function(response){
       if(response == 200) 
       {
       alert("Item deleted sucessfully");
       }else{
         alert("response");
       }
     }
    });
 });

// W I S H L I S T        D E L E T E          B U T T O N
  
  $(document).on('click', '.deletewishItem', function (){
    var cart_id = $(this).val();
    // alert("working");
  //  alert(cart_id);
    $.ajax({
     method: "POST",
     url:"admin/functions/handlewishlist.php",
     data: { 
       "cart_id": cart_id,
       "scope": "delete"
       },
     success: function(response){
       if(response == 200) 
       {
       alert("Item deleted sucessfully");
       }else{
         alert("response");
       }
     }
    });
 });


//                         U P D A T E       B U T T O N



  $(document).on('click', '.updateQty', function (){
    //  alert("hello");
     var qty = $(this).closest('#product_data').find('.input-qty').val();
    //  var prod_id = $(this).val();
     var prod_id = $(this).closest('#product_data').find('.prodId').val();

     $.ajax({
      method: "POST",
      url:"admin/functions/handlecart.php",
      data: { 
        "prod_id": prod_id,
        "prod_qty": qty,
        "scope": "update"
        },
      success: function(response){
            // alert(response);
      }
     });
    });

    //             A D D    T O     C A R T      B U T T O N


  $('.addtocartbtn').click(function (e) {   
  //  alert("working");
    e.preventDefault();
   var qty = $(this).closest('#product_data').find('.input-qty').val();
   var prod_id = $(this).val();
   var size = $(this).closest('#product_data').find('.size').val();
    alert(prod_id);
 
    $.ajax({
      method: "POST",
      url: "admin/functions/handlecart.php",
      data: { 
      "prod_id": prod_id,
      "size": size,
      "prod_qty": qty,
      "scope": "add",
      },
      success: function (response){
        // alert(response);
        if(response == 201) 
        {
        alert("Product added to cart");
        } 
        else if(response == "existing") 
        {
        alert("Product already in cart");
        }
        else if(response == 401)
        {   
        alert("login to continue");
        }
        else if(response == 500)
        {
        alert("Something went wrong");
        }
      }
    });
  });


//                        A D D     T O     W I S H L I S T     B U T T O N

  $('.addtowishlist').click(function (e) {   
    // alert("working");
      e.preventDefault();
    //  var qty = $(this).closest('#product_data').find('.input-qty').val();
     var prod_id = $(this).val();
   
      $.ajax({
        method: "POST",
        url: "admin/functions/handlewishlist.php",
        data: { 
        "prod_id": prod_id,
        "scope": "add",
        },
        success: function (response){
          // alert(response);
          if(response == 201) 
          {
          alert("Product added to wishlist");
          } 
          else if(response == "existing") 
          {
          alert("Product already in wishlist");
          }
          else if(response == 401)
          {   
          alert("login to continue");
          }
          else if(response == 500)
          {
          alert("Something went wrong");
          }
          
        }
      });
    });
   
       
   
     
  
  
   //               Q U A N T I T Y         B U T T O N S


  $('.quantity-right-plus').click(function (e) {
    e.preventDefault();

    var qty = $(this).closest('#product_data').find('.input-qty').val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value < 10)
    {
      value++;
      // $('.input-qty').val(value);
      $(this).closest('#product_data').find('.input-qty').val(value);
    }
  });

  $('.quantity-left-minus').click(function (e) {
    e.preventDefault();

    var qty = $(this).closest('#product_data').find('.input-qty').val();

    var value = parseInt(qty, 10);
    value = isNaN(value) ? 0 : value;
    if(value > 1)
    {
      value--;
      // $('.input-qty').val(value);
      $(this).closest('#product_data').find('.input-qty').val(value);
    }
  });
});


//            F O R M S   V A L I D A T E

function numberonly(input)
{
 var num = /[^0-9]/gi;
 input.value = input.value.replace(num, "");
}

   $(document).ready(function(){
      $("#name").on('input', function(){
        var letter = /[^a-zA-Z]/g;
        if($(this).val().match(letter))
        {
          $(this).val($(this).val().replace(letter, ""))
        }
      })
   })

//          M O B I L E      N A V B A R

function hamburger() {
    //   var dots = document.getElementById("dots2");
      var list = document.getElementById("list");
      var icon = document.getElementById("icon");
     
      if (list.style.display=="block"){
        list.style.display="none";
     }else
     {
        list.style.display="block";
     }
     }



   //   F O R        U S E R         L O G I N        A N D        R E G I S T R A T I O N


   function user() {
      //   var dots = document.getElementById("dots2");
        var popup = document.getElementById("popup");
        var icon = document.getElementById("icon");
       
        if (popup.style.display=="block"){
          popup.style.display="none";
         }
         else
         {
          popup.style.display="block";
         }
   }
   function mobuser() {
    //   var dots = document.getElementById("dots2");
      var mobpopup = document.getElementById("popupmobile");
      var mobicon = document.getElementById("iconmobile");
     
      if (mobpopup.style.display=="block"){
        mobpopup.style.display="none";
       }
       else
       {
        mobpopup.style.display="block";
       }
 }


// C H E C K O U T       F O R M

function addressform() {
  var popup2 = document.getElementById("popup2");
  var popup4 = document.getElementById("popup4");
 
  if (popup2.style.display == "block") {
    // popup2.style.display = "none";
    
  } else {
    popup2.style.display = "block";
    // Ensure other form is hidden when this form is activated
    popup4.style.display = "none";
  }
}

function divform() {
  var popup4 = document.getElementById("popup4");
  var popup2 = document.getElementById("popup2");
 
  if (popup4.style.display == "block") {
    // popup4.style.display = "none";
  } else {
    popup4.style.display = "block";
    // Ensure address form is hidden when other form is activated
    popup2.style.display = "none";
  }
}


// P R O F I L E       F O R M


function save() {
  var edit = document.getElementById("edit");
  var save = document.getElementById("save");
 
  if (edit.style.display == "block") {
    // popup2.style.display = "none";
    
  } else {
    edit.style.display = "block";
    // Ensure other form is hidden when this form is activated
    save.style.display = "none";
  }
}

function edit() {
  var save = document.getElementById("save");
  var edit = document.getElementById("edit");
 
  if (save.style.display == "block") {
    // popup4.style.display = "none";
  } else {
    save.style.display = "block";
    // Ensure address form is hidden when other form is activated
    edit.style.display = "none";
  }
}


// W T S H L I S T         H I D E          D I S P L A Y       B U T T O N    


function addbtn() {
  var dltbtn = document.getElementById("dltbtn");
  var addbtn = document.getElementById("addbtn");
 
  if (dltbtn.style.display == "block") {
    // popup2.style.display = "none";
    
  } else {
    dltbtn.style.display = "block";
    // Ensure other form is hidden when this form is activated
    addbtn.style.display = "none";
  }
}

function dltbtn() {
  var addbtn = document.getElementById("addbtn");
  var dltbtn = document.getElementById("dltbtn");
 
  if (addbtn.style.display == "block") {
    // popup4.style.display = "none";
  } else {
    addbtn.style.display = "block";
    // Ensure address form is hidden when other form is activated
    dltbtn.style.display = "none";
  }
}


//                    S L I D E   S H O W

let index = 0;
displayImages();
function displayImages() {
 let i;
 const images = document.getElementsByClassName("imagehead");
 for (i = 0; i < images.length; i++) {
   images[i].style.display = "none";
 }
 index++;
 if (index > images.length) {
   index = 1;
 }
 images[index-1].style.display = "block";
 setTimeout(displayImages, 6000); 
}


      

      