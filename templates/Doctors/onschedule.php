<style>
.carousel img {
    width: 70px;
    height: 70px;
    object-fit:cover;
    border-radius: 50%;
    margin-right: 1rem;
    overflow: hidden;
}
.carousel {
    position: relative;
    /* background: #62989d66; */
    background: linear-gradient(135deg, #0f626a 0%, #198f94 50%, #0d3f43 100%);
    border-radius: 16px;
    padding: 20px;
}
.carousel-inner {
    padding: 1em;
}

@media screen and (min-width: 576px) {
    .carousel-inner {
        display: flex;
        width: 100%;
        margin-inline: auto;
        padding: 1em 0;
        overflow: hidden;
    }

    .carousel-item {
        display: block;
        margin-right: 0;
        flex: 0 0 calc(100% / 2);
    }
}

@media screen and (min-width: 768px) {
    .carousel-item {
        display: block;
        margin-right: 0;
        flex: 0 0 calc(100% / 3);
    }
}

.carousel .card {
    margin: 0 0.5em;
    border: 0;
    box-shadow:0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    height:100%;
    border-radius:16px;
    overflow:hidden;
    border:3px solid #fff;
}

.carousel-control-prev,
.carousel-control-next {
    width: 3rem;
    height: 3rem;
    background-color: #066;
    border-radius: 50%;
    top: 50%;
    transform: translateY(-50%);
    border:none;
    opacity: 0.5;
}


.schedule_slider {
    background: #e91e631c;
    padding: 20px;
    border-radius: 16px;
}

.card h4 {
    background: #0f626a;
    color: #fff;
    padding: 20px;
    text-align: center;
    font-size: 20px;
}

.schedule_slider .card {
    border-radius: 16px;
    overflow: hidden;
    height: 100%;
}

.doctor-info {
    display: flex;
}

.doctor-info a {
    flex-shrink: 0;
}

.doctor-det {
    flex: 1;
    margin-left: 20px;
}

.doctor-det p {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 5px;
    font-size: 14px;
}

.list-group {
    display: flex;
    flex-direction: row;
    justify-content: start;
    align-items: center;
    gap: 10px;
    flex-wrap: wrap;
}

.list-group-item {
    padding: 5px;
    background: #ececec;
    font-size: 12px;
    border-radius: 8px !important;
}

.radiology_list {
    display: flex;
    width: 100%;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.radiology_list p {
    margin-bottom: 0;
}

.collapse.show {
    display: block;
    background: #ececec75;
    padding: 10px;
    margin-bottom: 10px;
}
.card-body{
    max-height: 615px;
    overflow-y: auto;
}
</style>


<div class="container-fluid bg-body-tertiary py-3">
    <div id="testimonialCarousel" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="card  mx-2">
                    <h4 class="">Pediatric Radiologist</h4>
                    <div class="card-body">
                        <?php foreach ($departments as $key => $ul): ?>
                        <?php //debug($ul); ?>
                        <?php 
                            // Loop through doctors in chunks of 4 per row
                            $doctorChunks = array_chunk($ul->doctors, 4);
                            foreach ($doctorChunks as $doctorPair): 
                        ?>
                        <div class="">
                            <?php foreach ($doctorPair as $index => $OnSchedule): ?>
                                <?php //debug($OnSchedule); ?>
                            <div class="">
                                <div class="">
                                    <div class="radiology_list">
                                        <p class=""><?= h($OnSchedule->lastname) ?></p>
                                        <button class="btn themebtn" data-toggle="collapse"
                                            data-target="#doctorInfo<?= $key . $index ?>" aria-expanded="false">
                                            View Details
                                        </button>
                                    </div>
                                    <div id="doctorInfo<?= $key . $index ?>" class="collapse mt-2">
                                        
                                        <div class="doctor-info">
                                            <a href="#">
                                               <?php if ($OnSchedule->photo){ ?>
                                                    <?= $this->Html->image(
                                                        $OnSchedule->photo,
                                                        ['width' => '94px', 'class' => "rounded-circle mr-0 img-fluid"]
                                                    ); ?>   
                                                <?php }else{ ?>
                                                    <?= $this->Html->image(
                                                        'doctor-1.png',
                                                        ['width' => '94px', 'class' => "rounded-circle mr-0 img-fluid"]
                                                    ); ?>
                                                <?php } ?>
                                            </a>
                                            <div class="doctor-det">
                                                <p class="font-weight-bold mt-2"><?= h($OnSchedule->firstname) ?>
                                                    <?= h($OnSchedule->lastname) ?></p>
                                                <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                                <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                                <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; ?>
                        </div>
                        <?php endforeach; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
             <?php foreach ($departments as $key => $ul): ?>
                <?php //debug($ul); ?>
                <div class="carousel-item">
                    <div class="card  mx-2">
                        <h4 class=""><?= h($ul->dname) ?></h4>
                        <div class="card-body">
                            <?php foreach ($ul->doctors as $OnSchedule): ?>
                            <?php if ($OnSchedule->OnSchedule == 1 && $OnSchedule->dept_id == $ul->id): ?>
                            <div class="doctor-info mb-4">
                                <a href="#">
                                    <!-- <i class="fa fa-user-md" style="font-size:24px"></i> -->
                                    <?php if ($OnSchedule->photo){ ?>
                                        <?= $this->Html->image(
                                            $OnSchedule->photo,
                                            ['width' => '94px', 'class' => "img-thumbnail mr-0 img-fluid rounded-circle"]
                                        ); ?>   
                                    <?php }else{ ?>
                                        <?= $this->Html->image(
                                            'doctor-1.png',
                                            ['width' => '94px', 'class' => "img-thumbnail mr-0 img-fluid rounded-circle"]
                                        ); ?>
                                    <?php } ?>
                                </a>
                                <div class="doctor-det">
                                    <p><strong><?= h($OnSchedule->firstname) ?>
                                            <?= h($OnSchedule->lastname) ?></strong></p>
                                    <p><strong>Cell:</strong> <?= h($OnSchedule->Cell) ?></p>
                                    <p><strong>Pager:</strong> <?= h($OnSchedule->pager) ?></p>
                                    <p><strong>Extension:</strong> <?= h($OnSchedule->Office_extension) ?></p>
                                    <p><strong>Procedure:</strong> <?= h($OnSchedule->procedure_name) ?></p>

                                </div>
                            </div>

                            <ul class="list-group mb-4">
                                <li class="list-group-item">Consultation</li>
                                <li class="list-group-item">Fluoroscopy</li>
                                <li class="list-group-item">Hospital & ED</li>
                                <li class="list-group-item">Sedation</li>
                            </ul>
                            <?php endif; ?>
                            <?php endforeach; ?>
                        
                        </div>
                    </div>
                </div>
             <?php endforeach; ?>
            <div class="carousel-item">
                <div class="card  mx-2">
                    <h4 class="">Announcements</h4>
                    <div class="card-body">
                        <!-- Announcements Section gett procedure -->
                        <?php foreach ($announcements as $key => $ul): ?>
                        <?php //debug($ul); ?>
                        <div class="doctor-info text-center mb-3">
                            <a href="#">
                                <?php  if($ul->Image){ ?>
                                <?= $this->Html->image($ul->Image, ['width' => '94px', 'class' => "rounded-circle img-fluid"]); ?>
                                <?php }else{ ?>
                                <?= $this->Html->image('placeholder.png', ['width' => '94px', 'class' => "rounded-circle img-fluid"]); ?>
                                <?php } ?>
                            </a>
                            <div class="doctor-det">
                                <p><strong>Name:</strong><?= h($ul->Holiday_name) ?></p>
                                <p><strong>Message:</strong> <?= h($ul->Message) ?></p>
                                <?php if($ul->procedure){ ?>
                                    <p><strong>IR Procedures:</strong> <?= h( $ul->procedure ? $ul->procedure->procedure_name : "Unavailable") ?></p>
                                <?php } ?>
                                <?php if($ul->doctor){ ?>
                                    <p><strong>Doctors:</strong><span><?= $ul->doctor ? $ul->doctor->firstname . ' ' . $ul->doctor->lastname : "N/A"; ?></span></p>
                                <?php } ?>
                                <!-- <p><strong>Current Procedures:</strong> <?//= h($ul->Message) ?></p>
                                <p><strong>Performing Doctor:</strong> <?//= h($ul->Message) ?></p> -->
                                <p><strong>Reg Date:</strong> <?= $ul->reg_date ? $ul->reg_date : "N/A"; ?></p>
                                <?php if($ul->doctor){ ?>
                                    <p><strong>Procedure:</strong> <?= h($ul->doctor ? $ul->doctor->procedure_name : 'Unavailable') ?></p>
                                <?php } ?>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#testimonialCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden"></span>
        </button>
    </div>
</div>