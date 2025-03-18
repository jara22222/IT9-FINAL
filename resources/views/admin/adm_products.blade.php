<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bootstrap Site</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Latest Bootstrap 5.3.0 JS (Includes Popper.js) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
          <span class="name "> P.C (PAY COMPUTER)</span>  
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
            <li class="links"><a href="{{route('admin.roles')}}" class="form-control"  hx-boost="true" hx-push-url="true">
              <i class='bx bxs-dashboard'></i>&nbsp;<span>Roles</span></a></li>
            <li class="links"><a href="{{route('admin.suppliers')}}" class="form-control "  hx-boost="true" hx-push-url="true">
              <i class='bx bxs-buildings' ></i>&nbsp;<span>Suppliers</span></a></li>
            <li class="links"><a href="{{route('admin.products')}}" class="form-control active"  hx-boost="true" hx-push-url="true">
              <i class='bx bxs-buildings' ></i>&nbsp;<span>Products</span></a></li>
            <li class="links dropdown">
              <a href="#" class="form-control">
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

    <div class="main-content  mt-3">
      <div class="d-flex justify-content-between align-items-center">
        <p class="display-6" style="font-weight: 600">Add products</p>
        <button class="btn h-50 text-white" style="background: #1b85b8" data-bs-toggle="modal" data-bs-target="#productmodal">Add products</button>
      </div>

      <div class="modal fade" id="productmodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
              <h5 class="modal-title" id="modalLabel">Add products</h5>
              <button class="btn h-50 text-white" style="background: #1b85b8" data-bs-toggle="modal" data-bs-target="#categorymodal">Add Category</button>
            </div>
            <div class="modal-body">
              asdassad
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="categorymodal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <form hx-post="/add-category" hx-target="body" hx-swap="innerHTML" hx-boost="true">
              @csrf
              <div class="modal-header">
                <div name="message" id="response-message"></div>
                <h5 class="modal-title" id="modalLabel">Add category</h5>
              </div>
              <div class="modal-body">
                <span>Category name</span>
                <input type="text" class="form-control mt-3" name="category_name" placeholder="(eg., motherboard, processor, mouse, etc..)" required>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
              </div>
            </form>
          </div>
        </div>
      </div>

      <p class="h6">Filters</p>
      <div class="d-flex gap-5 justify-content-between">
        <select name="" id="" class="form-select w-25 mr-md-5">

          <option value="" selected disabled>Select category</option>
          @foreach ($categories as $category )
          <option value="{{$category->PTID}}">{{$category->category_name}}</option>
          @endforeach
        </select>

        <select name="" id="" class="form-select w-25 mr-md-5">
          <option value="" selected disabled>Select Date</option>
          <option value="">sdaad</option>
        </select>

        <div class="d-flex">
          <input type="text" class="form-control" placeholder="Search here">
          <button class="btn btn-primary d-flex align-items-center"><i class='bx bx-search' ></i></button>
        </div>
      </div>

      <table class="table table-responsive text-center my-5 table-hover">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Category</th>
            <th scope="col">Stocks</th>
            <th scope="col">Status</th>
            <th scope="col">Details</th>
            <th scope="col">Price</th>
            <th scope="col">Date added</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>Prod 1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Prod 1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
            <td>1</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

  <script src="{{ asset('script/script.js')}}"></script>
</body>
</html>