<style>
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

.owl-carousel .item {
  display: flex;
  height: 100%;
}

.owl-carousel .card {
  flex-grow: 1;
  display: flex;
  flex-direction: column;
  height: 100%;
}

.owl-carousel img {
    width: 70px;
    height: 70px;
    object-fit:cover;
    border-radius: 50%;
    margin-right: 1rem;
    overflow: hidden;
}
.owl-carousel {
    position: relative;
    /* background: #62989d66; */
    background: linear-gradient(135deg, #0f626a 0%, #198f94 50%, #0d3f43 100%);
    border-radius: 16px;
    padding: 20px;
}
.owl-carousel .card {
    margin: 0 0.5em;
    border: 0;
    box-shadow:0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
    height:100%;
    border-radius:16px;
    overflow:hidden;
    border:3px solid #fff;
}

.owl-carousel .owl-nav {
  position: absolute;
  top: 50%;
  left: 0;
  right: 0;
  width: 100%;
  display: flex;
  justify-content: space-between;
  transform: translateY(-50%);
  pointer-events: none; /* allows clicks to pass through if needed */
  z-index: 10;
  padding: 0 10px;
}

.owl-carousel .owl-nav button.owl-prev,
.owl-carousel .owl-nav button.owl-next {
  border: none;
  font-size: 24px;
  width: 50px;
  height: 50px;
  border-radius: 50%;
  pointer-events: all; /* ensures buttons remain clickable */
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0 2px 8px rgba(0,0,0,0.2);
  background-color: #066 !important;
  border: none !important;
  outline: none !important;
  margin: -8px;
}

.owl-carousel .owl-nav button i{
    color:#fff;
    border:none;
    font-size: 24px;
}

.owl-carousel .owl-nav button.owl-prev:hover,
.owl-carousel .owl-nav button.owl-next:hover {
  background: #198f94;
}
@media screen and (max-width: 576px) {
    .doctor-info{
        display: block;
    }
    .owl-carousel img{
        width: auto !important;
    }
    .doctor-det{
        margin-left:0px;
        flex:none;
    }
    .doctor-det p{
        display: block;
        text-align: left;
        align-items: flex-start;
    }
    .doctor-det strong{
        display: block;
    }
}
</style>
<div class="owl-carousel owl-theme">
    <div class="item">
        <div class="card mx-2">
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
        <div class="item">
            <div class="card mx-2">
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
    <div class="item">
        <div class="card mx-2">
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