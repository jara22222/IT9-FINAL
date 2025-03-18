  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Site</title>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

<!-- Bootstrap JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="{{ asset('css/adm_sidebar.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css">
 <script src="https://unpkg.com/htmx.org@1.9.2"></script>


  </head>
  <body>

      <div class="container-fluid d-flex">
        <nav class="sidebar shadow-lg">
          <header class="border-bottom">
            <div class="col d-flex align-items-center py-2">          
              <i class='bx bxs-component' style="font-size: 60px;color: #009688"></i>
              <span class="name"> P.C (PAY COMPUTER)</span>  
            </div>
            <i class='bx bx-chevron-right toggleP' ></i>
          </header>
          <div class="menu-bar ">
            <div class="menu mt-3 border-bottom " style="padding-bottom: 6.5rem;">
              <ul class="list-unstyled">
                <small>menu</small>
                <li class="links"><a href="{{route('admin')}}" class="form-control " hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-dashboard'></i>&nbsp;<span>Dashboard</span></a></li>
                  <li class="links"><a href="{{route('admin.employees')}}"class="form-control "  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-user' ></i>&nbsp;<span>Employees</span></a></li>
                  <li class="links"><a href="{{route('admin.roles')}}" class="form-control "  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-dashboard'></i>&nbsp;<span>Roles</span></a></li>
                  <li class="links"><a href="{{route('admin.suppliers')}}" class="form-control "  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-buildings' ></i>&nbsp;<span>Suppliers</span></a></li>
                  <li class="links"><a href="{{route('admin.products')}}" class="form-control "  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-buildings' ></i>&nbsp;<span>Products</span></a></li>
                  <li class="links dropdown">
                    <a href="#" class="form-control active">
                      <i class='bx bxs-report'></i>&nbsp;<span>Reports</span>&nbsp;
                      <i class='bx bx-chevron-right' style="margin-left: auto;"></i>
                    </a>
                    <ul class="dropdown-menu">
                      <li><a href="{{route('admin.transactionsH')}}" class="dropdown-item" hx-boost="true" hx-push-url="true">Transaction history</a></li>
                      <li><a href="{{route('admin.salesH')}}" class="dropdown-item" hx-boost="true" hx-push-url="true">Sales history</a></li>
                      <li><a href="{{route('admin.stocksH')}}" class="dropdown-item" hx-boost="true" hx-push-url="true">Stock in history</a></li>
                    </ul>
                  </li>

                


                  <li class="links"><a href="" class="form-control">
                  <i class='bx bx-log-out' ></i>&nbsp;<span>Log out</span></a></li>
              </ul>
            </div> 
            
          </div>
         <div class="profile mt-4 border rounded shadow-lg">
          <a href="" class="form-control d-flex justify-content-center align-items-end bg-transparent h-100 w-100">
            <img src="{{asset('imgs/admin.jpg')}}" alt="Admin" class="profile-img">
            <p class="px-5"><span>Admin</span></p>
          </a>
        </div>
      </nav>

      <div class="main-content border mt-3">
        suppliers
      </div>
      </div>

   

 <script src="{{ asset('script/script.js')}}"></script>
  </body>
  </html>