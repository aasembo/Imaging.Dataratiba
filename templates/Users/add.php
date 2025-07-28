<div class="table_form">
    <div class="mt-5">
    <?php echo $this->Flash->render() ?>
    <h1 class="">Add User</h1>
        <?php echo $this->Form->create($user, array(
            'type' => 'file',
            'templates' => array(
                'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>',
                'inputContainerError' => '<div class="form-group">{{content}}{{error}}</div>',
                'error' => '<div class="text-danger">{{content}}</div>'
            )
        ));?>
            <?php echo $this->Form->control('username', array('label' => 'Username'))?>
            <?php echo $this->Form->control('password', array('label' => 'Password'))?>
            <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm Password']) ?>
            <?php echo $this->Form->control('status', array('label' => 'Status', 'empty' => 'Select Status', 'type' => 'select', 'class' => 'form-control', 'options' => array('0' => 'No', '1' => 'Yes'), 'default' => 0))?>
            <?php echo $this->Form->button('Add', array('class' => 'themebtn'))?>
        <?php echo $this->Form->end();?>
    </div>
