<div id="departmentCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <!-- Pediatric Radiologist Section -->
        <div class="carousel-item active">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">Pediatric Radiologist</h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php //debug($ul); ?>
                        <?php 
                            // Loop through doctors in chunks of 4 per row
                            $doctorChunks = array_chunk($ul->doctors, 4);
                            foreach ($doctorChunks as $doctorPair): 
                        ?>
                            <div class="row mb-4">
                                <?php foreach ($doctorPair as $index => $OnSchedule): ?>
                                    <div class="col-md-3 d-flex justify-content-center mb-3">
                                        <div class="doctor-info text-center">
                                            <p class="h5 mb-2"><?= h($OnSchedule->firstname) ?></p>
                                            <button class="btn btn-outline-primary btn-sm" data-toggle="collapse" data-target="#doctorInfo<?= $key . $index ?>" aria-expanded="false">
                                                View Details
                                            </button>
                                            <div id="doctorInfo<?= $key . $index ?>" class="collapse mt-2">
                                                <a href="#">
                                                    <?= $this->Html->image($OnSchedule->photo, ['width' => '94px', 'class' => "rounded-circle img-fluid"]); ?>
                                                </a>
                                                <p class="font-weight-bold mt-2"><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></p>
                                                <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                                <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                                <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                            </div>
                                            <hr>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- Peds 8-5 pm Section -->
        <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">Peds 8-5 pm</h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == 1): ?>
                                <div class="doctor-info mb-4">
                                    <a href="#">
                                        <i class="fa fa-user-md" style="font-size:24px"></i>
                                        <?= $this->Html->image($OnSchedule->photo, [
                                            'width' => '94px',
                                            'class' => 'img-thumbnail img-fluid rounded-circle'
                                        ]) ?>
                                    </a>
                                    <hr>
                                    <strong><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></strong>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item">Consultation</li>
                                        <li class="list-group-item">Fluoroscopy</li>
                                        <li class="list-group-item">Hospital & ED</li>
                                        <li class="list-group-item">Sedation</li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

         <!-- PA 8-4 pm Section -->
         <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">PA 8-4 pm</h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == 8): ?>
                                <div class="doctor-info mb-4">
                                    <a href="#">
                                        <i class="fa fa-user-md" style="font-size:24px"></i>
                                        <?= $this->Html->image($OnSchedule->photo, [
                                            'width' => '94px',
                                            'class' => 'img-thumbnail img-fluid rounded-circle'
                                        ]) ?>
                                    </a>
                                    <hr>
                                    <strong><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></strong>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item">Consultation</li>
                                        <li class="list-group-item">Fluoroscopy</li>
                                        <li class="list-group-item">Hospital & ED</li>
                                        <li class="list-group-item">Sedation</li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

         <!-- NEURO RAD -->
         <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">NEURO RAD</h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == 2): ?>
                                <div class="doctor-info mb-4">
                                    <a href="#">
                                        <i class="fa fa-user-md" style="font-size:24px"></i>
                                        <?= $this->Html->image($OnSchedule->photo, [
                                            'width' => '94px',
                                            'class' => 'img-thumbnail img-fluid rounded-circle'
                                        ]) ?>
                                    </a>
                                    <hr>
                                    <strong><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></strong>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                    <ul class="list-group list-group-flush text-center">
                                        <li class="list-group-item">Consultation</li>
                                        <li class="list-group-item">Fluoroscopy</li>
                                        <li class="list-group-item">Hospital & ED</li>
                                        <li class="list-group-item">Sedation</li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


         <!-- PEDS 1-5PM -->
         <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">PEDS 1-5PM </h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == 6): ?>
                                <div class="doctor-info mb-4">
                                    <a href="#">
                                        <i class="fa fa-user-md" style="font-size:24px"></i>
                                        <?= $this->Html->image($OnSchedule->photo, [
                                            'width' => '94px',
                                            'class' => 'img-thumbnail img-fluid rounded-circle'
                                        ]) ?>
                                    </a>
                                    <hr>
                                    <strong><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></strong>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>



        <!-- Interventional Radiology Section -->
        <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">Interventional Radiology</h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == 3): ?>
                                <div class="doctor-info mb-4">
                                    <a href="#">
                                        <i class="fa fa-user-md" style="font-size:24px"></i>
                                        <?= $this->Html->image($OnSchedule->photo, [
                                            'width' => '94px',
                                            'class' => 'img-thumbnail img-fluid rounded-circle'
                                        ]) ?>
                                    </a>
                                    <hr>
                                    <strong><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></strong>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

         <!-- REMOTE PD -->
         <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">REMOTE PD</h4>
                <div class="card-body">
                    <?php foreach ($departments as $key => $ul): ?>
                        <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == 7): ?>
                                <div class="doctor-info mb-4">
                                    <a href="#">
                                        <i class="fa fa-user-md" style="font-size:24px"></i>
                                        <?= $this->Html->image($OnSchedule->photo, [
                                            'width' => '94px',
                                            'class' => 'img-thumbnail img-fluid rounded-circle'
                                        ]) ?>
                                    </a>
                                    <hr>
                                    <strong><?= h($OnSchedule->firstname) ?> <?= h($OnSchedule->lastname) ?></strong>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>


        <!-- Announcements Section -->
        <div class="carousel-item">
            <div class="card shadow mx-2">
                <h4 class="p-3 bg-info text-white text-center">Announcements</h4>
                <div class="card-body text-center">
                    <button class="btn btn-success btn-lg mb-4">
                        Today - <?= date("Y/m/d") ?><br><?= date("h:i:sa") ?>
                    </button>
                </div>
                <div class="card-body">
                      <!-- Announcements Section gett procedure -->
                    <?php foreach ($announcements as $key => $ul): ?>
                        <?php //debug($ul); ?>
                        <div class="announcement-info text-center mb-3">
                            <p class="font-weight-bold"><?= h($ul->doctor->firstname) ?> <?= h($ul->doctor->lastname) ?></p>
                            <p><strong>Cell:</strong> <?= h($ul->doctor->Cell) ?></p>
                            <p><strong>Pager:</strong> <?= h($ul->doctor->Pager) ?></p>
                            <p><strong>Extension:</strong> <?= h($ul->doctor->Office_extension) ?></p>
                            <p><strong>Procedure:</strong> <?= h($ul->IR_PROCEDURES) ?></p>
                            <p><strong>Perfoming doctor:</strong> <?= h($ul->doctor_id) ?></p>
                           
                            <p><strong>Procedure:</strong> <?= h($ul->procedure ? $ul->procedure->procedure_name : 'Procedure not found') ?></p>
                            <?= $this->Html->image($ul->doctor->photo, ['width' => '94px', 'class' => "rounded-circle img-fluid"]); ?>
                            <hr>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    <!-- Carousel Controls -->
    <a class="carousel-control-prev" href="#departmentCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#departmentCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

</div>
<script>
    $(document).ready(function () {
        $('#departmentCarousel').carousel({
            interval: false  // Stops auto-slide; adjust as needed
        });
    });
</script>

