<?php
    if(isset($_POST['submit']) && $_POST['submit']=='SEND') {
        if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['email']) && !empty($_POST['email']) && $_POST['content']) {
            $content = $_POST['content'];
            imap_mail('tkisiel5w4@yahoo.com', 'tkisiel.pl - Wiadomosc od: '.$_POST['name'], chunk_split(base64_encode($content)), 'Content-Transfer-Encoding: base64;'."\r\n".'Content-Type: text/html; charset=utf-8;'."\r\n");
            imap_mail('tomcio61@onet.pl', 'tkisiel.pl - Wiadomosc od: '.$_POST['name'], chunk_split(base64_encode($content)), 'Content-Transfer-Encoding: base64;'."\r\n".'Content-Type: text/html; charset=utf-8;'."\r\n");
        } else {
            if(empty($_POST['name'])) {
                $_SESSION['err_name'] = 'THIS FIELD IS REQUIRED';
            } else {
                $_SESSION['name'] = $_POST['name'];
            }
            if(empty($_POST['email'])) {
                $_SESSION['err_email'] = 'THIS FIELD IS REQUIRED';
            } else {
                $_SESSION['email'] = $_POST['email'];
            }
        }
    }
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Tomasz Kisiel - Personal Web Page</title>
		<link rel="stylesheet" type="text/css" href="css/style.min.css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<!-- <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet"> -->
		<link href="https://fonts.googleapis.com/css?family=Rubik::400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="js/app.js"></script>
		<link rel="shortcut icon" type="image/png" href="img/favicon.png"/>
        <meta charset="UTF-8">
	</head>
	<body>
		<header id="home" class="home preload">
			<nav>
				<div class="logo">
					<i class="fas fa-carrot"></i>
				</div>
				<div class="menu op1">HOME</div>
				<div class="menu op2">ABOUT</div>
				<div class="menu op3">PROJECTS</div>
				<div class="menu op4">SKILLS</div>
				<div class="menu op5">CONTACT</div>
			</nav>
			<div class="hn-span">
				<div class="float-span">
					<p class="hello">Hello! I am</p>
					<p class="name">TOMASZ</p>
				</div>
			</div>
		</header>
		<section id="about" class="about">
			<div class="parallelogram">
				<div>
					<div class="holder">
						<div class="img">
							<img src="img/about1.png" width="320px" alt="Mac outline with a html sign and a list.">
						</div>
						<div class="desc">
							<h1>About Me</h1>
							<p>My name is Tomasz, since 2016 I am an student of technical school Jan III Sobieski on the information technology profile. I've always liked technical activities that allowed me to create something myself, I learned programming at the beginning of the school from creating websites and simple games based on JavaScript. Thanks to the skills acquired while learning this language, I could easily transfer to other languages such as Java, C#, C++, Python, PHP and use them for subsequent projects, which I set myself as goals. I am currently developing my knowledge of these languages and some of their frameworks.</p>
						</div>
					</div>
					<div class="holder">
						<div class="img">
							<img src="img/about2.png" width="320px" alt="Atom outline.">
						</div>
						<div class="desc">
							<h1>Interests</h1>
							<p>Programming is my passion and I would like it to be my job in the future. However, this is not the only thing that interests me. I like science, especially physics, because I do not like it when I do not understand the reality that surrounds me ... it's frustrating. I practice in my free time. I run (even marathon), go to the gym or train kyokushin karate. I play the guitar and along with scouts I roam around the mountains, visit the surrounding forests, meadows and interesting, often forgotten places. I am an altar boy in a church, where together with a guardian priest we have created a special system for altar boys. I work with youth teaching them programming in my school.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<aside class="ps-logo preload">
			<div class="ps-span">
				<div class="float-span">
					<p class="projects">PROJECTS</p>
					<p class="skills">SKILLS</p>
				</div>
			</div>
		</aside>
		<section class="ps-section">
			<div class="parallelogram">
				<div id="projects" class="projects">
					<input type="radio" id="i1" name="images" checked/>
					<input type="radio" id="i2" name="images" />
					<input type="radio" id="i3" name="images" />
					<input type="radio" id="i4" name="images" />
					<input type="radio" id="i5" name="images" />
					<input type="radio" id="i6" name="images" />
					<input type="radio" id="i7" name="images" />
					<input type="radio" id="i8" name="images" />
					<input type="radio" id="i9" name="images" />
					<input type="radio" id="i10" name="images" />
					<div class="project" id="pr_1">
						<div>
							<img src="img/project1.png" alt="">
						</div>
						<div>
							<h1>ZSZ The Game</h1>
							<p>A mocking game about my school made in the style of Low Poly using the Unity3D engine. This is a proprietary idea developed during the summer as part of learning programming in C#, creating three-dimensional models and animations.</p>
							<div>
								<a href="#">CHECK IT</a>
							</div>
						</div>
						<label class="prev" for="i3"><span></span></label>
						<label class="next" for="i2"><span></span></label>
					</div>
					<div class="project" id="pr_2">
						<div>
							<img src="img/project2.png" alt="">
						</div>
						<div>
							<h1>eZakrystia</h1>
							<p>Electronic system of verification of the presence of altar boys in the parish, made as a variety of the ministry, which includes a website with its own CMS, a mobile application and a scanner based on Raspberry Pi Zero and Python.</p>
							<div>
								<a href="http://ezakrystia.pl/demo/">CHECK IT</a>
							</div>
						</div>
						<label class="prev" for="i1"><span></span></label>
						<label class="next" for="i3"><span></span></label>
					</div>
					<div class="project" id="pr_3">
						<div>
							<img src="img/project3.png" alt="">
						</div>
						<div>
							<h1>Carrot Garden</h1>
							<p>The first Idle Clicker game for mobile devices made in Unity. It allowed me to familiarize with the operate of the Google Play Console and how to implement advertising networks for my products.</p>
							<div>
								<a href="https://play.google.com/store/apps/details?id=pl.tkisiel.carrotgarden">CHECK IT</a>
							</div>
						</div>
						<label class="prev" for="i2"><span></span></label>
						<label class="next" for="i1"><span></span></label>
					</div>
					<div class="nav">
						<label for="i1" class="dots" id="dot1"></label>
						<label for="i2" class="dots" id="dot2"></label>
						<label for="i3" class="dots" id="dot3"></label>
					</div>
				</div>
				<div id="skills" class="skills">
					<div>
						<div>
							<img src="img/skill1.svg" alt="">
						</div>
						<div>
							Complying with the current HTML5 standards and using its advantages allows me to build websites.
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill2.svg" alt="">
						</div>
						<div>
							Using the latest CSS3 entities like Flexbox, Grid supported by SASS allow me to create fantastic design.
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill3.svg" alt="">
						</div>
						<div>
							Pure JavaScript, Jquery and many freamworks allowed me to start programming a few years ago.
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill4.svg" alt="">
						</div>
						<div>
							Creating a website's design is a very pleasant activity, but creating the back-end gives me the most pleasure.
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill5.svg" alt="">
						</div>
						<div>
							Writing an application on android, and in particular simple games gives a lot of fun in boring lessons :P
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill6.svg" alt="">
						</div>
						<div>
							Java, which is probably my favorite language, allows me to create applications on many platforms.
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill7.svg" alt="">
						</div>
						<div>
							Learning Python together with C language enabled me to control single boards like Arduino or Raspberry.
						</div>
					</div>
					<div>
						<div>
							<img src="img/skill8.svg" alt="">
						</div>
						<div>
							Wordpress allows me to speed up the process of creating pages, and allows their simple management.
						</div>
					</div>
				</div>
			</div>
		</section>
		<footer id="contact" class="contact">
			<div class="parallelogram">
				<div class="c-span">
					CONTACT
				</div>
				<form id="contact" action="#contact" method="POST" class="c-form">
					<textarea type="text" name="name" class="text-holder <?=(isset($_SESSION['err_name']) ? 'error' : '')?>" placeholder="<?=(isset($_SESSION['err_name']) ? $_SESSION['err_name'] : 'NAME')?>" onfocus="this.placeholder=''" onblur="this.placeholder='<?=(isset($_SESSION['err_name']) ? $_SESSION['err_name'] : 'NAME')?>'" autocomplete="off"><?=(isset($_SESSION['name']) ? $_SESSION['name'] : '')?></textarea><div class="text-underline <?=(isset($_SESSION['err_name']) ? 'error' : '')?>"></div><br>
					<textarea type="text" name="email" class="text-holder <?=(isset($_SESSION['err_email']) ? 'error' : '')?>" placeholder="<?=(isset($_SESSION['err_email']) ? $_SESSION['err_email'] : 'E-MAIL')?>" onfocus="this.placeholder=''" onblur="this.placeholder='<?=(isset($_SESSION['err_email']) ? $_SESSION['err_email'] : 'E-MAIL')?>'" autocomplete="off"><?=(isset($_SESSION['email']) ? $_SESSION['email'] : '')?></textarea><div class="text-underline <?=(isset($_SESSION['err_email']) ? 'error' : '')?>"></div><br>
					<textarea class="text-holder area" name="content" placeholder="HOW CAN I HELP YOU" onfocus="this.placeholder=''" onblur="this.placeholder='HOW CAN I HELP YOU'" autocomplete="off"></textarea><div class="text-underline"></div><br>
					<div class="btn-holder">
						<input type="submit" class="btn" name="submit" value="SEND">
					</div>
				</form>
			</div>
		</footer>
	</body>
</html>
<?php
    unset($_SESSION['err_name'], $_SESSION['err_email'], $_SESSION['name'], $_SESSION['email']);
?>
