<x-app-layout></x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss");
  </head>
  <body>
  <div class="container-scroller">
     <!-- main-panel ends -->
      @include("admin.navbar")
      
     <div style="position:relative;top:44px;right:-120px">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Title</label>
                <input type="text" name="title" placeholder="Enter a title" required>
            </div>
            <div>
                <label for="">Price</label>
                <input type="text" name="price" placeholder="Enter the price" required>
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image" required>
            </div>
            <div>
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="10"></textarea>
            </div>
            <div>
         <input type="submit" value="Save">
        </div>
        </form>
     </div>

</div>
    <!-- plugins:js -->
    @include("admin.adminscript")
    <!-- End custom js for this page -->
  </body>
</html>