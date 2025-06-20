<div class="table_form">
    <div class="mt-5">
    <?php echo $this->Flash->render() ?>
    <h1 class="">Edit Announcement</h1>
        <?php echo $this->Form->create($announcement, array(
            'type' => 'file',
            'templates' => array(
                'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>',
                'inputContainerError' => '<div class="form-group">{{content}}{{error}}</div>',
                'error' => '<div class="text-danger">{{content}}</div>'
            )
        ));?>
            <?php echo $this->Form->control('Holiday_name')?>
            <?php echo $this->Form->control('Message')?>
            <?php echo $this->Form->control('announcement_photo', array('type' => 'file', 'class' => 'form-control-file'))?>
            <?php echo $this->Form->control('doctor_id', array('label' => 'Doctor', 'empty' => 'Select Doctor', 'type' => 'select', 'class' => 'form-control'))?>
            <?php echo $this->Form->control('reg_date')?>
            <?php echo $this->Form->button('Update', array('class' => 'themebtn'))?>
        <?php echo $this->Form->end();?>
    </div>
