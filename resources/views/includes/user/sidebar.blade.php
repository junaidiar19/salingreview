<div class="d-flex align-items-center mb-4 justify-content-center justify-content-md-start">
    <img src="{{ asset('assets/home/images/testimonials/01.jpg') }}" class="avatar avatar-lg rounded-circle" alt="">
    <div class="ms-3">
        <h5 class="mb-0">John Doe</h5>
        <small>Personal Account</small>
    </div>
</div>
<div class="d-md-none text-center d-grid">
    <button 
        class="btn btn-light mb-3 d-flex align-items-center justify-content-between" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#collapseAccountMenu" 
        aria-expanded="false" 
        aria-controls="collapseAccountMenu"
    >
        Account Menu
        <i class="bi bi-chevron-down ms-2"></i>
    </button>
</div>
<div class="collapse d-md-block" id="collapseAccountMenu">
    <ul class="nav flex-column nav-account">
       <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}" href="{{ route('user.dashboard') }}">
             <i class="align-center bx bx-home"></i>
             <span class="ms-2">Home</span>
          </a>
        </li>
        <li class="nav-item">
           <a class="nav-link {{ request()->routeIs('user.tasks.*') ? 'active' : '' }}" aria-current="page" href="{{ route('user.tasks.index') }}">
              <i class="align-center bx bx-task"></i>
              <span class="ms-2">Tasks</span>
           </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->routeIs('user.profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
             <i class="align-center bx bx-user"></i>
             <span class="ms-2">Profile</span>
          </a>
       </li>
    </ul>
</div>