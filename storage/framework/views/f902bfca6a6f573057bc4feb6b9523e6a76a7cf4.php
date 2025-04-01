<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>"
dir="<?php echo e(in_array(app()->getLocale(),['ar-SA','fa-IR', 'he-IL']) ? 'rtl' : 'ltr'); ?>">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>
        <?php $__env->startSection('title'); ?>
        <?php echo $__env->yieldSection(); ?>
        :: <?php echo e($snipeSettings->site_name); ?>

    </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta name="apple-mobile-web-app-capable" content="yes">


    <link rel="apple-touch-icon"
          href="<?php echo e(($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->logo)) :  config('app.url').'/img/snipe-logo-bug.png'); ?>">
    <link rel="apple-touch-startup-image"
          href="<?php echo e(($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->logo)) :  config('app.url').'/img/snipe-logo-bug.png'); ?>">
    <link rel="shortcut icon" type="image/ico"
          href="<?php echo e(($snipeSettings) && ($snipeSettings->favicon!='') ?  Storage::disk('public')->url(e($snipeSettings->favicon)) : config('app.url').'/favicon.ico'); ?> ">


    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="baseUrl" content="<?php echo e(config('app.url')); ?>/">

    <script nonce="<?php echo e(csrf_token()); ?>">
        window.Laravel = {csrfToken: '<?php echo e(csrf_token()); ?>'};
    </script>

    
    <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/all.css'))); ?>">
    <?php if(($snipeSettings) && ($snipeSettings->allow_user_skin==1) && Auth::check() && Auth::user()->present()->skin != ''): ?>
        <link rel="stylesheet" href="<?php echo e(url(mix('css/dist/skins/skin-'.Auth::user()->present()->skin.'.min.css'))); ?>">
    <?php else: ?>
        <link rel="stylesheet"
              href="<?php echo e(url(mix('css/dist/skins/skin-'.($snipeSettings->skin!='' ? $snipeSettings->skin : 'blue').'.css'))); ?>">
    <?php endif; ?>
    
    <?php echo $__env->yieldPushContent('css'); ?>



    <?php if(($snipeSettings) && ($snipeSettings->header_color!='')): ?>
        <style nonce="<?php echo e(csrf_token()); ?>">
            .main-header .navbar, .main-header .logo {
                background-color: <?php echo e($snipeSettings->header_color); ?>;
                background: -webkit-linear-gradient(top,  <?php echo e($snipeSettings->header_color); ?> 0%,<?php echo e($snipeSettings->header_color); ?> 100%);
                background: linear-gradient(to bottom, <?php echo e($snipeSettings->header_color); ?> 0%,<?php echo e($snipeSettings->header_color); ?> 100%);
                border-color: <?php echo e($snipeSettings->header_color); ?>;
            }

            .skin-<?php echo e($snipeSettings->skin!='' ? $snipeSettings->skin : 'blue'); ?> .sidebar-menu > li:hover > a, .skin-<?php echo e($snipeSettings->skin!='' ? $snipeSettings->skin : 'blue'); ?> .sidebar-menu > li.active > a {
                border-left-color: <?php echo e($snipeSettings->header_color); ?>;
            }

            .btn-primary {
                background-color: <?php echo e($snipeSettings->header_color); ?>;
                border-color: <?php echo e($snipeSettings->header_color); ?>;
            }
        </style>
    <?php endif; ?>

    
    <?php if(($snipeSettings) && ($snipeSettings->custom_css)): ?>
        <style>
            <?php echo $snipeSettings->show_custom_css(); ?>

        </style>
    <?php endif; ?>


    <script nonce="<?php echo e(csrf_token()); ?>">
        window.snipeit = {
            settings: {
                "per_page": <?php echo e($snipeSettings->per_page); ?>

            }
        };
    </script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <script src="<?php echo e(url(asset('js/html5shiv.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>
    <script src="<?php echo e(url(asset('js/respond.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>

    <?php echo \Livewire\Livewire::styles(); ?>


</head>

<?php if(($snipeSettings) && ($snipeSettings->allow_user_skin==1) && Auth::check() && Auth::user()->present()->skin != ''): ?>
    <body class="sidebar-mini skin-<?php echo e($snipeSettings->skin!='' ? Auth::user()->present()->skin : 'blue'); ?> <?php echo e((session('menu_state')!='open') ? 'sidebar-mini sidebar-collapse' : ''); ?>">
    <?php else: ?>
        <body class="sidebar-mini skin-<?php echo e($snipeSettings->skin!='' ? $snipeSettings->skin : 'blue'); ?> <?php echo e((session('menu_state')!='open') ? 'sidebar-mini sidebar-collapse' : ''); ?>">
        <?php endif; ?>


        <a class="skip-main" href="#main"><?php echo e(trans('general.skip_to_main_content')); ?></a>
        <div class="wrapper">

            <header class="main-header">

                <!-- Logo -->


                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button above the compact sidenav -->
                    <a href="#" style="color: white" class="sidebar-toggle btn btn-white" data-toggle="push-menu"
                       role="button">
                        <span class="sr-only"><?php echo e(trans('general.toggle_navigation')); ?></span>
                    </a>
                    <div class="nav navbar-nav navbar-left">
                        <div class="left-navblock">
                            <?php if($snipeSettings->brand == '3'): ?>
                                <a class="logo navbar-brand no-hover" href="<?php echo e(config('app.url')); ?>">
                                    <?php if($snipeSettings->logo!=''): ?>
                                        <img class="navbar-brand-img"
                                             src="<?php echo e(Storage::disk('public')->url($snipeSettings->logo)); ?>"
                                             alt="<?php echo e($snipeSettings->site_name); ?> logo">
                                    <?php endif; ?>
                                    <?php echo e($snipeSettings->site_name); ?>

                                </a>
                            <?php elseif($snipeSettings->brand == '2'): ?>
                                <a class="logo navbar-brand no-hover" href="<?php echo e(config('app.url')); ?>">
                                    <?php if($snipeSettings->logo!=''): ?>
                                        <img class="navbar-brand-img"
                                             src="<?php echo e(Storage::disk('public')->url($snipeSettings->logo)); ?>"
                                             alt="<?php echo e($snipeSettings->site_name); ?> logo">
                                    <?php endif; ?>
                                    <span class="sr-only"><?php echo e($snipeSettings->site_name); ?></span>
                                </a>
                            <?php else: ?>
                                <a class="logo navbar-brand no-hover" href="<?php echo e(config('app.url')); ?>">
                                    <?php echo e($snipeSettings->site_name); ?>

                                </a>
                            <?php endif; ?>
                        </div>
                    </div>

                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
                                <li aria-hidden="true"<?php echo (Request::is('hardware*') ? ' class="active"' : ''); ?>>
                                    <a href="<?php echo e(url('hardware')); ?>" accesskey="1" tabindex="-1">
                                        <i class="fas fa-barcode fa-fw"></i>
                                        <span class="sr-only"><?php echo e(trans('general.assets')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\License::class)): ?>
                                <li aria-hidden="true"<?php echo (Request::is('licenses*') ? ' class="active"' : ''); ?>>
                                    <a href="<?php echo e(route('licenses.index')); ?>" accesskey="2" tabindex="-1">
                                        <i class="far fa-save fa-fw"></i>
                                        <span class="sr-only"><?php echo e(trans('general.licenses')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Accessory::class)): ?>
                                <li aria-hidden="true"<?php echo (Request::is('accessories*') ? ' class="active"' : ''); ?>>
                                    <a href="<?php echo e(route('accessories.index')); ?>" accesskey="3" tabindex="-1">
                                        <i class="far fa-keyboard fa-fw"></i>
                                        <span class="sr-only"><?php echo e(trans('general.accessories')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Consumable::class)): ?>
                                <li aria-hidden="true"<?php echo (Request::is('consumables*') ? ' class="active"' : ''); ?>>
                                    <a href="<?php echo e(url('consumables')); ?>" accesskey="4" tabindex="-1">
                                        <i class="fas fa-tint fa-fw"></i>
                                        <span class="sr-only"><?php echo e(trans('general.consumables')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Component::class)): ?>
                                <li aria-hidden="true"<?php echo (Request::is('components*') ? ' class="active"' : ''); ?>>
                                    <a href="<?php echo e(route('components.index')); ?>" accesskey="5" tabindex="-1">
                                        <i class="far fa-hdd fa-fw"></i>
                                        <span class="sr-only"><?php echo e(trans('general.components')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
                                <li>
                                    <form class="navbar-form navbar-left form-horizontal" role="search"
                                          action="<?php echo e(route('findbytag/hardware')); ?>" method="get">
                                        <div class="col-xs-12 col-md-12">
                                            <div class="col-xs-12 form-group">
                                                <label class="sr-only"
                                                       for="tagSearch"><?php echo e(trans('general.lookup_by_tag')); ?></label>
                                                <input type="text" class="form-control" id="tagSearch" name="assetTag"
                                                       placeholder="<?php echo e(trans('general.lookup_by_tag')); ?>">
                                                <input type="hidden" name="topsearch" value="true" id="search">
                                            </div>
                                            <div class="col-xs-1">
                                                <button type="submit" class="btn btn-primary pull-right">
                                                    <i class="fas fa-search" aria-hidden="true"></i>
                                                    <span class="sr-only"><?php echo e(trans('general.search')); ?></span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                <li class="dropdown" aria-hidden="true">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                        <?php echo e(trans('general.create')); ?>

                                        <strong class="caret"></strong>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Asset::class)): ?>
                                            <li <?php echo (Request::is('hardware/create') ? 'class="active>"' : ''); ?>>
                                                <a href="<?php echo e(route('hardware.create')); ?>" tabindex="-1">
                                                    <i class="fas fa-barcode fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.asset')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\License::class)): ?>
                                            <li <?php echo (Request::is('licenses/create') ? 'class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('licenses.create')); ?>" tabindex="-1">
                                                    <i class="far fa-save fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.license')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Accessory::class)): ?>
                                            <li <?php echo (Request::is('accessories/create') ? 'class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('accessories.create')); ?>" tabindex="-1">
                                                    <i class="far fa-keyboard fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.accessory')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Consumable::class)): ?>
                                            <li <?php echo (Request::is('consunmables/create') ? 'class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('consumables.create')); ?>" tabindex="-1">
                                                    <i class="fas fa-tint fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.consumable')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Component::class)): ?>
                                            <li <?php echo (Request::is('components/create') ? 'class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('components.create')); ?>" tabindex="-1">
                                                    <i class="far fa-hdd fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.component')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\User::class)): ?>
                                            <li <?php echo (Request::is('users/create') ? 'class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('users.create')); ?>" tabindex="-1">
                                                    <i class="fas fa-user fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.user')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </li>
                            <?php endif; ?>

                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                <?php if($snipeSettings->show_alerts_in_menu=='1'): ?>
                                    <!-- Tasks: style can be found in dropdown.less -->
                                    <?php $alert_items = Helper::checkLowInventory(); ?>

                                    <li class="dropdown tasks-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <i class="far fa-flag" aria-hidden="true"></i>
                                            <span class="sr-only"><?php echo e(trans('general.alerts')); ?></span>
                                            <?php if(count($alert_items)): ?>
                                                <span class="label label-danger"><?php echo e(count($alert_items)); ?></span>
                                            <?php endif; ?>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="header"><?php echo e(trans('general.quantity_minimum', array('count' => count($alert_items)))); ?></li>
                                            <li>
                                                <!-- inner menu: contains the actual data -->
                                                <ul class="menu">

                                                    <?php for($i = 0; count($alert_items) > $i; $i++): ?>

                                                        <li><!-- Task item -->
                                                            <a href="<?php echo e(route($alert_items[$i]['type'].'.show', $alert_items[$i]['id'])); ?>">
                                                                <h2 class="task_menu"><?php echo e($alert_items[$i]['name']); ?>

                                                                    <small class="pull-right">
                                                                        <?php echo e($alert_items[$i]['remaining']); ?> <?php echo e(trans('general.remaining')); ?>

                                                                    </small>
                                                                </h2>
                                                                <div class="progress xs">
                                                                    <div class="progress-bar progress-bar-yellow"
                                                                         style="width: <?php echo e($alert_items[$i]['percent']); ?>%"
                                                                         role="progressbar"
                                                                         aria-valuenow="<?php echo e($alert_items[$i]['percent']); ?>"
                                                                         aria-valuemin="0" aria-valuemax="100">
                                                                        <span class="sr-only"><?php echo e($alert_items[$i]['percent']); ?>% Complete</span>
                                                                    </div>
                                                                </div>
                                                            </a>
                                                        </li>
                                                        <!-- end task item -->
                                                    <?php endfor; ?>
                                                </ul>
                                            </li>
                                            
                                        </ul>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>



                            <!-- User Account: style can be found in dropdown.less -->
                            <?php if(Auth::check()): ?>
                                <li class="dropdown user user-menu">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <?php if(Auth::user()->present()->gravatar()): ?>
                                            <img src="<?php echo e(Auth::user()->present()->gravatar()); ?>" class="user-image"
                                                 alt="">
                                        <?php else: ?>
                                            <i class="fas fa-users" aria-hidden="true"></i>
                                        <?php endif; ?>

                                        <span class="hidden-xs"><?php echo e(Auth::user()->getFullNameAttribute()); ?> <strong
                                                    class="caret"></strong></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- User image -->
                                        <li <?php echo (Request::is('account/profile') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('view-assets')); ?>">
                                                <i class="fas fa-check fa-fw" aria-hidden="true"></i>
                                                <?php echo e(trans('general.viewassets')); ?>

                                            </a></li>

                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewRequestable', \App\Models\Asset::class)): ?>
                                            <li <?php echo (Request::is('account/requested') ? ' class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('account.requested')); ?>">
                                                    <i class="fas fa-check fa-disk fa-fw" aria-hidden="true"></i>
                                                    <?php echo e(trans('general.requested_assets_menu')); ?>

                                                </a></li>
                                        <?php endif; ?>

                                        <li <?php echo (Request::is('account/accept') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('account.accept')); ?>">
                                                <i class="fas fa-check fa-disk fa-fw"></i>
                                                <?php echo e(trans('general.accept_assets_menu')); ?>

                                            </a></li>


                                        <li>
                                            <a href="<?php echo e(route('profile')); ?>">
                                                <i class="fas fa-user fa-fw" aria-hidden="true"></i>
                                                <?php echo e(trans('general.editprofile')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('account.password.index')); ?>">
                                                <i class="fa-solid fa-asterisk fa-fw" aria-hidden="true"></i>
                                                <?php echo e(trans('general.changepassword')); ?>

                                            </a>
                                        </li>


                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('self.api')): ?>
                                            <li>
                                                <a href="<?php echo e(route('user.api')); ?>">
                                                    <i class="fa-solid fa-user-secret fa-fw"
                                                       aria-hidden="true"></i></i> <?php echo e(trans('general.manage_api_keys')); ?>

                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li class="divider" style="margin-top: -1px; margin-bottom: -1px"></li>
                                        <li>

                                            <a href="<?php echo e(route('logout.get')); ?>"
                                               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa fa-sign-out fa-fw"></i> <?php echo e(trans('general.logout')); ?>

                                            </a>

                                            <form id="logout-form" action="<?php echo e(route('logout.post')); ?>" method="POST"
                                                  style="display: none;">
                                                <?php echo e(csrf_field()); ?>

                                            </form>

                                        </li>
                                    </ul>
                                </li>
                            <?php endif; ?>


                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('superadmin')): ?>
                                <li>
                                    <a href="<?php echo e(route('settings.index')); ?>">
                                        <i class="fa fa-cogs fa-fw" aria-hidden="true"></i>
                                        <span class="sr-only"><?php echo e(trans('general.admin')); ?></span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
                <a href="#" style="float:left" class="sidebar-toggle-mobile visible-xs btn" data-toggle="push-menu"
                   role="button">
                    <span class="sr-only"><?php echo e(trans('general.toggle_navigation')); ?></span>
                    <i class="fas fa-bars"></i>
                </a>
                <!-- Sidebar toggle button-->
            </header>

            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                            <li <?php echo (\Request::route()->getName()=='home' ? ' class="active"' : ''); ?> class="firstnav">
                                <a href="<?php echo e(route('home')); ?>">
                                    <i class="fas fa-tachometer-alt fa-fw" aria-hidden="true"></i>
                                    <span><?php echo e(trans('general.dashboard')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Asset::class)): ?>
                            <li class="treeview<?php echo e(((Request::is('statuslabels/*') || Request::is('hardware*')) ? ' active' : '')); ?>">
                                <a href="#"><i class="fas fa-barcode fa-fw" aria-hidden="true"></i>
                                    <span><?php echo e(trans('general.assets')); ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?php echo e(url('hardware')); ?>">
                                            <i class="far fa-circle text-grey fa-fw" aria-hidden="true"></i>
                                            <?php echo e(trans('general.list_all')); ?>

                                            <span class="badge">
                                                <?php echo e((isset($total_assets)) ? $total_assets : ''); ?>

                                            </span>
                                        </a>
                                    </li>

                                    <?php $status_navs = \App\Models\Statuslabel::where('show_in_nav', '=', 1)->withCount('assets as asset_count')->get(); ?>
                                    <?php if(count($status_navs) > 0): ?>
                                        <?php $__currentLoopData = $status_navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $status_nav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li<?php echo (Request::is('statuslabels/'.$status_nav->id) ? ' class="active"' : ''); ?>>
                                                <a href="<?php echo e(route('statuslabels.show', ['statuslabel' => $status_nav->id])); ?>">
                                                    <i class="fas fa-circle text-grey fa-fw"
                                                       aria-hidden="true"<?php echo ($status_nav->color!='' ? ' style="color: '.e($status_nav->color).'"' : ''); ?>></i>
                                                    <?php echo e($status_nav->name); ?>

                                                    <span class="badge badge-secondary"><?php echo e($status_nav->asset_count); ?></span></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>


                                    <li<?php echo (Request::query('status') == 'Deployed' ? ' class="active"' : ''); ?>>
                                        <a href="<?php echo e(url('hardware?status=Deployed')); ?>">
                                            <i class="far fa-circle text-blue fa-fw"></i>
                                            <?php echo e(trans('general.deployed')); ?>

                                            <span class="badge"><?php echo e((isset($total_deployed_sidebar)) ? $total_deployed_sidebar : ''); ?></span>
                                        </a>
                                    </li>
                                    <li<?php echo (Request::query('status') == 'RTD' ? ' class="active"' : ''); ?>>
                                        <a href="<?php echo e(url('hardware?status=RTD')); ?>">
                                            <i class="far fa-circle text-green fa-fw"></i>
                                            <?php echo e(trans('general.ready_to_deploy')); ?>

                                            <span class="badge"><?php echo e((isset($total_rtd_sidebar)) ? $total_rtd_sidebar : ''); ?></span>
                                        </a>
                                    </li>
                                    <li<?php echo (Request::query('status') == 'Pending' ? ' class="active"' : ''); ?>><a
                                                href="<?php echo e(url('hardware?status=Pending')); ?>"><i
                                                    class="far fa-circle text-orange fa-fw"></i>
                                            <?php echo e(trans('general.pending')); ?>

                                            <span class="badge"><?php echo e((isset($total_pending_sidebar)) ? $total_pending_sidebar : ''); ?></span>
                                        </a>
                                    </li>
                                    <li<?php echo (Request::query('status') == 'Undeployable' ? ' class="active"' : ''); ?> ><a
                                                href="<?php echo e(url('hardware?status=Undeployable')); ?>"><i
                                                    class="fas fa-times text-red fa-fw"></i>
                                            <?php echo e(trans('general.undeployable')); ?>

                                            <span class="badge"><?php echo e((isset($total_undeployable_sidebar)) ? $total_undeployable_sidebar : ''); ?></span>
                                        </a>
                                    </li>
                                    <li<?php echo (Request::query('status') == 'byod' ? ' class="active"' : ''); ?>><a
                                                href="<?php echo e(url('hardware?status=byod')); ?>"><i
                                                    class="fas fa-times text-red fa-fw"></i>
                                            <?php echo e(trans('general.byod')); ?>

                                            <span class="badge"><?php echo e((isset($total_byod_sidebar)) ? $total_byod_sidebar : ''); ?></span>
                                        </a>
                                    </li>
                                    <li<?php echo (Request::query('status') == 'Archived' ? ' class="active"' : ''); ?>><a
                                                href="<?php echo e(url('hardware?status=Archived')); ?>"><i
                                                    class="fas fa-times text-red fa-fw"></i>
                                            <?php echo e(trans('admin/hardware/general.archived')); ?>

                                            <span class="badge"><?php echo e((isset($total_archived_sidebar)) ? $total_archived_sidebar : ''); ?></span>
                                        </a>
                                    </li>
                                    <li<?php echo (Request::query('status') == 'Requestable' ? ' class="active"' : ''); ?>><a
                                                href="<?php echo e(url('hardware?status=Requestable')); ?>"><i
                                                    class="fas fa-check text-blue fa-fw"></i>
                                            <?php echo e(trans('admin/hardware/general.requestable')); ?>

                                        </a>
                                    </li>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit', \App\Models\Asset::class)): ?>
                                        <li<?php echo (Request::is('hardware/audit/due') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('assets.audit.due')); ?>">
                                                <i class="fas fa-history text-yellow fa-fw"></i> <?php echo e(trans('general.audit_due')); ?>

                                                <span class="badge"><?php echo e((isset($total_due_and_overdue_for_audit)) ? $total_due_and_overdue_for_audit : ''); ?></span>
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', \App\Models\Asset::class)): ?>
                                    <li<?php echo (Request::is('hardware/checkins/due') ? ' class="active"' : ''); ?>>
                                        <a href="<?php echo e(route('assets.checkins.due')); ?>">
                                            <i class="fas fa-history text-yellow fa-fw"></i> <?php echo e(trans('general.checkin_due')); ?>

                                            <span class="badge"><?php echo e((isset($total_due_and_overdue_for_checkin)) ? $total_due_and_overdue_for_checkin : ''); ?></span>
                                        </a>
                                    </li>
                                    <?php endif; ?>

                                    <li class="divider">&nbsp;</li>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkin', \App\Models\Asset::class)): ?>
                                        <li<?php echo (Request::is('hardware/quickscancheckin') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('hardware/quickscancheckin')); ?>">
                                                <?php echo e(trans('general.quickscan_checkin')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('checkout', \App\Models\Asset::class)): ?>
                                        <li<?php echo (Request::is('hardware/bulkcheckout') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('hardware.bulkcheckout.show')); ?>">
                                                <?php echo e(trans('general.bulk_checkout')); ?>

                                            </a>
                                        </li>
                                        <li<?php echo (Request::is('hardware/requested') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('assets.requested')); ?>">
                                                <?php echo e(trans('general.requested')); ?></a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('create', \App\Models\Asset::class)): ?>
                                        <li<?php echo (Request::query('Deleted') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(url('hardware?status=Deleted')); ?>">
                                                <?php echo e(trans('general.deleted')); ?>

                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('maintenances.index')); ?>">
                                                <?php echo e(trans('general.asset_maintenances')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                                        <li>
                                            <a href="<?php echo e(url('hardware/history')); ?>">
                                                <?php echo e(trans('general.import-history')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('audit', \App\Models\Asset::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('assets.bulkaudit')); ?>">
                                                <?php echo e(trans('general.bulkaudit')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\License::class)): ?>
                            <li<?php echo (Request::is('licenses*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('licenses.index')); ?>">
                                    <i class="far fa-save fa-fw"></i>
                                    <span><?php echo e(trans('general.licenses')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('index', \App\Models\Accessory::class)): ?>
                            <li<?php echo (Request::is('accessories*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('accessories.index')); ?>">
                                    <i class="far fa-keyboard fa-fw"></i>
                                    <span><?php echo e(trans('general.accessories')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Consumable::class)): ?>
                            <li<?php echo (Request::is('consumables*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(url('consumables')); ?>">
                                    <i class="fas fa-tint fa-fw"></i>
                                    <span><?php echo e(trans('general.consumables')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Component::class)): ?>
                            <li<?php echo (Request::is('components*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('components.index')); ?>">
                                    <i class="far fa-hdd fa-fw"></i>
                                    <span><?php echo e(trans('general.components')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\PredefinedKit::class)): ?>
                            <li<?php echo (Request::is('kits') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('kits.index')); ?>">
                                    <i class="fa fa-object-group fa-fw"></i>
                                    <span><?php echo e(trans('general.kits')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\User::class)): ?>
                            <li<?php echo (Request::is('users*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('users.index')); ?>" accesskey="6">
                                    <i class="fas fa-users fa-fw"></i>
                                    <span><?php echo e(trans('general.people')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('import')): ?>
                            <li<?php echo (Request::is('import/*') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('imports.index')); ?>">
                                    <i class="fas fa-cloud-upload-alt fa-fw" aria-hidden="true"></i>
                                    <span><?php echo e(trans('general.import')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('backend.interact')): ?>
                            <li class="treeview <?php echo in_array(Request::route()->getName(),App\Helpers\Helper::SettingUrls()) ? ' active': ''; ?>">
                                <a href="#" id="settings">
                                    <i class="fas fa-cog" aria-hidden="true"></i>
                                    <span><?php echo e(trans('general.settings')); ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>

                                <ul class="treeview-menu">
                                    <?php if(Gate::allows('view', App\Models\CustomField::class) || Gate::allows('view', App\Models\CustomFieldset::class)): ?>
                                        <li <?php echo (Request::is('fields*') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('fields.index')); ?>">
                                                <?php echo e(trans('admin/custom_fields/general.custom_fields')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Statuslabel::class)): ?>
                                        <li <?php echo (Request::is('statuslabels*') ? ' class="active"' : ''); ?>>
                                            <a href="<?php echo e(route('statuslabels.index')); ?>">
                                                <?php echo e(trans('general.status_labels')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\AssetModel::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('models.index')); ?>" <?php echo e((Request::is('/assetmodels') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.asset_models')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Category::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('categories.index')); ?>" <?php echo e((Request::is('/categories') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.categories')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Manufacturer::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('manufacturers.index')); ?>" <?php echo e((Request::is('/manufacturers') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.manufacturers')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Supplier::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('suppliers.index')); ?>" <?php echo e((Request::is('/suppliers') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.suppliers')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Department::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('departments.index')); ?>" <?php echo e((Request::is('/departments') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.departments')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Location::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('locations.index')); ?>" <?php echo e((Request::is('/locations') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.locations')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Company::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('companies.index')); ?>" <?php echo e((Request::is('/companies') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.companies')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view', \App\Models\Depreciation::class)): ?>
                                        <li>
                                            <a href="<?php echo e(route('depreciations.index')); ?>" <?php echo e((Request::is('/depreciations') ? ' class="active"' : '')); ?>>
                                                <?php echo e(trans('general.depreciation')); ?>

                                            </a>
                                        </li>
                                    <?php endif; ?>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('reports.view')): ?>
                            <li class="treeview<?php echo e((Request::is('reports*') ? ' active' : '')); ?>">
                                <a href="#" class="dropdown-toggle">
                                    <i class="fas fa-chart-bar fa-fw"></i>
                                    <span><?php echo e(trans('general.reports')); ?></span>
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>

                                <ul class="treeview-menu">
                                    <li>
                                        <a href="<?php echo e(route('reports.activity')); ?>" <?php echo e((Request::is('reports/activity') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.activity_report')); ?>

                                        </a>
                                    </li>

                                    <li>
                                        <a href="<?php echo e(route('reports.audit')); ?>" <?php echo e((Request::is('reports.audit') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.audit_report')); ?></a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('reports/depreciation')); ?>" <?php echo e((Request::is('reports/depreciation') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.depreciation_report')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('reports/licenses')); ?>" <?php echo e((Request::is('reports/licenses') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.license_report')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('reports/asset_maintenances')); ?>" <?php echo e((Request::is('reports/asset_maintenances') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.asset_maintenance_report')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('reports/unaccepted_assets')); ?>" <?php echo e((Request::is('reports/unaccepted_assets') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.unaccepted_asset_report')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('reports/accessories')); ?>" <?php echo e((Request::is('reports/accessories') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.accessory_report')); ?>

                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(url('reports/custom')); ?>" <?php echo e((Request::is('reports/custom') ? ' class="active"' : '')); ?>>
                                            <?php echo e(trans('general.custom_report')); ?>

                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>

                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('viewRequestable', \App\Models\Asset::class)): ?>
                            <li<?php echo (Request::is('account/requestable-assets') ? ' class="active"' : ''); ?>>
                                <a href="<?php echo e(route('requestable-assets')); ?>">
                                    <i class="fa fa-laptop fa-fw"></i>
                                    <span><?php echo e(trans('admin/hardware/general.requestable')); ?></span>
                                </a>
                            </li>
                        <?php endif; ?>


                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->

            <div class="content-wrapper" role="main" id="setting-list">
                <barepay></barepay>

                <?php if($debug_in_production): ?>
                    <div class="row" style="margin-bottom: 0px; background-color: red; color: white; font-size: 15px;">
                        <div class="col-md-12"
                             style="margin-bottom: 0px; background-color: #b50408 ; color: white; padding: 10px 20px 10px 30px; font-size: 16px;">
                            <i class="fas fa-exclamation-triangle fa-3x pull-left"></i>
                            <strong><?php echo e(strtoupper(trans('general.debug_warning'))); ?>:</strong>
                            <?php echo trans('general.debug_warning_text'); ?>

                        </div>
                    </div>
                <?php endif; ?>

                <!-- Content Header (Page header) -->
                <section class="content-header" style="padding-bottom: 30px;">
                    <h1 class="pull-left pagetitle"><?php echo $__env->yieldContent('title'); ?> </h1>

                    <?php if(isset($helpText)): ?>
                        <?php echo $__env->make('partials.more-info',
                                               [
                                                   'helpText' => $helpText,
                                                   'helpPosition' => (isset($helpPosition)) ? $helpPosition : 'left'
                                               ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                    <div class="pull-right">
                        <?php echo $__env->yieldContent('header_right'); ?>
                    </div>


                </section>


                <section class="content" id="main" tabindex="-1">

                    <!-- Notifications -->
                    <div class="row">
                        <?php if(config('app.lock_passwords')): ?>
                            <div class="col-md-12">
                                <div class="callout callout-info">
                                    <?php echo e(trans('general.some_features_disabled')); ?>

                                </div>
                            </div>
                        <?php endif; ?>

                        <?php echo $__env->make('notifications', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>


                    <!-- Content -->
                    <div id="<?php echo (Request::is('*api*') ? 'app' : 'webui'); ?>">
                        <?php echo $__env->yieldContent('content'); ?>
                    </div>

                </section>

            </div><!-- /.content-wrapper -->
            <footer class="main-footer hidden-print" style="display:grid;flex-direction:column;">

                <div class="1hidden-xs pull-left">
                    <div class="pull-left" >
                        <a target="_blank">Flipper Inventory</a> is system,
                        customized with <i class="fas fa-heart" style="color: #a94442; font-size: 10px" aria-hidden="true"></i><span
                                class="sr-only">love</span> by <a href="https://www.linkedin.com/in/eleganceict/" rel="noopener">@Adugna  Gizaw</a>.
                    </div>
                   <!---
                   <div class="pull-right">
                    <?php if($snipeSettings->version_footer!='off'): ?>
                        <?php if(($snipeSettings->version_footer=='on') || (($snipeSettings->version_footer=='admin') && (Auth::user()->isSuperUser()=='1'))): ?>
                            &nbsp; <strong>Version</strong> <?php echo e(config('version.app_version')); ?> -
                            build <?php echo e(config('version.build_version')); ?> (<?php echo e(config('version.branch')); ?>)
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($snipeSettings->support_footer!='off'): ?>
                        <?php if(($snipeSettings->support_footer=='on') || (($snipeSettings->support_footer=='admin') && (Auth::user()->isSuperUser()=='1'))): ?>
                            <a target="_blank" class="btn btn-default btn-xs"
                               href="https://snipe-it.readme.io/docs/overview"
                               rel="noopener"><?php echo e(trans('general.user_manual')); ?></a>
                            <a target="_blank" class="btn btn-default btn-xs" href="https://snipeitapp.com/support/"
                               rel="noopener"><?php echo e(trans('general.bug_report')); ?></a>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if($snipeSettings->privacy_policy_link!=''): ?>
                        <a target="_blank" class="btn btn-default btn-xs" rel="noopener"
                           href="<?php echo e($snipeSettings->privacy_policy_link); ?>"
                           target="_new"><?php echo e(trans('admin/settings/general.privacy_policy')); ?></a>
                    <?php endif; ?>
                    </div>
                    <br>
                    <?php if($snipeSettings->footer_text!=''): ?>
                        <div class="pull-left">
                            <?php echo Helper::parseEscapedMarkedown($snipeSettings->footer_text); ?>

                        </div>
                    <?php endif; ?>
                </div>
            </footer>
        </div>
        --->


        <!-- end main container -->

        <div class="modal modal-danger fade" id="dataConfirmModal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h2 class="modal-title" id="myModalLabel">&nbsp;</h2>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <form method="post" id="deleteForm" role="form">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('DELETE')); ?>


                            <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal"><?php echo e(trans('general.cancel')); ?></button>
                            <button type="submit" class="btn btn-outline"
                                    id="dataConfirmOK"><?php echo e(trans('general.yes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="modal modal-warning fade" id="restoreConfirmModal" tabindex="-1" role="dialog"
             aria-labelledby="confirmModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="confirmModalLabel">&nbsp;</h4>
                    </div>
                    <div class="modal-body"></div>
                    <div class="modal-footer">
                        <form method="post" id="restoreForm" role="form">
                            <?php echo e(csrf_field()); ?>

                            <?php echo e(method_field('POST')); ?>


                            <button type="button" class="btn btn-default pull-left"
                                    data-dismiss="modal"><?php echo e(trans('general.cancel')); ?></button>
                            <button type="submit" class="btn btn-outline"
                                    id="dataConfirmOK"><?php echo e(trans('general.yes')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        
        <script src="<?php echo e(url(mix('js/dist/all.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>
        <script defer src="<?php echo e(url(mix('js/dist/all-defer.js'))); ?>" nonce="<?php echo e(csrf_token()); ?>"></script>

        <!-- v5-beta: This pGenerator call must remain here for v5 - until fixed - so that the JS password generator works for the user create modal. -->
        <script src="<?php echo e(url('js/pGenerator.jquery.js')); ?>"></script>

        
        <?php echo $__env->yieldPushContent('js'); ?>

        <?php $__env->startSection('moar_scripts'); ?>
        <?php echo $__env->yieldSection(); ?>


        <script nonce="<?php echo e(csrf_token()); ?>">

            var clipboard = new ClipboardJS('.js-copy-link');

            clipboard.on('success', function(e) {
                // Get the clicked element
                var clickedElement = $(e.trigger);
                // Get the target element selector from data attribute
                var targetSelector = clickedElement.data('data-clipboard-target');
                // Show the alert that the content was copied
                clickedElement.tooltip('hide').attr('data-original-title', '<?php echo e(trans('general.copied')); ?>').tooltip('show');
            });

            // ignore: 'input[type=hidden]' is required here to validate the select2 lists
            $.validate({
                form: '#create-form',
                modules: 'date, toggleDisabled',
                disabledFormFilter: '#create-form',
                showErrorDialogs: true,
                ignore: 'input[type=hidden]'
            });


            function showHideEncValue(e) {
                // Use element id to find the text element to hide / show
                var targetElement = e.id+"-to-show";
                var hiddenElement = e.id+"-to-hide";
                if($(e).hasClass('fa-lock')) {
                    $(e).removeClass('fa-lock').addClass('fa-unlock');
                    // Show the encrypted custom value and hide the element with asterisks
                    document.getElementById(targetElement).style.fontSize = "100%";
                    document.getElementById(hiddenElement).style.display = "none";
                } else {
                    $(e).removeClass('fa-unlock').addClass('fa-lock');
                    // ClipboardJS can't copy display:none elements so use a trick to hide the value
                    document.getElementById(targetElement).style.fontSize = "0px";
                    document.getElementById(hiddenElement).style.display = "";
                 }
             }

            $(function () {

                // Invoke Bootstrap 3's tooltip
                $('[data-tooltip="true"]').tooltip({
                    container: 'body',
                    animation: true,
                });

                $('[data-toggle="popover"]').popover();
                $('.select2 span').addClass('needsclick');
                $('.select2 span').removeAttr('title');

                // This javascript handles saving the state of the menu (expanded or not)
                $('body').bind('expanded.pushMenu', function () {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo e(route('account.menuprefs', ['state'=>'open'])); ?>",
                        _token: "<?php echo e(csrf_token()); ?>"
                    });

                });

                $('body').bind('collapsed.pushMenu', function () {
                    $.ajax({
                        type: 'GET',
                        url: "<?php echo e(route('account.menuprefs', ['state'=>'close'])); ?>",
                        _token: "<?php echo e(csrf_token()); ?>"
                    });
                });

            });

            // Initiate the ekko lightbox
            $(document).on('click', '[data-toggle="lightbox"]', function (event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
            //This prevents multi-click checkouts for accessories, components, consumables
            $(document).ready(function () {
                $('#checkout_form').submit(function (event) {
                    event.preventDefault();
                    $('#submit_button').prop('disabled', true);
                    this.submit();
                });
            });

            // Select encrypted custom fields to hide them in the asset list
            $(document).ready(function() {
                // Selector for elements with css-padlock class
                var selector = 'td.css-padlock';

                // Function to add original value to elements
                function addValue($element) {
                    // Get original value of the element
                    var originalValue = $element.text().trim();

                    // Show asterisks only for not empty values
                    if (originalValue !== '') {
                        // This is necessary to avoid loop because value is generated dynamically
                        if (originalValue !== '' && originalValue !== asterisks) $element.attr('value', originalValue);

                        // Hide the original value and show asterisks of the same length
                        var asterisks = '*'.repeat(originalValue.length);
                        $element.text(asterisks);

                        // Add click event to show original text
                        $element.click(function() {
                            var $this = $(this);
                            if ($this.text().trim() === asterisks) {
                                $this.text($this.attr('value'));
                            } else {
                                $this.text(asterisks);
                            }
                        });
                    }
                }
                // Add value to existing elements
                $(selector).each(function() {
                    addValue($(this));
                });

                // Function to handle mutations in the DOM because content is generated dynamically
                var observer = new MutationObserver(function(mutations) {
                    mutations.forEach(function(mutation) {
                        // Check if new nodes have been inserted
                        if (mutation.type === 'childList') {
                            mutation.addedNodes.forEach(function(node) {
                                if ($(node).is(selector)) {
                                    addValue($(node));
                                } else {
                                    $(node).find(selector).each(function() {
                                        addValue($(this));
                                    });
                                }
                            });
                        }
                    });
                });

                // Configure the observer to observe changes in the DOM
                var config = { childList: true, subtree: true };
                observer.observe(document.body, config);
            });


        </script>

        <?php if((Session::get('topsearch')=='true') || (Request::is('/'))): ?>
            <script nonce="<?php echo e(csrf_token()); ?>">
                $("#tagSearch").focus();
            </script>
        <?php endif; ?>

        <?php echo $__env->make('partials.bpay', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo \Livewire\Livewire::scripts(); ?>


        </body>
</html>
<?php /**PATH /home2/flipperschool/inventory.flipperschool.com/resources/views/layouts/default.blade.php ENDPATH**/ ?>