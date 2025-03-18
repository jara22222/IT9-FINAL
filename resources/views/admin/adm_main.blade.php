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
                <li class="links"><a href="{{route('admin')}}" class="form-control active" hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-dashboard'></i>&nbsp;<span>Dashboard</span></a></li>
                  <li class="links"><a href="{{route('admin.employees')}}"class="form-control "  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-user' ></i>&nbsp;<span>Employees</span></a></li>
                  <li class="links"><a href="{{route('admin.roles')}}" class="form-control"  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-dashboard'></i>&nbsp;<span>Roles</span></a></li>
                  <li class="links"><a href="{{route('admin.suppliers')}}" class="form-control "  hx-boost="true" hx-push-url="true">
                  <i class='bx bxs-buildings' ></i>&nbsp;<span>Suppliers</span></a></li>
                  <li class="links"><a href="{{route('admin.products')}}" class="form-control "  hx-boost="true" hx-push-url="true">
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

      <div class="main-content border mt-3">
       Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quam soluta temporibus ad repellat earum debitis, reiciendis quae omnis, neque odit maiores qui, odio explicabo impedit reprehenderit quo voluptatem ex dolor.
       Aperiam quia quis dicta natus aut animi iure ut, eum cum harum, asperiores unde nisi id totam! Perferendis harum, fuga quia tempore, aspernatur vitae reiciendis officiis non commodi debitis quasi.
       Ullam harum dolor consequuntur nulla mollitia? Aspernatur distinctio at ea assumenda ipsa quaerat nesciunt sed ipsam! Rerum quo doloremque omnis id molestiae facilis, quos assumenda, voluptate eligendi minus laboriosam totam.
       Sapiente modi velit alias animi enim totam culpa commodi incidunt facere voluptas aliquam, praesentium, vel eligendi ut deserunt quidem nam, repellendus quia quibusdam dolore similique numquam iste. Quam, quasi aliquam.
       Voluptatum, dolorum? Cumque facere neque, rerum nam et, corrupti reprehenderit, harum eveniet expedita placeat consequuntur. Illo totam explicabo maiores laboriosam odit. Repellendus labore odit maxime ut blanditiis facere, modi illo.
       Earum laudantium cumque mollitia voluptas velit tempora est et cum eligendi suscipit ab doloribus, eveniet, natus dicta harum. Tempora accusantium necessitatibus iure voluptates ea repellendus! Quibusdam fugit numquam quis ipsam?
       Deleniti magni aperiam officiis explicabo enim? Esse expedita excepturi, reprehenderit voluptas dicta dolores corrupti nisi vel quidem ab eos labore necessitatibus, quod ex. A, voluptas! Quam quod iste consequatur placeat!
       Ducimus dignissimos exercitationem odit nam provident harum ratione, voluptate, suscipit veniam officia eveniet, consectetur officiis. Iste temporibus aut, ducimus odit nobis dolor nesciunt exercitationem. Voluptas eum maxime odio quia minima!
       Illo, velit dolores veniam tempora sit fugiat maxime quam modi? Minus officia harum illo, accusantium eaque sequi vitae libero officiis praesentium nemo ipsa distinctio provident, ab reprehenderit suscipit voluptatum! Architecto!
       Ea doloribus voluptas perferendis nostrum sequi cupiditate sint magnam in, architecto consectetur quo commodi expedita dolorem facere blanditiis voluptates fugit tempore vero odit nemo molestias quia harum debitis. Officia, eveniet?
       Nihil incidunt blanditiis excepturi quo in sit consectetur pariatur, officia quod recusandae. Perferendis voluptatem iste similique omnis, blanditiis vitae? Laborum, autem aliquid possimus magni dolores amet illo quia voluptatem optio?
       Labore provident architecto optio itaque facere cumque nisi rem modi temporibus magni animi aut soluta excepturi repellat doloribus, vitae illum voluptatibus velit sunt inventore quidem. Rem ab beatae quisquam libero.
       Eum, neque! Explicabo itaque harum facilis repudiandae dignissimos assumenda est similique id vero et atque molestiae illum possimus, ullam, nisi, praesentium esse facere quos temporibus error. Nulla quia quam iure!
       Dolores harum optio quas perspiciatis minus assumenda. Omnis vitae nam officiis sapiente et, placeat quasi? Possimus laudantium sunt facilis reprehenderit aliquam doloribus, magnam ratione odit eos, distinctio, cumque qui id!
       Deserunt itaque officia facilis veritatis, aliquid suscipit. Natus totam modi nobis cum nihil odit placeat possimus, iste earum repellat reiciendis quod nemo, distinctio nostrum unde. Sunt ipsum voluptas facilis vero.
       Ut sed iusto alias ducimus quas, velit consectetur deserunt exercitationem perferendis earum sunt natus expedita suscipit nemo praesentium adipisci dicta veritatis hic ullam quaerat. Excepturi explicabo aperiam itaque quo odio.
       Ab quod quas incidunt nesciunt? Facilis voluptatibus quam et dolorem fuga aspernatur nesciunt blanditiis dolores porro explicabo magni possimus non, aperiam alias obcaecati expedita optio consequuntur culpa suscipit nobis. Possimus!
       Culpa dolore accusamus, accusantium nemo quibusdam omnis tenetur fuga aliquid in commodi modi, corporis consectetur qui pariatur quos mollitia ab minus a sequi similique excepturi? Iure, eveniet! Eveniet, rerum laudantium.
       Incidunt, voluptates possimus, quis soluta earum eum, excepturi delectus accusamus odio minima laboriosam? Neque, debitis ipsa aperiam, numquam nemo dolores laboriosam, reprehenderit tempore ducimus enim eveniet. Suscipit ipsam dignissimos rerum.
       Eligendi voluptatem adipisci laudantium magni aliquid labore commodi, corporis eum quidem assumenda? Magnam laudantium veniam in. Deleniti quaerat tempora, minima unde aliquid ipsam suscipit, recusandae deserunt odio impedit, culpa quo.
       Ipsum cumque odit nostrum quia et fuga natus minus dignissimos esse blanditiis! Laboriosam soluta dolorem beatae repellat accusamus, doloremque saepe, culpa dicta quos eius, similique non officia voluptatum facilis eum?
       Sint, voluptate quia soluta reprehenderit beatae atque culpa aut omnis nostrum ea esse adipisci inventore commodi saepe totam doloremque minima ipsam ullam dolores quaerat quas. Laudantium neque facere eum illo?
       Similique ad earum esse commodi veritatis sit. Fugiat quod eos inventore, unde similique sed quis reprehenderit consectetur maxime fugit ipsum? Atque blanditiis voluptatum nobis illum? Officia nobis beatae veniam officiis.
       Laborum quibusdam assumenda quisquam magni omnis illum et repudiandae ut repellendus. Voluptates soluta enim veniam deleniti. Ducimus consequuntur eum nihil magnam est, corporis magni harum cum ipsam reiciendis, excepturi possimus.
       Saepe ipsam iusto obcaecati eius iure fugiat, molestiae autem inventore exercitationem, repellat praesentium! Fuga nulla iusto excepturi, earum vel exercitationem ad facilis, vitae rerum quia consectetur minus. Nobis, dolor nisi.
       Et rem deserunt nam rerum maxime eveniet dolorem recusandae ab iusto possimus harum quia dicta numquam voluptas deleniti veniam, laborum, debitis labore nesciunt, repudiandae eligendi fugit enim. Quas, cupiditate tempora?
       Culpa id quisquam autem, vitae voluptate, ipsa iste consectetur magnam rem ad laboriosam laudantium tempore quam non exercitationem necessitatibus excepturi optio nesciunt. Ipsum veniam, molestias sed accusamus nam culpa a?
       Tempora illo corrupti cum reiciendis ducimus error accusantium consectetur veritatis optio iste dolor quisquam, fugit, voluptates voluptas officia earum provident. Molestias ea sit tempora consequuntur vel saepe tenetur impedit veritatis.
       Quam fuga eaque velit ullam, error itaque debitis! Ut illum praesentium provident, nesciunt laudantium eveniet, at soluta libero aliquid voluptatibus, enim eaque ratione aut aspernatur autem quo facere totam eius?
       Doloremque dignissimos quo ipsa error cumque quibusdam perspiciatis vitae? Perferendis aliquam necessitatibus a nemo aperiam praesentium voluptatum amet consequatur in laudantium! Quae veniam, unde perspiciatis nobis optio explicabo maiores eligendi!
       Exercitationem hic placeat, ut rerum accusantium quibusdam molestias architecto ratione qui maxime cupiditate laudantium animi cum, quaerat dicta voluptas nemo dolorem laborum vero corporis ullam beatae, sequi dolores autem. Provident.
       Iure veritatis doloribus nobis optio voluptatum ea maiores maxime, distinctio repellat architecto commodi mollitia unde aliquam ab a porro tenetur facere, modi, tempora dolorem eaque dolores voluptatem ratione! Reprehenderit, delectus.
       Quam consequuntur aspernatur eaque sapiente fugit nesciunt optio. Eos dolorum placeat veniam, delectus aliquam maiores doloribus laudantium qui architecto molestias ratione, aspernatur animi. Neque repellat rem dolores, reprehenderit culpa cupiditate.
       Cumque doloremque, nostrum, obcaecati alias id molestias vitae vero maxime sed nam maiores aliquam distinctio blanditiis optio voluptas omnis debitis, minima ipsum error amet sapiente nesciunt iure? Recusandae, libero necessitatibus!
       Amet cumque totam ducimus optio voluptate et, itaque consequatur! Molestias quod similique expedita recusandae saepe iste repellat quos fugiat, vitae est, deleniti hic? Quod aut sed illum quas, dolorem labore.
       Cupiditate et perspiciatis hic veniam accusamus officiis blanditiis illo repellat fugit architecto molestiae quidem commodi fugiat expedita sequi consequuntur mollitia doloribus ea placeat minima eveniet, sint laboriosam nobis quisquam. Cumque!
       Ipsam unde inventore dolorem assumenda quas repellendus deserunt recusandae voluptatem officia excepturi. Magni, voluptas cupiditate deserunt, ex ipsam quidem praesentium necessitatibus maiores corrupti facilis commodi repellendus hic voluptatibus labore nam?
       Minus aliquid porro vel dicta exercitationem omnis deserunt natus? Reiciendis consequuntur qui laudantium blanditiis! Quis, similique? Laborum aliquam fugiat odit at libero beatae dolore harum, qui sint illo esse? Hic.
       Quaerat voluptatem suscipit accusamus consequuntur id pariatur est ducimus eum, hic placeat quae illo modi praesentium natus ullam debitis soluta nobis eius porro molestias. Quia doloribus mollitia sequi excepturi laboriosam.
       Dolore magnam, voluptatibus exercitationem numquam ut qui ratione soluta ab libero maxime ipsa enim! Ex voluptatibus debitis perspiciatis neque quia laboriosam mollitia animi, perferendis quos. Consequatur ipsum ipsam nostrum qui!
       Numquam iure a possimus officia architecto? Eos ipsam ratione voluptatibus nulla fugiat illum, quos error recusandae maiores quae, cupiditate, pariatur aspernatur quidem doloremque? Cum minima possimus, nulla sapiente consequatur excepturi.
       Recusandae quaerat voluptate eaque sapiente doloribus officia eius maxime fugit. Pariatur eveniet magnam ipsum officia, nulla, accusantium neque obcaecati ab nemo quam at voluptatibus ducimus omnis rem! Id, rerum dicta.
       Fuga debitis harum impedit tempora ducimus adipisci. Dolorem perferendis aperiam expedita nulla animi, nam, ab non, quidem neque molestiae porro autem ipsa maxime excepturi modi officia impedit culpa ullam ex.
       Ab, odit ad eaque aliquid quam distinctio, tenetur ex quod doloribus sit nam facere. Consequatur minus soluta quas quae accusamus aspernatur quaerat ipsum temporibus. Quia commodi a perspiciatis mollitia qui.
       Neque vel illum accusamus eligendi, dicta beatae non, vero blanditiis corrupti ut natus saepe iusto ad dignissimos ipsum sequi quae doloremque reiciendis animi sit, optio deleniti voluptates cum. Veniam, nesciunt!
       Molestiae quia pariatur excepturi porro corporis sunt. Minus ipsam possimus voluptatibus, dicta pariatur at consectetur, eligendi sint fugiat debitis iusto molestias provident maiores in nobis placeat, doloremque facere atque recusandae.
       Illo libero, placeat voluptatum nam reiciendis maiores quasi quis, obcaecati nobis impedit omnis vel molestias culpa provident fugiat. Cumque, nostrum. Itaque consectetur quaerat officia est nihil nemo repudiandae dolorem architecto.
       Quaerat aliquid dolore laborum at totam nam, molestiae ea, necessitatibus quisquam debitis alias velit esse, expedita minus ad provident amet culpa quos. Dolores, quidem suscipit unde ea illo officia mollitia.
       Ut, quo officia quas at aut dolore quia possimus error qui repellendus, cupiditate recusandae, earum nobis natus deserunt? Doloribus sapiente corrupti sit qui, aspernatur rerum molestias sequi doloremque temporibus itaque.
       Commodi dignissimos eius dolorem provident ratione. Error non aliquid quis, assumenda autem, maxime repellendus maiores sequi, amet quisquam dolor nisi eligendi ut dicta accusantium at quos cum quam. Quis, ad!
      </div>
      </div>

   

 <script src="{{ asset('script/script.js')}}"></script>
  </body>
  </html>