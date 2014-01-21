<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label(__("MESSAGE"), 'message', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('message', Input::post('message', isset($comment) ? $comment->message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>__("MESSAGE"))); ?>

		</div>
		<div class="form-group">
			<?php echo Form::hidden(__("AUTHOR_ID"), 'author_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('author_id', Input::post('author_id', isset($comment) ? $comment->author_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>__("AUTHOR_ID"))); ?>

		</div>
		<div class="form-group">
			<?php echo Form::hidden(__("NEWS_ID"), 'news_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('news_id', Input::post('news_id', isset($comment) ? $comment->news_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>__("NEWS_ID"))); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', __("SAVE"), array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>