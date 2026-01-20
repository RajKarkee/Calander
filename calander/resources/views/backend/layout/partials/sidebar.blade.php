   <div class="sidebar" id="sidebar">
       <div class="sidebar-header">
           <h2 class="logo">Dairy Patro</h2>
       </div>

       <nav class="sidebar-nav">
           <ul class="nav-list" {{ request()->routeIs('admin.index') ? 'active' : '' }}>
               <!-- Dashboard -->
               <li class="nav-item">
                   <a href="#s" class="nav-link">
                       <i class="fas fa-th-large"></i>
                       <span>Dashboard</span>
                   </a>
               </li>

               <!-- Content Section -->
               <li class="nav-section-title">Content</li>

               <li class='nav-item {{ request()->routeIs('admin.announcements.index') ? 'active' : '' }}'>
                   <a href='{{ route('admin.announcements.index') }}' class='nav-link'>
                       <i class='fas fa-bullhorn'></i>
                       <span>Announcements</span>
                   </a>
               </li>
               <li class='nav-item {{ request()->routeIs('admin.news.index') ? 'active' : '' }}'>
                   <a href='{{ route('admin.news.index') }}' class='nav-link'>
                       <i class='fas fa-newspaper'></i>
                       <span>News</span>
                   </a>
               </li>
               <li class='nav-item {{ request()->routeIs('admin.event.logo') ? 'active' : '' }}'>
                   <a href='{{ route('admin.settings.logo') }}' class='nav-link'>
                       <i class='fas fa-image'></i>
                       <span>Event Logo</span>
                   </a>
               </li>

               <!-- Account Section -->
               <li class="nav-section-title">Account</li>

               <li class="nav-item">
                   <form method="POST" action="{{ route('admin.logout') }}" id="logoutForm">
                       @csrf
                       <a href="#" class="nav-link"
                           onclick="event.preventDefault(); document.getElementById('logoutForm').submit();">
                           <i class="fas fa-sign-out-alt"></i>
                           <span>Log out</span>
                       </a>
                   </form>
               </li>
           </ul>
           {{--
               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-camera"></i>
                       <span>Product Photoshoot</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-lightbulb"></i>
                       <span>Brainstorming Lab</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-calendar-alt"></i>
                       <span>Content Calendar</span>
                   </a>
               </li>

               <!-- Assets Section -->
               <li class="nav-section-title">Assets</li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-file-alt"></i>
                       <span>My Content</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-photo-video"></i>
                       <span>Media Library</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-box"></i>
                       <span>Product Catalogue</span>
                       <span class="badge-beta">BETA</span>
                   </a>
               </li>

               <!-- Account Section -->
               <li class="nav-section-title">Account</li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-building"></i>
                       <span>Brand Information</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-share-alt"></i>
                       <span>Socials</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-users"></i>
                       <span>Social Media Accounts</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-user"></i>
                       <span>My account</span>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-receipt"></i>
                       <span>Billing information</span>
                       <i class="fas fa-external-link-alt external-icon"></i>
                   </a>
               </li>

               <li class="nav-item">
                   <a href="#" class="nav-link">
                       <i class="fas fa-sign-out-alt"></i>
                       <span>Log out</span>
                   </a>
               </li> --}} </ul>
       </nav>
   </div>
