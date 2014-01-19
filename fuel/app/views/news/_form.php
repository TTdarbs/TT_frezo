<?php echo Form::open(array("class"=>"form-horizontal",
                            'enctype' => 'multipart/form-data')); ?>

	<fieldset>
		<div class="form-group" id="add_name">
                    <?php echo Form::label('Nosaukums', 'name', array('class'=>'control-label')); ?><br>

				<?php echo Form::input('name', Input::post('name', isset($news) ? $news->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Nosaukums')); ?>

		</div>
		<div class="form-group" id="add_summary">
                    <div ><?php echo Form::label('Apraksts', 'summary', array('class'=>'control-label')); ?><br>

				<?php echo Form::textarea('summary', Input::post('summary', isset($news) ? $news->summary : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Apraksts')); ?>

		</div>
		<div class="form-group" id="add_message">
			<?php echo Form::label('Raksts', 'message', array('class'=>'control-label')); ?><br>

				<?php echo Form::textarea('message', Input::post('message', isset($news) ? $news->message : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Raksts')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::hidden('Author id', 'author_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('author_id', Input::post('author_id', isset($news) ? $news->author_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Author id')); ?>

		</div>
            
            
                <div class="form-group">
			<?php echo Form::label('Augšuplādēt attēlu', 'image', array('class'=>'control-label')); ?>
                                
				 <?php
                                        echo Form::file('filename'); 
                                        #echo Form::submit('submit');
                                        echo Form::close(); ?>
		</div>
		<div class="form-group" id="add_submit">
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Saglabāt', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>