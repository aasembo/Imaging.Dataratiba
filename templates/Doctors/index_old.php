<div class="management_table">
    
        <div class="alert_msg">
            <?php echo $this->Flash->render(); ?>
</div>
<div class="table_heading">
            <h1 class="">Doctors
            </h1>
                            <?php echo $this->Html->link('Add Doctor', ['action' => 'add'], ['class' => 'themebtn fa fa-plus']); ?>

</div>

            <?php echo $this->Form->create(null, ['url' => ['action' => 'index']]); ?> <!-- Form submission to index action -->
<div class="table-responsive">
            <table class="">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">On Schedule</th>
                        <th scope="col">Department</th>
                        <th scope="col">Procedure</th>
                        <th scope="col">Created</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($doctors) < 1): ?>
                        <tr>
                            <td class="text-center" colspan="9">No records found.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($doctors as $doctor): ?>
                            <tr>
                                <td><?php echo $doctor->id; ?></td>
                                <td><?php echo $doctor->title; ?></td>
                                <td><?php echo $doctor->firstname; ?></td>
                                <td><?php echo $doctor->lastname; ?></td>
                                <td>
                                   <div class="input_filed">
                                     <?php echo $this->Form->control('fields[' . $doctor->id . '][OnSchedule]', [
                                        'type' => 'radio',
                                        'options' => ['0' => 'No', '1' => 'Yes'],
                                        'default' => $doctor->OnSchedule
                                    ]); ?>
                                   </div>                                </td>
                                <td>
                                    <div class="table_Select">
                                        <?php echo $this->Form->select('fields[' . $doctor->id . '][dept_id]', $departments, [
                                        'label' => false,
                                        'empty' => 'Select Department',
                                        'value' => $doctor->dept_id
                                    ]); ?>
                                    </div>
                                </td>
                                <td>
                                                                      <div class="table_Select">
                                    <?php echo $this->Form->select('fields[' . $doctor->id . '][procedure_name]', $procedures, [
                                        'label' => false,
                                        'empty' => 'Select Procedure',
                                        'value' => $doctor->procedure_name
                                    ]); ?>
                                    </div>
                                </td>
                                <td><?php echo $doctor->created; ?></td>
                                <td class="action">
                                    <?php echo $this->Html->link('', ['action' => 'edit', $doctor->id], ['class' => 'bg-primary-light fa fa-edit']); ?>
                                    <?php echo $this->Html->link('', ['action' => 'delete', $doctor->id], [
                                        'class' => 'bg-danger-light fa fa-trash',
                                        'onClick' => 'return confirm("Are you sure you want to delete this doctor?")'
                                    ]); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
                                </div>

<div class="px-3 pb-3">
                <?php echo $this->Form->button('Save', ['class' => 'themebtn px-4']); ?>
                                </div>
            <?php echo $this->Form->end(); ?> <!-- End form -->

        </div>
    </div>
</div>

