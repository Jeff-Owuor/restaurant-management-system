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

      <h1>Admin Chef</h1>
</div>
    <!-- plugins:js -->
    @include("admin.adminscript")
    <!-- End custom js for this page -->
  </body>
</html>