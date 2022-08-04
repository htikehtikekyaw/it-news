<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Owner</th>
            <th>Contorl</th>
            <th>Created</th>
        </tr>
    </thead>
    <tbody>
        @forelse(\App\Category::with('user')->get() as $c)
            <tr>
                <td>{{ $c->id }}</td>
                <td>{{ $c->title }}</td>
                <td>{{ $c->user->name }}</td>
                <td>
                    <a href="{{ route('category.edit',$c->id) }}" class="btn btn-outline-primary">Edit</a>
                    <form action="{{ route('category.destroy',$c->id) }}" class="d-inline-block" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-outline-danger" onclick="return confirm('Are You Sure to Delete {{ $c->title }}?')">Delete</button>
                    </form>
                </td>
                <td>
                    <span class="small">
                        <i class="feather-calendar"></i>
                        {{ $c->created_at->format('d-m-Y') }}
                    </span>
                    <br>
                    <span class="small">
                        <i class="feather-clock"></i>
                        {{ $c->created_at->format('j:i A') }}
                    </span>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">There is no category</td>
            </tr>
        @endforelse   
    </tbody>
</table>