{!!Form::open(['route'=>['brand.destroy',$brand->id],'method'=>'delete'])!!}
{!!Form::submit(trans('admincp.delete'),['class'=>'btn btn-danger'])!!}
{!!Form::close()!!}