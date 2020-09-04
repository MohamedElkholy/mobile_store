<span class="label 
{{$moderator->permissions =='admin'? 'label-success':'' }}
{{$moderator->permissions =='moderator'? 'label-default':'' }}
">
{{trans('admincp.'.$moderator->permissions)}}
</span>