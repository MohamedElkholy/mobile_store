<span class="label 
{{$level =='user'? 'label-primary':'' }}
{{$level =='vendor'? 'label-warning':'' }}
{{$level =='company'? 'label-success':'' }} 
">
{{trans('admin.'.$level)}}
</span>