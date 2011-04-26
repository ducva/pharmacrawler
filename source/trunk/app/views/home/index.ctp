<?php echo $form->create(null,array('controller'=>'home', 'action'=>'index'))?>
<?php echo $form->input('url', array('label'=>'Input URL:'))?>
<?php echo $form->submit('Submit', array('div'=>false, 'name'=>'task', 'value'=>'submit'));?>
<?php echo $form->end();?>