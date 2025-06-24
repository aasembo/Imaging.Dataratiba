<div class="table_form">
        <div class="alert_msg">
    <?php echo $this->Flash->render() ?>
</div>
    <h1 class="">Edit Doctor</h1>
        <?php echo $this->Form->create($doctor, array(
            'type' => 'file',
            'templates' => array(
                'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>',
                'inputContainerError' => '<div class="form-group">{{content}}{{error}}</div>',
                'error' => '<div class="text-danger">{{content}}</div>'
            )
        ));?>
            <?php echo $this->Form->control('firstname')?>
            <?php echo $this->Form->control('lastname')?>
            <?php echo $this->Form->control('title')?>
            <?php echo $this->Form->control('Office_extension')?>
            <?php echo $this->Form->control('Cell')?>
            <?php echo $this->Form->control('Pager')?>
            <?php echo $this->Form->control('doctor_photo', array('type' => 'file', 'class' => 'form-control-file'))?>
            <?php echo $this->Form->control('name')?>
            <?php echo $this->Form->button('Update', array('class' => 'themebtn'))?>
        <?php echo $this->Form->end();?>
    </div>
</div>