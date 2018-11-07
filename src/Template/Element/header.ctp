<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/DrivingSchool">~VROOM~</a>
        </div>



        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
				<li>
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							<?= __('Languages') ?>
							<span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li>
								<?php echo $this->Html->link('English', ['action' => 'changeLang', 'en_US'], ['escape' => false]) ?>
							</li>
							<li role="separator" class="divider"></li>
							<li>
								<?php echo $this->Html->link('Français', ['action' => 'changeLang', 'fr_CA'], ['escape' => false]) ?>
							</li>
							<li role="separator" class="divider"></li>
							<li>
								<?php echo $this->Html->link('日本語', ['action' => 'changeLang', 'ja'], ['escape' => false]) ?>
							</li>
						</ul>
					</div>
				</li>

                    <li><?php
                        $loguser = $this->request->session()->read('Auth.User');
                            if ($loguser) {
                                $user = $loguser['first_name'] . ' ' . $loguser['last_name'];
                                echo $this->Html->link($user . ' logout', ['controller' => 'Users', 'action' => 'logout']);
                            } else {
                                echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                            }
                ?></li>
                <li><?= $this->Html->link(__('About'), ['controller' => 'Pages', 'action' => 'apropos']) ?></li>

            </ul>
        </div>
    </div>
</nav>
