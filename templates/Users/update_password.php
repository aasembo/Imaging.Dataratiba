<div class="table_form">
    <div class="mt-5">
    <?php echo $this->Flash->render() ?>
    <h1 class="">Update Password</h1>
        
        <?= $this->Form->create($user) ?>

        <?= $this->Form->control('current_password', ['type' => 'password', 'label' => 'Current Password']) ?>
        <?= $this->Form->control('new_password', ['type' => 'password', 'label' => 'New Password']) ?>
        <?= $this->Form->control('confirm_password', ['type' => 'password', 'label' => 'Confirm New Password']) ?>

        <?= $this->Form->button(__('Update Password'),  array('class' => 'themebtn')) ?>
        <?= $this->Form->end() ?>
    </div>
</div>
