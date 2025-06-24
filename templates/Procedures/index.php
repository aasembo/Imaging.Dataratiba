<div class="management_table">
               <div class="alert_msg">
        <?php echo $this->Flash->render() ?></div>
        <div class="table_heading">

        <h1 class="">Procedures
        </h1>
                    <?php echo $this->Html->link('Add Procedure', array('action' => 'add'), array('class' => 'themebtn fa fa-plus'))?>
</div>
<div class="table-responsive">
        <table class="">
                <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Procedure Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->Paginator->params()['count'] < 1): ?>
                    <tr>
                        <td class="text-center" colspan="5">No records found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($procedures as $procedure): ?>
                        <tr>
                            <td><?php echo $procedure->id; ?></td>
                            <td><?php echo $procedure->procedure_name; ?></td>
                            <td class="action">
                                <?php echo $this->Html->link('', array('action' => 'edit', $procedure->id), array('class' => 'bg-primary-light fa fa-edit'))?>
                                <?php echo $this->Html->link('', array('action' => 'delete', $procedure->id), array('class' => 'bg-danger-light fa fa-trash', 'onClick' => 'return confirm("Are you sure you want to delete this Procedure?")'))?>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
                    </div>
    </div>
