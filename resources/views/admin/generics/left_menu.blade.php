 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ url('/') }}" class="brand-link">
         <img src="{{ asset('dist/img/logo4.png') }}" alt="AdminLTE Logo" class="logoimg" style="opacity: .8">
         {{-- <span
             class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }} > Admin</span> --}}
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 <img src="{{ asset('dist/img/userimg3.jpg') }}" class="img-circle elevation-2" alt="User Image">
             </div>
             <div class="info">
                 <a href="#" class="d-block">
                     @if (auth()->check())
                         {{ Auth::user()->name }}
                     @endif
                 </a>
             </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                 data-accordion="false">
                 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                 <li class="nav-header">General</li>
                 <li class="nav-item">
                     <a href="{{ url('/admin') }}" class="nav-link">
                         <i class="fas fa-desktop"></i>
                         <p>
                             Dashboard
                         </p>
                     </a>
                 </li>
                 <li class="nav-item has-treeview">
                     <a href="#" class="nav-link">
                         <i class="fas fa-user-lock"></i>
                         <p>
                             Seguridad
                             <i class="fas fa-angle-left right"></i>
                             <span class="badge badge-info right">3</span>
                         </p>
                     </a>
                     <ul class="nav nav-treeview">
                         <li class="nav-item">
                             <a href="{{ url('/admin/users') }}" class="nav-link">
                                 <i class="fas fa-user-friends"></i>
                                 <p>Usuarios</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/admin/roles') }}" class="nav-link">
                                 <i class="fas fa-tasks"></i>
                                 <p>Roles</p>
                             </a>
                         </li>
                         <li class="nav-item">
                             <a href="{{ url('/admin/permissions') }}" class="nav-link">
                                 <i class="fas fa-key"></i>
                                 <p>Permisos</p>
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('/admin/news') }}" class="nav-link">
                         <i class="far fa-newspaper"></i>
                         <p>
                             Noticias
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('/admin/category') }}" class="nav-link">
                         <i class="fab fa-buffer"></i>
                         <p>
                             Categorías
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Accesorios</li>
                 <li class="nav-item">
                     <a href="{{ url('/admin/calendar') }}" class="nav-link">
                         <i class="nav-icon fas fa-calendar-alt"></i>
                         <p>
                             Calendar
                         </p>
                     </a>
                 </li>
                 <li class="nav-item">
                     <a href="{{ url('/admin/gallery') }}" class="nav-link">
                         <i class="nav-icon far fa-image"></i>
                         <p>
                             Gallery
                         </p>
                     </a>
                 </li>
                 <li class="nav-header">Archivos</li>
                 <li class="nav-item">
                     <a href="https://adminlte.io/docs/3.0" class="nav-link">
                         <i class="nav-icon fas fa-file"></i>
                         <p>Documentation</p>
                     </a>
                 </li>
                 <br><br><br><br><br><br><br><br><br><br><br>
                 <li class="nav-item">
                     <a class="dropdown-item" href="{{ url('/') }}"
                         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                         <i class="fas fa-sign-out-alt"></i> {{ __('Cerrar Sesión') }}
                     </a>
                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                 </li>
             </ul>
         </nav>
         <!-- /.sidebar-menu -->
     </div>
     <!-- /.sidebar -->
 </aside>
 <!-- /.Main Sidebar -->
