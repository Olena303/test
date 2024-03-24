<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="initial-scale=1, width=device-width" />
	<link rel="stylesheet" href="./style.css" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Overpass:wght@600;700&display=swap" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Hind:wght@300;400&display=swap" />
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="./main.js"></script>
</head>

<body>
	<div class="contact-us-careers">
		<div class="frame-parent">
			<div class="header-form"> 
				<div class="tech-solutions-that-container">
		            <span>Reach Out and </span>
		            <span class="connect">Connect</span>
		            <span> With Us</span>
	          </div> 
	      </div>
			<div class="powering-your-potential"> Bridging Your Ideas with Our Expertise 
			</div>
		</div>
		<form class="frame-group" id="contactForm" action="handler.php" method="post">
			<div class="block-with-fields">
				<div class="name-field"> 
					<input class="my-name"  id="name" name="name" placeholder="Name *" type="text" required /> 
					<div id="resultName"></div>
			   </div>
				<div class="email-field ">				
						<input class="my-mail" name="email" id="email" placeholder="E-mail *" type="email" required />
						<div id="resultEmail"></div>
				</div>
				<div class="phone-field"> 
					<input class="my-phone" name="phone" id="phone" placeholder="Phone *" type="tel" required />
					<div id="resultPhone"></div> 
				</div>


				<div class="password">
				    <input class="my-password" id="password" name="password" placeholder="Password *" type="password" required="">

				    <img id="togglePassword" class="pass-icon" alt="Toggle Visibility" src="./public/component-142.svg">
				    <div id="resultPassword"></div>
				</div>

				<div class="drop">
					<select name="city" required>
					    <option value="">Choose your city *</option>

					    <option value="city1">Kyiv</option>
					    <option value="city2">Lviv</option>
					  
					</select>
				</div>
			</div>
			<div class="frame-container">
				<div class="frame-wrapper">
					<div class="check-parent "> 
						<input type="checkbox" id="policy" name="policy" required>
						<label for="policy" class="i-have-read-and-accepted-priva-wrapper">
							<div class="i-have-read-container"> 
								<span class="i-have-read">I have read and accepted</span>
								<span class="policy_link"><a href="#">privacy policy</a></span> 
							</div>
						</label>
					</div>
				</div> 
				<button type="submit"   id="sendForm" class="submit-parent">
		            <div class="submit">
		              Submit
		            </div>
		            <div class="line-submit"></div>
		        </button> 
		    </div>
		</form>
	</div>

</body>

</html>
