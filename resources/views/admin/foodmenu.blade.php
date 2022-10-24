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
      
     <div style="position:relative;top:44px;right:-120px;">
        <form action="{{url('/uploadfood')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="">Title</label>
                <input type="text" name="title" placeholder="Enter a title" required style="color:black;">
            </div>
            <div>
                <label for="">Price</label>
                <input type="text" name="price" placeholder="Enter the price" required style="color:black;">
            </div>
            <div>
                <label for="">Image</label>
                <input type="file" name="image" required style="color:black;">
            </div>
            <div>
                <label for="">Description</label>
                <input type="text" name="description" placeholder="Enter a brief description" style="color:black;">
            </div>
            <div>
         <input type="submit" value="Save">
        </div>
        </form>
        <div>
            <table bgcolor="black" style="margin-top:5px;">
                <tr>
                    <th style="padding:30px">Food Name</th>
                    <th style="padding:30px">Price</th>
                    <th style="padding:30px">Description</th>
                    <th style="padding:30px">Image</th>
                    <th style="padding:30px">Action</th>
                    <th style="padding:30px">Action2</th>
                </tr>
                @foreach($data as $data)
                <tr align="center">
                    <td>{{$data->title}}</td>
                    <td>{{$data->price}}</td>
                    <td>{{$data->description}}</td>
                    <td><img src="/foodimage/{{$data->image}}" alt="" srcset="" width="50px"></td>
                    <td><a href="{{url ('/deletemenu',$data->id)}}">Delete</a></td>
                    <td><a href="{{url ('/updateview',$data->id)}}">Update</a></td>
                </tr>
                @endforeach
            </table>
        </div>

     </div>

</div>
    <!-- plugins:js -->
    @include("admin.adminscript")
    <!-- End custom js for this page -->
  </body>
</html>