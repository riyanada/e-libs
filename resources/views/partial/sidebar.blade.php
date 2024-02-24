<div class="nk-sidebar">
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li>
                <a href="{{ route('dashboard') }}" aria-expanded="false">
                    <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-label">Library</li>
            <li>
                <a href="{{ route('books.index') }}" aria-expanded="false">
                    <i class="icon-notebook menu-icon"></i><span class="nav-text">Books</span>
                </a>
            </li>
            <li>
                <a href="{{ route('book_history.index') }}" aria-expanded="false">
                    <i class="icon-book-open menu-icon"></i><span class="nav-text">Log</span>
                </a>
            </li>
            <li class="nav-label">Master</li>
            <li>
                <a href="{{ route('categories.index') }}" aria-expanded="false">
                    <i class="icon-briefcase menu-icon"></i><span class="nav-text">Books Category</span>
                </a>
            </li>
            <li>
                <a href="{{ route('users.index') }}" aria-expanded="false">
                    <i class="icon-people menu-icon"></i><span class="nav-text">Users</span>
                </a>
            </li>
            <li class="nav-label">Roles</li>
            <li>
                <a href="{{ route('role.index') }}" aria-expanded="false">
                    <i class="icon-briefcase menu-icon"></i><span class="nav-text">Role</span>
                </a>
            </li>
            <li>
                <a href="{{ route('enrolments.index') }}" aria-expanded="false">
                    <i class="icon-layers menu-icon"></i><span class="nav-text">Enrolments</span>
                </a>
            </li>
        </ul>
    </div>
</div>