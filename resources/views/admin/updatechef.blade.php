<x-app-layout></x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
  @include("admin.admincss")
  </head>
  <body>
     <!-- main-panel ends -->
     <div class="container-scroller">
      @include("admin.navbar")

      <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <form action="{{url('/updatefoodchef',$data->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="">Name</label>
                        <input type="text" value="{{$data->name}}" name="name" style="color:black">
                    </div>
                    <div>
                        <label for="">Speciality</label>
                        <input type="text" value="{{$data->speciality}}" name="speciality" style="color:black">
                    </div>
                    <div>
                        <label for="">Former Image</label>
                        <img height="200" width="200" src="/chefimage/{{$data->image}}" alt="" srcset="">
                     </div>
                    <div>
                        <label for="">New Image</label>
                        <input type="file" name="image"  style="color:black;"> 
                    </div>
                    <div>
                        <input type="submit" value="Update Chef" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
      </div>

</div>
    <!-- plugins:js -->
    @include("admin.adminscript")
    <!-- End custom js for this page -->
  </body>
</html>