<div class="table_form">
    <div class="mt-5">
    <?php echo $this->Flash->render() ?>
    <h1 class="">Add Procedure</h1>
        <?php echo $this->Form->create($procedure, array(
            'type' => 'file',
            'templates' => array(
                'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>',
                'inputContainerError' => '<div class="form-group">{{content}}{{error}}</div>',
                'error' => '<div class="text-danger">{{content}}</div>'
            )
        ));?>
            <?php echo $this->Form->control('procedure_name', array('label' => 'Procedure Name','required' => true))?>
            <?php echo $this->Form->button('Add', array('class' => 'themebtn'))?>
        <?php echo $this->Form->end();?>
    </div>
