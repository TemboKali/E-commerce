<div class="list-categories">
    <div class="lists">
        <ul>
            @forelse($categories as $category)
                <li><a href="{{ route('client.listproducts', $category->id) }}">{{ $category->name }}</a></li>
            @empty
                <span class="danger">Empty</span>
            @endforelse
        </ul>
    </div>
    <div class="search">
        <input type="text" name="" id="" placeholder="Search Products...">
    </div>
</div>