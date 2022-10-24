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
       
      <div>
        <table bgcolor="black" style="margin-top:5px;">
            <tr>
                <th style="padding:30px">Name</th>
                <th style="padding:30px">Email</th>
                <th style="padding:30px">Phone Number</th>
                <th style="padding:30px">Guests</th>
                <th style="padding:30px">Date</th>
                <th style="padding:30px">Time</th>
                <th style="padding:30px">Message</th>
            </tr>
            @foreach($data as $data)
            <tr align="center">
                <td>{{$data->name}}</td>
                <td>{{$data->email}}</td>
                <td>{{$data->phoneNumber}}</td>
                <td>{{$data->guests}}</td>
                <td>{{$data->date}}</td>
                <td>{{$data->time}}</td>
                <td>{{$data->message}}</td>
            </tr>
            @endforeach
        </table>
      </div>

</div>
    <!-- plugins:js -->
    @include("admin.adminscript")
    <!-- End custom js for this page -->
  </body>
</html>