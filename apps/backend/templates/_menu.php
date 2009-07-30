<ul id="adminmenu">


				<li id="menu-dashboard" class="wp-first-item menu-top menu-top-first menu-top-last">
					<div class="wp-menu-image"><a href="home"><br/></a></div>
					<div class="wp-menu-toggle"><br/></div>
					<a class="wp-first-item menu-top menu-top-first menu-top-last" 
					href="<?php echo url_for('naslovnica/index') ?>">Naslovnica</a>
				
				</li>
				
				<li class="wp-menu-separator"><br/></li>
				
				<li id="menu-pages" class="wp-has-submenu  open-if-no-js menu-top menu-top-first">
					<div class="wp-menu-image"><a href="nasveti"><br/></a></div>
					<div class="wp-menu-toggle"><br/></div>
					<a class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-top-first" href="<?php echo url_for('clanki/index') ?>">Članki</a>
					<div class="wp-submenu">
						<div class="wp-submenu-head">Posts</div>
						<ul>
							<li class="wp-first-item current"><a tabindex="1" class="wp-first-item current" href="edit.php">Tema s težo</a></li>
							<li><a tabindex="1" href="">Dogaja</a></li>
							<li><a tabindex="1" href="">Besedo ti dam</a></li>
							<li><a tabindex="1" href="">Oznake</a></li>
							<li><a tabindex="1" href="">Nov Članek</a></li>
						</ul>
					</div>				
				</li>



		
				<li id="menu-tools" class="wp-has-submenu menu-top">
					<div class="wp-menu-image"><a href="about"><br/></a></div>
					<div class="wp-menu-toggle"><br/></div><a class="wp-has-submenu menu-top" href="<?php echo url_for('forum/index') ?>">Forum</a>
				
				</li>	




				<li id="menu-comments" class="menu-top">
					<div class="wp-menu-image">
					<a href="edit-comments.php"><br/></a></div>
					<div class="wp-menu-toggle" style="display: none;"><br/></div>
					<a class="menu-top menu-top-last" href="<?php echo url_for('svetovalnica/index') ?>">Svetovalnica<span class="count-0" id="awaiting-mod">
					<span class="pending-count">0</span></span></a>
				</li>
				


				<li id="menu-appearance" class="wp-has-submenu  open-if-no-js menu-top-last">
				<div class="wp-menu-image"><a href="?nasveti"><br/></a></div>
				<a class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-top-first" href="<?php echo url_for('organizacije/index') ?>">Organizacije</a>
				</li>






				<li class="wp-menu-separator"><a href="?unfoldmenu=1" class="separator"><br/></a></li>

				<li id="menu-links" class="wp-has-submenu menu-top-first  open-if-no-js ">
				<div class="wp-menu-image"><a href="nasveti"><br/></a></div>
				<a class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-top-first" href="<?php echo url_for('okroznica/index') ?>">Okrožnica</a>
				</li>
				<li id="menu-posts" class="wp-has-submenu  open-if-no-js">
				<div class="wp-menu-image"><a href="nasveti"><br/></a></div>
				<a class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-top-first" href="<?php echo url_for('koledar/index') ?>">Koledar</a>
				</li>
				<li id="menu-media" class="wp-has-submenu  open-if-no-js menu-top-last">
				<div class="wp-menu-image"><a href="nasveti"><br/></a></div>
				<a class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-top-first" href="<?php echo url_for('oaza/index') ?>">Oaza</a>
				</li>





				<li class="wp-menu-separator"><a href="?unfoldmenu=1" class="separator"><br/></a></li>

				<li id="menu-media" class="wp-has-submenu menu-top menu-top-first">
				<div class="wp-menu-image"><a href="?media"><br/></a></div>
				<div class="wp-menu-toggle"><br/></div><a class="wp-has-submenu menu-top menu-top-first" href="<?php echo url_for('multimedia/index') ?>">Slike in video</a>
				</li>
				<li id="menu-appearance" class="wp-has-submenu  open-if-no-js ">
				<div class="wp-menu-image"><a href="nasveti"><br/></a></div>
				<a class="wp-has-submenu wp-has-current-submenu wp-menu-open open-if-no-js menu-top menu-top-first" href="<?php echo url_for('bannerji/index') ?>">Bannerji</a>
				</li>	
								
				<li id="menu-users" class="wp-has-submenu menu-top">
					<div class="wp-menu-image"><a href="users.php"><br/></a></div>
					<div class="wp-menu-toggle"><br/></div><a class="wp-has-submenu menu-top" href="<?php echo url_for('uporabniki/index') ?>">Uporabniki</a>
				</li>
				<li id="menu-tools" class="wp-has-submenu menu-top">
					<div class="wp-menu-image"><a href="tools.php"><br/></a></div><div class="wp-menu-toggle"><br/></div>
					<a class="wp-has-submenu menu-top" href="?orodja">Orodja</a>
				</li>

				<li id="menu-settings" class="wp-has-submenu menu-top menu-top-last">
					<div class="wp-menu-image"><a href="options-general.php"><br/></a></div>
					<div class="wp-menu-toggle"><br/></div><a class="wp-has-submenu menu-top menu-top-last" href="?nastavitve">Nastavitve</a>
				</li>
				<li class="wp-menu-separator-last"><a href="?unfoldmenu=1" class="separator"><br/></a></li>

				
			</ul>