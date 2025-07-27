<nav class="navbar navbar-expand-lg navbar-dark header_navbar">
    <a class="navbar-brand text-light" href="<?= $this->Url->build('/') ?>">
        <?php echo $this->Html->image('logo-web-new-removebg.png') ?>
        <!-- <i class="fas fa-hospital-symbol"></i> Imaging Management -->
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
        <ul class="navbar-nav ml-auto align-items-center mr-4">
            <?php if (!empty($authUser->id)) : ?>
                <li class="nav-item">
                    <?= $this->Html->link('Doctors', ['controller' => 'Doctors', 'action' => 'index'], ['class' => 'nav-link text-light', 'escape' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Departments', ['controller' => 'Departments', 'action' => 'index'], ['class' => 'nav-link text-light', 'escape' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Announcements', ['controller' => 'Announcements', 'action' => 'index'], ['class' => 'nav-link text-light', 'escape' => false]) ?>
                </li>
                <li class="nav-item">
                    <?= $this->Html->link('Users', ['controller' => 'Users', 'action' => 'index'], ['class' => 'nav-link text-light', 'escape' => false]) ?>
                </li>
                
                <li class="nav-item">
                    <?= $this->Html->link('Schedule', ['controller' => 'Doctors', 'action' => 'onschedule'], ['class' => 'nav-link text-light', 'escape' => false]) ?>
                </li>
                
                <li class="nav-item">
                    <?= $this->Html->link('Procedures', ['controller' => 'Procedures', 'action' => 'index'], ['class' => 'nav-link text-light', 'escape' => false]) ?>
                </li>
        </ul>
        <a href="" class="nav-item">
                    <?= $this->Html->link(' Logout', ['controller' => 'Users', 'action' => 'logout'], ['class' => ' themebtn fa fa-sign-out', 'escape' => false]) ?>
                </a>
            <?php else : ?>
                <!-- <a href="" class="nav-item">
                    <//?= $this->Html->link('<i class="fa fa-sign-in" aria-hidden="true"></i> Login', ['controller' => 'Users', 'action' => 'login'], ['class' => 'themebtn', 'escape' => false]) ?>
                </a> -->
            <?php endif; ?>
    </div>
</nav>
