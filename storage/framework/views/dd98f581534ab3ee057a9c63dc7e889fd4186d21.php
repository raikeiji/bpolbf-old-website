

<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <form class="row gy-2 gx-3 py-2 align-items-center">
                <h6 class="no-line mb-0 text-white">Looking for something?</h6>
            <div class="col-12 col-md">
                <select class="form-select">
                    <option selected>Select activity</option>
                    <option value="1">Leisure</option>
                    <option value="2">Adventure</option>
                    <option value="3">Culture</option>
                </select>
            </div>
            <div class="col-12 col-md">
                <select class="form-select">
                    <option selected>Select region</option>
                    <option value="1">Labuan Bajo</option>
                    <option value="2">Flores</option>
                </select>
            </div>
            <div class="col-12 col-md">
                <select class="form-select">
                    <option selected>Select month range</option>
                    <option value="1">January - March</option>
                    <option value="2">April - June</option>
                    <option value="3">July - September</option>
                    <option value="3">October - December</option>
                </select>
            </div>
            <div class="col-auto">
                <div class="d-block">
                    <button type="submit" class="btn btn-lg btn-primary">Find!</button>
                </div>
            </div>
        </form>
        </div>
    </div>
    <div class="navbar navbar-expand-md navbar-light bg-light home-nav home-nav-transparent">
        <div class="container">
            <a href="<?php echo e(route('home')); ?>" class="navbar-brand d-flex align-items-center">
                <img src="<?php echo e(asset('assets/img/logo.png')); ?>" class="nav-logo" alt="Logo" height="80">
            </a>
            <button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto mb-2 mb-md-0">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('tourism')); ?>"><?php echo e(__('header.tourism')); ?></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('boplbf')); ?>"><?php echo e(__('header.authority')); ?></a>
            </li>
            <li class="separator"></li>
            <?php $locale = session()->get('locale'); ?>
            <li class="nav-item dropdown langselect">
                <?php switch($locale):
                    case ('en'): ?>
                    <a class="nav-link dropdown-toggle" href="#" id="langselect" data-toggle="dropdown" aria-expanded="true">EN</a>
                    <?php break; ?>
                    <?php case ('id'): ?>
                    <a class="nav-link dropdown-toggle" href="#" id="langselect" data-toggle="dropdown" aria-expanded="true">ID</a>
                    <?php break; ?>
                    <?php default: ?>
                    <a class="nav-link dropdown-toggle" href="#" id="langselect" data-toggle="dropdown" aria-expanded="true">ID</a>
                <?php endswitch; ?>
                <ul class="dropdown-menu" aria-labelledby="langselect">
                    <li><a class="dropdown-item" href="lang/en">EN</a></li>
                    <li><a class="dropdown-item" href="lang/id">ID</a></li>
                </ul>
            </li>
        </ul>
        </div>
        </button>
        </div>
    </div>
</header>