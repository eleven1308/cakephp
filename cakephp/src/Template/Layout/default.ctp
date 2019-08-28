<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= h($title) ?></title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <?= $this->Html->css('bootstrap.min.css') ?>
    <?= $this->Html->css('font-awesome.min.css') ?>
    <?= $this->Html->css('select2.min.css') ?>
    <?= $this->Html->script('select2.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    
    <!-- Fetch meta, css and script  -->
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <?php 
    $user = $this->Session->read('Auth.User.full_name');
    ?>
    <!-- Page Nav Bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-danger">
        <a class="navbar-brand" href="#">CakePHP</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <?php if($user): ?>
                    <li class="nav-item active">
                        <?= $this->Html->link('Customers','/customers', ['class' => 'nav-link']); ?>
                    </li>
                <?php endif; ?>
            </ul>
            <div class="my-2 my-lg-0">
                <?php if(!$user): ?>
                    <?= $this->Html->link('Register',
                        '/register',
                        ['class' => 'btn btn-sm btn-warning my-2 my-sm-0']
                    ) ?>
                    <?= '&nbsp' ?>
                    <?= $this->Html->link('Login',
                        '/login',
                        ['class' => 'btn btn-sm btn-info my-2 my-sm-0']
                    ) ?>
                <?php else: ?>
                     <p style="float: left; font-weight: bold; color: yellow;" >Xin Chào <?= $user  ?></p>
                      <?= '&nbsp' ?>
                      <?= '&nbsp' ?>
                     <?= $this->Html->link('Logout',
                        '/logout',
                        ['style' => 'font-weight: bold; color: white; ']
                    ) ?>
                <?php endif; ?>
                  
                
            </div>
        </div>
    </nav>
    <br>

    <div class="container">
        <?= $this->Flash->render() ?>
    </div>
    
    <?= $this->fetch('content') ?>
    <!-- Page Footer -->
    <!-- <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Footer</a>
    </nav> -->
    <?= $this->fetch('scriptBottom') ?>


</body>
</html>
