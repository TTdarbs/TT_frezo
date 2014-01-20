<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('message', Input::post('message', isset($comment) ? $comment->message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::hidden('Author id', 'author_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('author_id', Input::post('author_id', isset($comment) ? $comment->author_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Author id')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::hidden('News id', 'news_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('news_id', Input::post('news_id', isset($comment) ? $comment->news_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'News id')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>