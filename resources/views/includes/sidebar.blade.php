<div class="main-sidebar sidebar-style-2">
   <aside id="sidebar-wrapper">
     <div class="sidebar-brand">
       <a href="index.html">Stisla</a>
     </div>
     <div class="sidebar-brand sidebar-brand-sm">
       <a href="index.html">St</a>
     </div>
     <ul class="sidebar-menu">
         <li class="menu-header">Dashboard</li>
         <li class="{{ request()->is('/admin/dashboard') ? "active" : "" }}"><a class="nav-link" href="/"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>

         <li class="{{ request()->is('admin/category*') ? "active" : "" }}"><a class="nav-link " href="{{ route('category.index') }}"><i class="far fa-square"></i> <span>Category </span></a></li>

         <li class="{{ request()->is('admin/product*') ? "active" : "" }}"><a class="nav-link " href="{{ route('product.index') }}"><i class="far fa-square"></i> <span>Product </span></a></li>
      
         <li class="{{ request()->is('admin/order*') ? "active" : "" }}"><a class="nav-link " href="{{ route('order.index') }}"><i class="far fa-square"></i> <span>Order </span></a></li>
         <li class="{{ request()->is('admin/user*') ? "active" : "" }}"><a class="nav-link " href="{{ route('user.index') }}"><i class="far fa-users"></i> <span>User </span></a></li>
       </ul>

       <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
         <a href="https://getstisla.com/docs" class="btn btn-primary btn-lg btn-block btn-icon-split">
           <i class="fas fa-rocket"></i> Documentation
         </a>
       </div>
   </aside>
 </div>