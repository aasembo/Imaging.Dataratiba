<div class="management_table">
    <div class="alert_msg">
        <?php echo $this->Flash->render() ?>
    </div>
    <div class="table_heading">
        <h1 class="">Announcements
        </h1>
        <?php echo $this->Html->link('Add Announcement', array('action' => 'add'), array('class' => 'themebtn fa fa-plus'))?>

    </div>
    <?php echo $this->Form->create()?>
    <div class="table-responsive">
        <table class="">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Message</th>
                    <th scope="col">Image</th>
                    <th scope="col">IR Procedures</th>
                    <th scope="col">Doctors</th>
                    <th scope="col">Current Procedures</th>
                    <th scope="col">Performing Doctor</th>
                    <th scope="col">Reg Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->Paginator->params()['count'] < 1): ?>
                <tr>
                    <td class="text-center" colspan="10">No records found.</td>
                </tr>
                <?php else: ?>
                <?php foreach ($announcements as $announcement): ?>
                <tr>
                    <td><?php echo $announcement->id; ?></td>
                    <td><?php echo $announcement->Holiday_name; ?></td>
                    <td><?php echo $announcement->Message; ?></td>
                    <td>
                        <?php if($announcement->Image){ ?>
                            <?php echo $this->Html->image($announcement->Image, array('height' => 20))?>
                        <?php } else{ ?>
                                <?= $this->Html->image('placeholder.png', array('height' => 20)); ?>
                        <?php } ?>
                    </td>
                    <td>
                        <div class="table_Select">
                            <?php echo $this->Form->select('fields['.$announcement->id.'][IR_PROCEDURES]', $procedures, array('label' => false, 'empty' => 'Select Procedure', 'value' => $announcement->IR_PROCEDURES));?>
                            <?php //debug($announcement); ?>
                        </div>
                    </td>

                    <td>
                        <div class="table_Select">
                            <?php echo $this->Form->select('fields['.$announcement->id.'][doctor_id]', $doctors, array('lable' => false, 'empty' => true, 'value' => $announcement->doctor_id));?>
                        </div>
                    </td>
                    <td><?php echo h($announcement->IR_PROCEDURES); ?></td>


                    <td><?php echo $announcement->doctor_id ?></td>
                    <td><?php echo $announcement->reg_date; ?></td>
                    <td class="action">
                        <?php echo $this->Html->link('', array('action' => 'edit', $announcement->id), array('class' => 'bg-primary-light fa fa-edit'))?>
                        <?php echo $this->Html->link('', array('action' => 'delete', $announcement->id), array('class' => 'bg-danger-light fa fa-trash', 'onClick' => 'return confirm("Are you sure you want to delete this announcement?")'))?>
                    </td>
                </tr>
                <?php endforeach;?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <div class="px-3 pb-3">
    <?php echo $this->Form->button('Save', array('class' => 'themebtn px-4', 'disabled' => ($this->Paginator->params()['count'] < 1)))?>
                </div>
    <?php echo $this->Form->end(); ?>
</div>