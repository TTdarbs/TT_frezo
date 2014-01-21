<?php echo Form::open(array("class"=>"form-horizontal")); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Title desc', 'title_desc', array('class'=>'control-label')); ?>

				<?php echo Form::input('title_desc', Input::post('title_desc', isset($about) ? $about->title_desc : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title desc')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Desc desc', 'desc_desc', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('desc_desc', Input::post('desc_desc', isset($about) ? $about->desc_desc : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Desc desc')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title history', 'title_history', array('class'=>'control-label')); ?>

				<?php echo Form::input('title_history', Input::post('title_history', isset($about) ? $about->title_history : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title history')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Desc history', 'desc_history', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('desc_history', Input::post('desc_history', isset($about) ? $about->desc_history : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Desc history')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Title vision', 'title_vision', array('class'=>'control-label')); ?>

				<?php echo Form::input('title_vision', Input::post('title_vision', isset($about) ? $about->title_vision : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Title vision')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Desc vision', 'desc_vision', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('desc_vision', Input::post('desc_vision', isset($about) ? $about->desc_vision : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Desc vision')); ?>

		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', __("SAVE"), array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>