<div class="table_form">
    <div class="mt-5">
    <?php echo $this->Flash->render() ?>
    <h1 class="">Update Department</h1>
        <?php echo $this->Form->create($department, array(
            'type' => 'file',
            'templates' => array(
                'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>',
                'inputContainerError' => '<div class="form-group">{{content}}{{error}}</div>',
                'error' => '<div class="text-danger">{{content}}</div>'
            )
        ));?>
            <?php echo $this->Form->control('deptno', array('label' => 'Department Number'))?>
            <?php echo $this->Form->control('dname', array('label' => 'Department Name'))?>
            <?php echo $this->Form->control('loc', array('label' => 'Department Location'))?>
            <?php echo $this->Form->button('Update', array('class' => 'themebtn'))?>
        <?php echo $this->Form->end();?>
    </div>
