<div class="table_form">
        <div class="alert_msg">
            <?php echo $this->Flash->render(); ?>
</div>
            <h1 class="">Add Doctor</h1>
            <?php echo $this->Form->create($doctor, [
                'type' => 'file',
                'templates' => [
                    'inputContainer' => '<div class="form-group {{type}}{{required}}">{{content}}</div>',
                    'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}>',
                    'inputContainerError' => '<div class="form-group">{{content}}{{error}}</div>',
                    'error' => '<div class="text-danger">{{content}}</div>'
                ]
            ]); ?>
            
            <?php echo $this->Form->control('firstname', ['label' => 'First Name']); ?>
            <?php echo $this->Form->control('lastname', ['label' => 'Last Name']); ?>
            <?php echo $this->Form->control('title', ['label' => 'Title']); ?>
            <?php echo $this->Form->control('Office_extension', ['label' => 'Office Extension']); ?>
            <?php echo $this->Form->control('Cell', ['label' => 'Cell']); ?>
            <?php echo $this->Form->control('Pager', ['label' => 'Pager']); ?>
            <?php echo $this->Form->control('doctor_photo', [
                'type' => 'file',
                'label' => 'Doctor Photo',
                'class' => 'form-control-file'
            ]); ?>
            <?php echo $this->Form->control('name', ['label' => 'Name']); ?>

            <!-- Add Procedure Selection Dropdown -->
            <!-- Procedure Association Dropdown -->
            <?php echo $this->Form->control('procedure_id', [
                'type' => 'select',
                'options' => $procedures, // Assuming $procedures is a list of procedure IDs and names
                'empty' => 'Select Procedure (optional)',
                'label' => 'Associated Procedure'
            ]); ?>
            
            <?php echo $this->Form->button('Add', ['class' => 'themebtn']); ?>
            <?php echo $this->Form->end(); ?>
        </div>
    </div>
