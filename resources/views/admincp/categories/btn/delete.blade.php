{!!Form::open(['route'=>['category.destroy',$category->id],'method'=>'delete'])!!}
{!!Form::submit(trans('admincp.delete'),['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}