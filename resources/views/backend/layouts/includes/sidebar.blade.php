<ul class="sidebar-nav" id="sidebar-nav">


  @if (checkUserPermission('dashboard'))
    
  <li class="nav-item">
    <a class="nav-link " href="{{ route('dashboard') }}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard -->
  @endif

@if(checkUserPermission('category.index'))
<li class="nav-item">
  <a class="nav-link collapsed"  href="{{ route('category.index') }}">
    <i class="bi bi-menu-button-wide"></i><span>Categoires</span>
  </a>
 
</li><!-- Categories-->
@endif
<li class="nav-item">
  <a class="nav-link collapsed"  href="#">
    <i class="bi bi-menu-button-wide"></i><span>Sub Category</span>
    </a>
</li>
<li class="nav-item">
  <a class="nav-link collapsed"  href="#">
    <i class="bi bi-menu-button-wide"></i><span>Brands</span>
    </a>
</li>
<!-- Brands -->
<li class="nav-item">
  <a class="nav-link collapsed"  href="#">
    <i class="bi bi-menu-button-wide"></i><span>Products</span>
    </a>
</li>
<!-- products -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Shipping</span>
    </a>
</li>
<!-- shipping -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#">
    <i class="bi bi-menu-button-wide"></i><span>Orders</span>
    </a>
</li>
<!-- orders -->

  
<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('role.index') }}">
    <i class="bi bi-menu-button-wide"></i><span>Roles</span>
    </a>
</li>
<!-- roles -->


@if(checkUserPermission('user.index'))
<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('user.index') }}">
    <i class="bi bi-menu-button-wide"></i><span>Users</span>
    </a>
</li>
@endif
<!-- users -->

</ul>