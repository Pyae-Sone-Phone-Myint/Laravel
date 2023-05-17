<aside>

    <div class="list-group">
        <a href="{{ route('page.home') }}" class="list-group-item list-group-item-action">Home</a>
    </div>

    @user
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
    @enduser
</aside>
