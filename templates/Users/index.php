<div class="management_table">
               <div class="alert_msg">
        <?php echo $this->Flash->render() ?></div>
        <div class="table_heading">
        <h1 class="">Users
        </h1>
                    <?php echo $this->Html->link('Add User', array('action' => 'add'), array('class' => 'themebtn fa fa-plus'))?>

</div>
<div class="table-responsive">
        <table class="">
                <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Status</th>
                <th scope="col">Created</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->Paginator->params()['count'] < 1): ?>
                    <tr>
                        <td class="text-center" colspan="5">No records found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user->id; ?></td>
                            <td><?php echo $user->username; ?></td>
                            <td><?php 
                                if ($user->status == 1) : ?>
                                    <lable class="badge badge-success">Active</label>
                                <?php else: ?>
                                    <lable class="badge badge-light">Inactive</label>
                                <?php endif; ?>
                            </td>
                            <td><?php echo $user->created; ?></td>
                            <td class="action">
                                <?php echo $this->Html->link('', array('action' => 'edit', $user->id), array('class' => 'bg-primary-light fa fa-edit'))?>
                                <?php echo $this->Html->link('', array('action' => 'delete', $user->id), array('class' => 'bg-danger-light fa fa-trash', 'onClick' => 'return confirm("Are you sure you want to delete this user?")'))?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
                                </div>
    </div>