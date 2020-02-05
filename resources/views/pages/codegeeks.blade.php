@extends('layouts.app')
 @section('title', '| CODE GEEKS') 
 @section('orgs-stylesheets')
 <link rel="stylesheet" href="css/orgs.css" type="text/css">
 @stop
 @section('content')
<div id="codeGeeksHeader">
        <span><img src="assets/imgs/logo/codegeeks_logo.jpg" alt="Code Geeks's Logo" class="img-fluid rounded-circle"></span>
        <h1 class="txt"><br/>Code Geeks</h1>
        <h2 class="ptxt">&bull; WEB DEVELOPMENT &bull;</h2>
    </div>

    <div id="main">

        <header class="major container 75%">
            <h2 class="txt">Sample text here
                <br />Sample text here
                <br /></h2>
        </header>

        <div class="container-fluid">
			<div class="row">
				<div class="col-md-5">
					<img src="assets/imgs/orgs/codegeeks_cover.png" alt="Code Geeks Members" class="img-fluid">
				</div>
				<div class="col-md-7">
					
					<h1 class="txt">
						Code Geeks
					</h1>
	
					<div>
						<hr class="hrO">
						<br><br><br>
						<p class="ptxt">
                            Code Geeks is an organization of the College of Information and Communications Technology in Holy Angel University for students under the major of Web Development.
						</p>
					</div>
				</div>
			</div>
		</div>
<section class="major container 75%">
            <h3>MEMBERS KENI</h3>
            <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>
            <ul class="actions">
                <li><a href="#" class="button">Join our crew</a></li>
            </ul>
        </section>
<section class="major container 75%">
            <h3>POSTS KEHI</h3>
            <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>
            <ul class="actions">
                <li><a href="#" class="button">Join our crew</a></li>
            </ul>
        </section>

    </div>

    <!-- Footer -->
    <div id="codeGeeksFooter">
        <div class="container 75%">

            <header class="major last">
                <h2>Lorem Ipsum</h2>
            </header>

            <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>

            <ul class="icons">
                <li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
                <li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
                <li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
                <li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
                <li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
            </ul>

            <ul class="copyright">
                <li>&copy; Untitled. All rights reserved.</li>
                <li>Design: <a href="http://html5up.net">Projman</a></li>
            </ul>

        </div>
    </div>

    @stop