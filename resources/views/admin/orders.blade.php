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
     <div class="container mt-3">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-4">
              <h2>Customer Orders</h2>
            </div>
            <div class="col-md-5">
                <form action="{{url('/search')}}" method="get">
                    @csrf
                    <input type="text" name="search" style="color:blue">
                    <input type="submit" value="Search" class="btn btn-success">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10">
            <table class="table table-light mt-8">
            <thead>
                <tr>
                <th scope="col">Foodname</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Name</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
                <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $data)
                <tr>
                <td>{{$data->foodname}}</td>
                <td>Kes {{$data->price}}</td>
                <td>{{$data->quantity}}</td>
                <td>{{$data->name}}</td>
                <td>{{$data->phone}}</td>
                <td>{{$data->address}}</td>
                <td>Kes {{$data->price * $data->quantity}}</td>
                </tr>
                @endforeach
            </tbody>
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