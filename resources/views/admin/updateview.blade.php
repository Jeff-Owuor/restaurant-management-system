<x-app-layout></x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <base href="/public">
  @include("admin.admincss");
  </head>
  <body>
     <!-- main-panel ends -->
     <div class="container-scroller">
      @include("admin.navbar");

      <div style="position:relative;top:44px;right:-120px;">
        <form action="{{url('/update',$data->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Title</label>
                <input type="text" name="title" value="{{$data->title}}" required style="color:black;">
            </div>
            <div>
                <label for="">Price</label>
                <input type="text" name="price" value="{{$data->price}}" required style="color:black;">
            </div>
            
            <div>
                <label for="">Description</label>
                <input name="description" value="{{$data->description}}" id="" cols="30" rows="10" style="color:black;">
            </div>
            <div>
                <label for="">Former Image</label>
                <img height="200" width="200" src="/foodimage/{{$data->image}}" alt="" srcset="">
            </div>
            <div>
                <label for="">New Image</label>
                <input type="file" name="image" required style="color:black;">
            </div>
            <div>
         <input type="submit" value="Save">
        </div>
        </form>
</div>
</div>

    <!-- plugins:js -->
    @include("admin.adminscript");
    <!-- End custom js for this page -->
  </body>
</html>