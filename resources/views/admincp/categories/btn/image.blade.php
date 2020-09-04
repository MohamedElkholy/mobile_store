<div class="thumbnail">
	<div class="item">
		<a class="fancybox-button" data-rel="fancybox-button" title="Photo" href="{{asset(Storage::url($category->image))}}">
			<div class="zoom">
				<img src="{{asset(Storage::url($category->image))}}" alt="Photo" height="50" width="50">
			</div>
		</a>
	</div>
</div>