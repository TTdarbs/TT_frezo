<?php echo Form::open(array("class"=>"form-horizontal",
                            'enctype' => 'multipart/form-data')); ?>
	<fieldset>
		<div class="form-group">
			<?php echo Form::label('Name', 'name', array('class'=>'control-label')); ?>

				<?php echo Form::input('name', Input::post('name', isset($product) ? $product->name : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Name')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Summary', 'summary', array('class'=>'control-label')); ?>

				<?php echo Form::textarea('summary', Input::post('summary', isset($product) ? $product->summary : ''), array('class' => 'col-md-8 form-control', 'rows' => 8, 'placeholder'=>'Summary')); ?>

		</div>
		<div class="form-group">
			<?php echo Form::label('Price', 'price', array('class'=>'control-label')); ?>

				<?php echo Form::input('price', Input::post('price', isset($product) ? $product->price : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'Price')); ?>

		</div>
                
                <div class="form-group">
			<?php echo Form::hidden('Author id', 'author_id', array('class'=>'control-label')); ?>

				<?php echo Form::hidden('author_id', Input::post('author_id', isset($comment) ? $comment->author_id : ''), array('class' => 'col-md-4 form-control', 'placeholder'=>'User id')); ?>

		</div>
            
            
            
            
            
            
            

		<div class="form-group">
                    
                <div class="form-group">
                    <?php echo Form::label('Upload image', 'image', array('class'=>'control-label')); ?>
                                
                       <?php
                            echo Form::file('filename'); 
                            #echo Form::submit('submit');
                            echo Form::close(); ?>
		</div>
			<label class='control-label'>&nbsp;</label>
			<?php echo Form::submit('submit', 'Save', array('class' => 'btn btn-primary')); ?>		</div>
	</fieldset>
<?php echo Form::close(); ?>