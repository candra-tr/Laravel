<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    @include('admin.css')

    <style type='text/css'> 
    .div_center {
        text-align: center;
        padding-top: 40px;
    }

    .font_size {
        font-size: 40px;
        padding-bottom: 40px;
    }

    .text_color{
        color: black;
        padding-bottom: 20px;
    }

    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
             <div class="div_center">
                <h1 class="font_size">Add Product</h1>
                <div>
                    <label>Product Title :</label>
                    <input class="text_color" type="text" name="title" placeholder="Write a tittle">
                </div>
                <div>
                    <label>Product Description :</label>
                    <input class="text_color" type="text" name="description" placeholder="Write a description">
                </div>
                <div>
                    <label>Product Price :</label>
                    <input class="text_color" type="number" name="price" placeholder="Write a price">
                </div>
              
                <div>
                    <label>Discount Price :</label>
                    <input class="text_color" type="number" name="dis_price" placeholder="Write a Discount apply">
                </div>
                <div>
                    <label>Product Quantity :</label>
                    <input class="text_color" type="number" min='0' name="quantity" placeholder="Write a quantity">
                </div>
                <div>
                    <label>Product Catagory :</label>
                    <select class="text_color" name="catagory">
                        <option>shirt</option>
                    </select>
                </div>
                <div>
                    <label>Product Image Here :</label>
                    <input type="file" name="image">
                </div>
                <div>
                    <input type="submit">
                </div>
             </div>
          </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html> 