<x-app-layout></x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
  @include("admin.admincss")
  </head>
  <body>
     <!-- main-panel ends -->
     <div class="container-scroller">
      @include("admin.navbar")
      <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 mt-4">
            <form action="{{url('/uploadchef')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
         <label for="">Name</label>
         <input type="text" name="name" id="" placeholder="Enter chef's name" style="color:black;" required class="mb-2">
         </div>
         <div>
         <label for="">Speciality</label>
         <input type="text" name="speciality" id="" style="color:black" placeholder="Enter speciality" required class="mb-2">
         </div>
         <div>
         <label for="">Image</label>
         <input type="file" name="image" id="" required class="mb-2">
         </div>
         <div>
            <input type="submit" value="Save" class="btn btn-info">
         </div>
      </form>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-2"></div>
            <div class="col-md-7">
            <table bgcolor="black" style="margin-top:5px;">
                <tr>
                    <th style="padding:30px">Name</th>
                    <th style="padding:30px">Speciality</th>
                    <th style="padding:30px">Image</th>
                </tr>
                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data->name}}</td>
                    <td>{{$data->speciality}}</td>
                    <td>{{$data->description}}</td>
                    <td><img src="/chefimage/{{$data->image}}" alt="" srcset="" width="50px"></td>
                </tr>
                @endforeach
            </table>
            </div>
        </div>
      </div>
     
</div>
    <!-- plugins:js -->
    @include("admin.adminscript")
    <!-- End custom js for this page -->
  </body>
</html>