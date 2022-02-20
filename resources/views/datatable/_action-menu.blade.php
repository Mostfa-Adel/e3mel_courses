<td width="120">
    {!! Form::open(['route' => ["$mainRouteName.destroy", $model->id], 'method' => 'delete']) !!}
    <div class="btn-group">

        <a href='{{route("$mainRouteName.show", [$model->id])}}' class="btn btn-default btn-xs">
            <span class="material-icons third-color">
                visibility
            </span>
        </a>
        <a href="{{route("$mainRouteName.edit", [$model->id])}}" class="btn btn-default btn-xs">
            <span class="material-icons text-warning">
                edit
            </span>
        </a>
        <button type="submit" class="btn" onclick="return confirm('Are you sure?')"><span
                class="material-icons text-danger">delete</span></button>

    </div>
    {!! Form::close() !!}

</td>
