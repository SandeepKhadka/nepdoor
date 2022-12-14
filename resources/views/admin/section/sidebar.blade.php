 <!-- Main Sidebar Container -->
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
     <!-- Brand Logo -->
     <a href="{{ route(auth()->user()->role) }}" class="brand-link">
         <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="" class="brand-image img-circle elevation-3"
             style="opacity: .8">
         <span class="brand-text font-weight-light">{{ ucfirst(auth()->user()->role) }}</span>
     </a>

     <!-- Sidebar -->
     <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
                 @if (auth()->user()->photo != null && file_exists(public_path() . '/uploads/user/' . auth()->user()->photo))
                     <img src="{{ asset('uploads/user/Thumb-' . auth()->user()->photo) }}" class="brand-image img-circle elevation-2" alt="">
                 @else
                     <img src="{{ asset('dist/img/defaultUser.png') }}" class="user-image img-circle elevation-2" alt="">
                 @endif
             </div>
             <div class="info">
                 <a href="{{url('admin/adminProfile')}}" class="d-block">{{ ucfirst(auth()->user()->full_name) }}</a>
             </div>
         </div>

         <!-- Sidebar -->
         <div class="sidebar">
             <!-- Sidebar Menu -->
             <nav class="mt-2">
                 <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                     data-accordion="false">
                     <li class="nav-item">
                         <a href="{{ route('home') }}" class="nav-link">
                             <i class="nav-icon fas fa-tachometer-alt"></i>
                             <p>
                                 Home
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon far fa-envelope"></i>
                             <p>
                                 Package
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('package.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Packages</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('category.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Package Category</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('subscription.index') }}" class="nav-link">
                             <i class="nav-icon fas fa-th"></i>
                             <p>
                                 Subscriptions
                             </p>
                         </a>
                     </li>

                     <li class="nav-header">System</li>
                     <li class="nav-item">
                         <a href="{{ route('activity.index') }}" class="nav-link">
                             <i class="nav-icon fas fa-columns"></i>
                             <p>
                                 Activity
                             </p>
                         </a>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('billing.index') }}" class="nav-link">
                             <i class="nav-icon fas fa-ellipsis-h"></i>
                             <p>Billings</p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="#" class="nav-link">
                             <i class="nav-icon far fa-envelope"></i>
                             <p>
                                 Support Tickets
                                 <i class="fas fa-angle-left right"></i>
                             </p>
                         </a>
                         <ul class="nav nav-treeview">
                             <li class="nav-item">
                                 <a href="{{ route('ticket.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Tickets</p>
                                 </a>
                             </li>
                             <li class="nav-item">
                                 <a href="{{ route('reply.index') }}" class="nav-link">
                                     <i class="far fa-circle nav-icon"></i>
                                     <p>Tickets Reply</p>
                                 </a>
                             </li>
                         </ul>
                     </li>

                     <li class="nav-item">
                         <a href="{{ route('user.index') }}" class="nav-link">
                             <i class="nav-icon fas fa-users"></i>
                             <p>
                                 Users
                             </p>
                         </a>
                     </li>
                     <li class="nav-item">
                         <a href="{{ route('helpCenter.index') }}" class="nav-link">
                             <i class="nav-icon fas fa-columns"></i>
                             <p>
                                 Help Center
                             </p>
                         </a>
                     </li>
             </nav>
             <!-- sidebar -->
         </div>
         <!-- sidebar -->
     </div>
 </aside>
