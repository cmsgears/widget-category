<script id="categoryMapperTemplate" type="text/x-handlebars-template">
	<div class="mapper-item" cmt-app="<?= $app ?>" cmt-controller="<?= $controller ?>" cmt-action="<?= $deleteAction ?>" action="<?= $deleteActionUrl ?>" cmt-keep>
		<span class="spinner hidden-easy">
			<span class="cmti cmti-spinner-1 spin"></span>
		</span>
		<span class="mapper-item-remove btn-icon-o"><i class="icon fa fa-close cmt-click"></i></span>
		<span class="name">{{name}}</span>
		<input class="id" type="hidden" name="categoryId" value="{{id}}" />
	</div>
</script>
