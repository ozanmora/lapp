<!-- Sidebar user panel (optional) -->
<div class="user-panel">
    <div class="pull-left image">
        <img src="@yield('user_avatar', asset('img/avatar.png'))" class="img-circle" alt="">
    </div>
    <div class="pull-left info">
        <p>@yield('user_name', 'Ozan Mora')</p>
        <small>@yield('user_role', 'Admin')</small>
    </div>
</div>
