
<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <td>ID</td>
        <td>provider</td>
        <td>Brand</td>
        <td>location</td>
        <td>CPU</td>
        <td>Drive</td>
        <td>Price</td>
        <td>Actions</td>
    </tr>
    </thead>
    <tbody>
    @foreach($computers as $key => $value)
        <tr>
            <td>{{(isset($_GET['page'])?$_GET['page']:1-1)*15+(++$key)}}</td>
            <td>{{ $value->provider }}</td>
            <td>{{ $value->brand_label }}</td>
            <td>{{ $value->location }}</td>
            <td>{{ $value->cpu }}</td>
            <td>{{ $value->drive_label }}</td>
            <td>${{ $value->price }}</td>
            <td>

                <form method="POST" action="/computer/{{$value->id}}" class="d-inline-block">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}

                        <input type="submit"  onclick="return confirm('Are you sure?')" class="btn btn-danger delete-user" value="Delete Computer">
                </form>

                <a class="btn btn-small btn-success" href="{{ URL::to('computer/' . $value->id) }}">Show Computer</a>
                <a class="btn btn-small btn-info" href="{{ URL::to('computer/' . $value->id . '/edit') }}">Edit Computer</a>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{$computers->links()}}


