<?php echo Form::open(array("class"=>"form-horizontal",
                            'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($news) ? $news->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Summary', 'summary', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('summary', Input::post('summary', isset($news) ? $news->summary : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Summary')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Message', 'message', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('message', Input::post('message', isset($news) ? $news->message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Message')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::hidden('Author id', 'author_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('author_id', Input::post('author_id', isset($news) ? $news->author_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Author id')); ?>

		</div>
            
            
                <div class="form-group">
			<?php echo Form::label('Upload image', 'image', array('class'=>'control-label')); ?>
                                
				 <?php
                                        echo Form::file('filename'); 
                                        #echo Form::submit('submit');
                                        echo Form::close(); ?>
		</div>
		<div class="form-group">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>