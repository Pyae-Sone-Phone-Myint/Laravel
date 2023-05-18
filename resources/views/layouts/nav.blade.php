<aside>

    <div class="list-group">
        <a href="{{ route('page.home') }}" class="list-group-item list-group-item-action">Home</a>
    </div>

    @user
        <p class="mt-3 my-2">Dashboard</p>
        <div class="list-group">
            <a href="{{ route('dashboard.index') }}" class="list-group-item">Dashboard</a>
        </div>
        <div class="">
            <p class=" mt-3">Manage Category</p>

            <div class="list-group">
                <a href="{{ route('category.create') }}" class="list-group-item">Create Category</a>
                <a href="{{ route('category.index') }}" class="list-group-item">Category List</a>
            </div>
        </div>

        <div class="">
            <p class=" mt-3">Manage Inventory</p>

            <div class="list-group">
                <a href="{{ route('item.create') }}" class="list-group-item">Create Item</a>
                <a href="{{ route('item.index') }}" class="list-group-item">Item List</a>
            </div>
        </div>

        <div class="">
            <p class=" mt-3">User Profile</p>

            <div class="list-group">
                <a href="" class="list-group-item">My Profile</a>
                <a href="{{ route('auth.passwordChange') }}" class="list-group-item">Change Password</a>
            </div>
            <form action="{{ route('auth.logout') }}" method="POST">
                @csrf
                <button class="btn btn-primary mt-3 w-100">Logout</button>
            </form>
        </div>
    @enduser

    @notUser
        <div class="">
            <p class=" mt-3">Manage Category</p>

            <div class="list-group">
                <a href="{{ route('auth.login') }}" class="list-group-item">Login</a>
                <a href="{{ route('auth.register') }}" class="list-group-item">Register</a>
            </div>
        </div>
    @endnotUser
</aside>
