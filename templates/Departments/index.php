<div class="management_table">
               <div class="alert_msg">
        <?php echo $this->Flash->render() ?></div>
        <div class="table_heading">

        <h1 class="">Departments
        </h1>
                    <?php echo $this->Html->link('Add Department', array('action' => 'add'), array('class' => 'themebtn fa fa-plus'))?>
</div>
<div class="table-responsive">
        <table class="">
                <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Department Number</th>
                <th scope="col">Department Name</th>
                <th scope="col">Department Location</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->Paginator->params()['count'] < 1): ?>
                    <tr>
                        <td class="text-center" colspan="5">No records found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($departments as $department): ?>
                        <tr>
                            <td><?php echo $department->id; ?></td>
                            <td><?php echo $department->deptno; ?></td>
                            <td><?php echo $department->dname; ?></td>
                            <td><?php echo $department->loc; ?></td>
                            <td class="action">
                                <?php echo $this->Html->link('', array('action' => 'edit', $department->id), array('class' => 'bg-primary-light fa fa-edit'))?>
                                <?php echo $this->Html->link('', array('action' => 'delete', $department->id), array('class' => 'bg-danger-light fa fa-trash', 'onClick' => 'return confirm("Are you sure you want to delete this department?")'))?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
                    </div>
    </div>
