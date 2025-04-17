<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin_dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin_dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
{{-- 
            <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

            <li class="{{ Request::is('admin/profile') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_profile') }}"><i class="fas fa-hand-point-right"></i> <span>Profile</span></a></li>
            <li class="{{ Request::is('admin/home-banner') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_banner') }}"><i class="fas fa-hand-point-right"></i> <span>Home Banner</span></a></li>
            <li class="{{ Request::is('admin/home-welcome') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_welcome') }}"><i class="fas fa-hand-point-right"></i> <span>Home Welcome</span></a></li>
            <li class="{{ Request::is('admin/home-counter') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_home_counter') }}"><i class="fas fa-hand-point-right"></i> <span>Home Counter</span></a></li>
            <li class="{{ Request::is('admin/speaker/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_speaker_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speakers</span></a></li>
            <li class="{{ Request::is('admin/schedule-day/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_schedule_day_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule Days</span></a></li>
            <li class="{{ Request::is('admin/schedule/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Schedule</span></a></li>
            <li class="{{ Request::is('admin/speaker-schedule/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_speaker_schedule_index') }}"><i class="fas fa-hand-point-right"></i> <span>Speaker Schedules</span></a></li>
            <li class="{{ Request::is('admin/sponsor-category/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sponsor_category_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsor Categories</span></a></li>
            <li class="{{ Request::is('admin/sponsor/*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sponsor_index') }}"><i class="fas fa-hand-point-right"></i> <span>Sponsors</span></a></li>

        </ul>
    </aside>
</div>