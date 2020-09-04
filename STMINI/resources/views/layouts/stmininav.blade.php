<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>STMINI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <link href="{{asset('/css/sidebar.css')}}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">STMINI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Employee
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
                        <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Member
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Stminishow/showMember">Member</a>
                  </div>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Product
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/Stminishow/createCategory">Category</a>
                        <a class="dropdown-item" href="/Stminishow/createCarmodel">Carmodel</a>
                        <a class="dropdown-item" href="/Stminishow/createColor">Color</a>
                  </div>
                </li>
              </ul>
            </div>
      </nav>
       
   
    <div id="page-content-wrapper">
      <div class="container-fluid">
        @yield('body')
      </div>
  </div>
</body>

</html>

<body>
  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Admin Panel</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="#">Home</a>
      <a class="p-2 text-dark" href="#">Dashboard</a>
      <a class="p-2 text-dark" href="#">Profile</a>
      <a class="p-2 text-dark" href="#">Help</a>
    </nav>
  </div>
  <div class="d-flex" id="wrapper">
    <div class="bg-light border-right"style="background-color: blue" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
     
          <!-- ///////////////////////////////////////// -->
         
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลพนักงาน
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
        
          <!-- ///////////////////////////////////////// -->
          
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            ข้อมูลสินค้า
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
          
          <!-- ///////////////////////////////////////// -->

            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลบริษัทคู่ค้า
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>

          <!-- ///////////////////////////////////////// -->
         
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลลูกค้า
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
          </div>
          <!-- ///////////////////////////////////////// -->

            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลโปรโมชั่น
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>

          <!-- ///////////////////////////////////////// -->
   
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลการสั่งซื้อ
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
      
          <!-- ///////////////////////////////////////// -->
   
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลของแถม
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
          
          <!-- ///////////////////////////////////////// -->
        
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลรับสินค้า
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
    
          <!-- ///////////////////////////////////////// -->

            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลขายสินค้า
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
          
          <!-- ///////////////////////////////////////// -->
          
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลเคลมสินค้า
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
      
          <!-- ///////////////////////////////////////// -->
         
            <button class="dropdown list-group-item btn btn-secondary dropdown-toggle " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              ข้อมูลออกรายงาน
            </button>
            <div class="dropdown-menu bg-secondary" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="/Stminishow/showEmployee">Employee</a>
              <a class="dropdown-item" href="/Stminishow/createPosition">Position</a>
            </div>
         </div>
         
      </div>
    </div>
    <div id="page-content-wrapper">
      <div class="container-fluid">
        @yield('body')
      </div>
    </div>
</body>
</div>
</html>