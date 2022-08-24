<?php

/*
Plugin Name:  Service Page 1
Version: 1.0
Description: Display Service Details
Author: Denis Kucuk
License: GPLv2 or later
Text Domain: service-page-1
*/

/**
 * [current_year] returns a text
 * @return string Text
*/

function servicePage1Style()
{

	    	?>

			<style>
				
				body
				{
					animation: 1s fadeIn !important;
				}
				
				
				#servicePage-1
				{
					
					max-width: 1100px;
					background-color: rgba(255,255,255,0.1);
					margin-left: auto;
					margin-right: auto;
					margin-top: -30px;
				}
				
				#my-form-type, #my-form-title
				{
					font-size: 0.5em;
				}
				
				
				/*----- Standard Bloc      -----------------------------*/
				.my-standard-bloc
				{
					padding-left: 7px;
					margin-top: 7px;
				}
				
				@media (max-width:800px) {
					.my-standard-bloc 
					{
						padding-left: 0px;
					}
				}
				
				/*--- Service Name -------------------------------------*/
				
				#nom-service-1
				{
					margin-bottom: 3px !important;
				}
				
				
				/*---- Bloc Place  -------------------------------------*/
				
				#place-bloc-service-1
				{
					margin-top: -5px;
					
				}
				
				#city-departement-service-1
				{
					color: grey;
					margin-right: 9px;
				}
				
				#place-bloc-service-1 img
				{
					max-width: 20px;
					margin-right: 4px;
				}
				

				
				/*---- Bloc Price Person ---------------------*/
				
				#price-person-bloc-service-1
				{
					margin-top: 5px;
					
				}
				
				#price-person-bloc-service-1 img
				{
					max-width: 20px;
					margin-right: 4px;
				}
				
				/*---- Picture Blocs --------------------------*/
				
				
				
				.picture-bloc-service img
				{
					border-radius: 30px;

				}
				
				/*-------Image Slider CSS-----------*/
				
				.mySlides {display: none}
				
				/* {box-sizing:border-box}*/
				
				img {vertical-align: middle;}
				
				.slideshow-container {
					margin-top: 20px;
					margin-left: -1%;   /* Sur Ecran Large, pas besoin de forcer les marges des images vers les extremes de l'ecran   */
					margin-right: -1%;
				  position: relative;
				}
				
				.slideshow-container img
				{
					border-radius: 30px;

				}
				
				/* Next & previous buttons */
				.prev, .next {
				  cursor: pointer;
				  position: absolute;
				  top: 50%;
				  width: auto;
				  padding: 90px 32px 90px;
				  font-size: 45px;
				  margin-top: -130px;
				  color: white;
				  font-weight: bold;
				  transition: 0.6s ease;
				  border-radius: 0 3px 3px 0;
				  user-select: none;
				  text-decoration: none !important;
				}

				/* Position the "next button" to the right */
				.next {
				  right: 0;
				  border-radius: 3px 0 0 3px;
				}

				/* On hover, add a black background color with a little bit see-through */
				.prev:hover, .next:hover {
				  background-color: rgba(0,0,0,0.1);
				}

				/* Caption text */
				.text {
				  color: #f2f2f2;
				  font-size: 15px;
				  padding: 8px 12px;
				  position: absolute;
				  bottom: 8px;
				  width: 100%;
				  text-align: center;
				}

				/* Number text (1/3 etc) */
				.numbertext {
				  color: #f2f2f2;
				  font-size: 12px;
				  padding: 8px 12px;
				  position: absolute;
				  top: 0;
				  visibility: hidden;
				}

				/* The dots/bullets/indicators */
				.dot {
				  cursor: pointer;
				  height: 15px;
				  width: 15px;
				  margin: 0 2px;
				  background-color: #bbb;
				  border-radius: 50%;
				  display: inline-block;
				  transition: background-color 0.6s ease;
				}

				.active, .dot:hover {
				  background-color: #717171;
				}

				/* Fading animation */
				.fade {
				  animation-name: fade;
				  animation-duration: 0s;
				}

				@keyframes fade {
				  from {opacity: .4} 
				  to {opacity: 1}
				}

				
				@media only screen and (max-width: 800px) {
				  .prev, .next
					{
					  font-size: 40px;
					  padding: 30px 20px 30px;
					  margin-top: -65px;
					}

				}
				
				
				@media (max-width:1230px) {
					.slideshow-container img 
					{
						border-radius: 0px;
					}
					
					.slideshow-container {  /* Sur Ecran Small, on forcer les marges des images vers les extremes de l'ecran   */
					margin-left: -5.6%;
					margin-right: -5.6%;
					}
				}
				
				
				/*---- Bloc Standard ---------------------*/
				h5
				{
					margin-top: 22px !important;
					margin-bottom: 3px !important;
				}
				
				h2
				{

					margin-bottom: 10px !important;
				}
				
				
				
				/*---- Bloc Informations Importantes ---------------------*/
				
				
				/*#info-important-bloc-service-1 ul
				{
					list-style: none;
				}
				
				#info-important-bloc-service-1 ul li::before
				{
					  content: "\2022";
						  color: red;
						  font-weight: bold;
						  display: inline-tableblock; 
						  width: 1em;
						  margin-right: 0.3em;
					      margin-left: -0.6em;
						
				}*/
				
				
				/*---- Bloc Questions ------------------------------------*/
				
			
				
				#questions-bloc-service-1 > hr
				{
					margin: 12px 0;
				}
				
				.reponse-box-service
				{
					display: flex;
					align-items: flex-start;  /* sinon center */
					justify-content: flex-start; /* sinon space-around*/
					flex-wrap: wrap;
				}
				
				.reponse-box-service > div
				{
					width: 33%;
					padding: 5px 15px 5px 15px;
					display: flex;  /*Un simple 'display: flex' empeche le texte de passer sous le quote !!!!!!! :) */
				}
				
				.my-service-quote
				{
					font-size: 1.4em; 
					color: green; 
					font-weight: bold;
					margin-top: -7px;
					margin-right: 4px
					
				}
				
				@media (max-width:700px) {
					.reponse-box-service > div
					{
						width: 50%;
						padding: 7px 15px 7px 15px;
					}
				}
				
				@media (max-width:600px) {
					.reponse-box-service > div
					{
						width: 100%;
						padding: 5px 15px 5px 15px;
					}
				}
				
				
				
				/*----- Bloc Contact & Appel ------*/
				
				
			
				#contact-appel-bloc-service-1
				{
					/*padding: 15px 0 15px;*/

					margin-top: 20px;
					text-align: center;
					bottom: 0px;
					position: fixed;
					width: 100%;
					/*left: auto;
					right: auto;*/
					z-index: 100;
					left: 50%;
					transform: translate(-50%, 0);
					
					background-color: white;
					padding-top: 10px;
					padding-bottom: 12px;
					box-shadow: 0px 2px 3px 2px #d9cccc;
					
				}
				
				#contact-appel-bloc-service-1 button
				{
					border-width: 0px;
				}
				
				#contact-us-button-1
				{
					min-width: 80% !important;
					border-radius: 20px !important;
					height: 40px;
					background-color: #ebe5e5;
					box-shadow: 0px 1px 1px 1px rgba(141, 141, 255, .2);
					font-weight: bold;

				}
				
				
				#contact-us-button-1:hover
				{
					background-color: #a48bde;
					color: white;
				}
				
				#call-us-button-1
				{

					height: 70px;
					width: 70px;
					display: inline-block;
					/*padding: 8px 13px 8px 15px;*/
					color: green !important;
					margin-left: 30px;
				}
				
				#call-us-button-1:hover
				{
					/*background-color: #198619;*/
				}
				
				@media (max-width:700px) 
				{
				#contact-us-button-1
					{
						min-width: 60% !important;

					}		
				}
				
				@media (max-width:600px) 
				{
					#contact-appel-bloc-service-1
					{
						padding-bottom: 10px;
					}
				}
				
				
				/*---- Formulaire -------------------------*/
				
					#frm_form_2_container
					{
						margin-top: 60px;
						padding: 20px;
						box-shadow: 0 1px 5px 2px #d0d1f5;
						border-radius: 10px;
						max-width: 800px;
						margin-left: auto;
						margin-right: auto;
						padding-bottom: 5px;
					}	
				
					/*-Cache le nom du service-*/
					#frm_field_9_container
					{
						display: none;
					}
				
					/*-Champ html Recaptcha-*/
					#frm_field_18_container
					{
						margin-bottom: 20px;
						margin-top: -35px;
						font-size: 0.9em
					}
					.grecaptcha-badge { visibility: hidden; }
				
					#frm_form_2_container .frm_button_submit
					{

					   border-radius : 12px !important;
					   font-family: "Neuton", Sans-serif !important;
					   font-size: 1.3em !important;
						font-weight: bold !important;
						box-shadow: 0px 1px 1px 1px #4f6f78 !important;
					   
					}
				
					.form-logos-1
					{
						max-width: 19px;
						margin-bottom: 2px;
						margin-left: 4px;
						margin-right: 4px;
					}
				
					.form-logos-bigger-1
					{
						max-width: 23px;
					}
				
				   .frm_form_field label
					{
						font-family: "Neuton", Sans-serif !important;
						font-size: 1.3em !important;
						color: #4c4755 !important;
					}
				
				
			
				
				
				
				
				@media (max-width:600px) 
				{
				#frm_field_13_container, #frm_field_14_container, #frm_field_15_container, #frm_field_28_container
					{
						 max-width: 50% !important;

					}		
				}
			
				
				
				
				
					
					/*--- Informations pour script ---------------------------------------------------------------*/
				
					#my-form-hide-persons, #my-form-hide-date-1, #my-form-hide-date-2, #my-form-hide-kms, #my-form-title
					{
						display: none;
					}
				
					/* -- Autres global ----*/
					#site-header
					{
						border-color: #e7e0e0 !important;
						box-shadow: 0px 1px 1px 0px #e7e0e0;
					}
				
				
				
			</style>

		<?php 
		
}




function servicePage1Script()
{
	if (isset($_GET['id']))
	{

	    ?>
			<script>
				jQuery(document).ready(function($) {
					
					/*-- Evenement click sur Contact Us ----------------*/
					
					$("#contact-us-button-1").click(function() {
						$("#contact-appel-bloc-service-1").hide('slow', function()
						{
							$('html, body').animate({ scrollTop: $("#frm_form_2_container").offset().top -50}, 200);    // A evenutellement modifier !!!!!!!!!!!!!!!!!!!!!!!!!
						});
						
						    
						
					});


					/*-- Analyse du Form Type, cachage et remplissage de valeur----------------*/
					
					let hidePersons = $("#my-form-hide-persons").text();
					let hideDate1 = $("#my-form-hide-date-1").text();
					let hideDate2 = $("#my-form-hide-date-2").text();
					let hideKms = $("#my-form-hide-kms").text();
					
					if(hidePersons == '1')
					{
					console.log("***** Hide Persons");
					$("#frm_field_15_container").css({"display":"none"});     // !!!!!!!!
					}
					
					if(hideDate1 == '1')
					{
					console.log("***** Hide Date 1");
					$("#frm_field_13_container").css({"display":"none"});   // !!!!!!
					}
					
					if(hideDate2 == '1')
					{
					console.log("***** Hide Date 2");
					$("#frm_field_14_container").css({"display":"none"});    // !!!!!!!
					}
					
					if(hideKms == '1')
					{
					console.log("***** Hide Kms");
					$("#frm_field_28_container").css({"display":"none"});    // !!!!!!!
					}

						
					let formTitle = $("#my-form-title").text();      // !!!!!!!!
					$('#field_zmmvl').val(formTitle);
					
					/*----- Image Slider JS -------------------*/
					
					let slideIndexA = 1;
					showSlidesA(slideIndexA);

					function plusSlidesA(n) {
					  showSlidesA(slideIndexA += n);
					}

					function currentSlideA(n) {
					  showSlidesA(slideIndexA = n);
					}

					function showSlidesA(n) {
					  let i;
					  let slides = document.getElementsByClassName("mySlides");
					  let dots = document.getElementsByClassName("dot");
					  if (n > slides.length) {slideIndexA = 1}    
					  if (n < 1) {slideIndexA = slides.length}
					  for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";  
					  }
					  for (i = 0; i < dots.length; i++) {
						dots[i].className = dots[i].className.replace(" active", "");
					  }
					  slides[slideIndexA-1].style.display = "block";  
					  dots[slideIndexA-1].className += " active";
					}
					
					$("#my-dot-1").click(function() {
						currentSlideA(1);
					});
					
					$("#my-dot-2").click(function() {
						currentSlideA(2);
					});	
					
					$("#my-dot-3").click(function() {
						currentSlideA(3);
					});	
				
					$("#my-previous-btn").click(function() {
						plusSlidesA(-1)
					});	
					
					$("#my-next-btn").click(function() {
						plusSlidesA(1)
					});	
					


				});
			</script>

		<?php 
	}
	
}





 function servicePage1Function() {

 	$res = '
 				<div id="servicePage-1">';
	
	if (isset($_GET['id']) && $_GET['id'] > 0) 
	{
  		$idService = $_GET['id'];
		
		$the_query = new WP_Query(array(
			'p' => $idService,
			'post_type' => array('service'),
		));

		if ($the_query->have_posts()) {

			while($the_query->have_posts()) 
			{
				$the_query->the_post();
				
				$villeDepartement = get_field('ville_departement');
				$adresseComplete = get_field('adresse_complete');
				$adresseGoogleMap = get_field('adresse_google_map');
				$tarifMin = get_field('tarif_min');
				$unitePrix = get_field('unite_prix');
				
				$nbrePersonneMin = get_field('nombre_personne_min');
				$nbrePersonneMax = get_field('nombre_personne_max');
				$isDate = get_field('isDate');
				$isDateFin = get_field('isDateDeFin');
				$isKilometrage = get_field('isKilometrage');
				
				$photoService1 = get_field('photo_service_1');
				$photoService2 = get_field('photo_service_2');
				$photoService3 = get_field('photo_service_3');
				
				$blocInfo = get_field('bloc_info_service');
				$blocInfoImportant = get_field('bloc_info_important_service');
				$blocQuestions = get_field('bloc_questions_service');
				
				$imageGoogle = get_field('image_google_map');
				
				$res .=          '<h2 id="nom-service-1" class="my-standard-bloc">' . get_the_title() . '</h2>';
				
				$res .=          '<div id="place-bloc-service-1" class="my-standard-bloc" style="display: flex; flex-direction: row; align-items: center; flex-wrap: wrap">';
				if($villeDepartement)
				{
					$res .= 			'<div id="city-departement-service-1" style="display: flex; flex-direction: row; align-items: center; flex-wrap: nowrap">' . $villeDepartement . '</div>';
					
						if($adresseGoogleMap)
						{
							$res .=     '<div id="adresse-google-service-1">• &nbsp;<a href="https://www.google.com/maps?q=' . $adresseGoogleMap . '">See on Map</a></div>';
						}
				}
				$res .=          '</div>';
				
				
				$res .=          '<div id="price-person-bloc-service-1" class="my-standard-bloc" style="display: flex; flex-direction: row;  align-items: center; flex-wrap: wrap">' . wp_get_attachment_image(8,'thumbnail');
				if($tarifMin)
				{
					$res .=           '<div id="price-service-1" style="margin-right: 25px;">From ' . $tarifMin . '€';
					
					if($unitePrix)
					{
						$res .=                ' per ' . $unitePrix;
					}
					
					$res .=           '</div>';
				}
				else{
					$res .=           '<div id="price-service-1" style="margin-right: 25px;">Quotation on demand</div>';
				}
				
				if($nbrePersonneMin || $nbrePersonneMax)
				{
					$res .=            '<div id="person-bloc-service-1" style="display: flex; flex-direction: row; align-items: center; flex-wrap: nowrap">' . wp_get_attachment_image(9,'thumbnail') . ' Person(s) :&nbsp;';

					if($nbrePersonneMin)
					{
						$res .=              '<div>From ' . $nbrePersonneMin . '&nbsp;</div>';
					}

					if($nbrePersonneMax)
					{
						$res .=              '<div> to ' . $nbrePersonneMax . '</div>';
					}	

					$res .=            '</div>';
				}
				
				$res.=         '</div>';
				
				
				
				if($photoService1 && $photoService2 && $photoService3)
				{
					$res .=    '<div id="picture-1-bloc-service-1" class="slideshow-container">';
					 $url1 = wp_get_attachment_url($photoService1); 
					 $url2 = wp_get_attachment_url($photoService2);
					 $url3 = wp_get_attachment_url($photoService3); 
					
					 $res .=          '<div class="mySlides fade">
										  <img src="' . $url1 .'" alt="Image 1"  style="width:100%">
										</div>

										<div class="mySlides fade">
										  <img src="' . $url2 .'" alt="Image 2"  style="width:100%">
										</div>

										<div class="mySlides fade">
										  <img src="' . $url3 .'" alt="Image 3" style="width:100%">
										</div>

										<a id="my-previous-btn" class="prev">❮</a>
										<a id="my-next-btn" class="next">❯</a>';
					$res .=    '</div>
								<br>

								<div style="text-align:center; display: none">
								  <span id="my-dot-1" class="dot" ></span> 
								  <span id="my-dot-2" class="dot"></span> 
								  <span id="my-dot-3" class="dot"></span> 
								</div>';
				}
				
				
				
				$res .=      	'<div id="info-bloc-service-1" class="my-standard-bloc">
									  <h2>Informations</h2>';
				if($blocInfo)
				{
				     $res .=          $blocInfo;
				}
				$res .=         '</div>';
				
				
				
				$res .=         '<div id="info-important-bloc-service-1" class="my-standard-bloc">
								    <h2>Important Informations</h2>';
				if($blocInfoImportant)
				{
				      $res .=        $blocInfoImportant; 
				}
				$res .=         '</div>';
				
				
				
				$res .=         '<div id="questions-bloc-service-1" class="my-standard-bloc">
								     <h2>Questions & Responses</h2>';
				if($blocQuestions)
				{
					 $res .=          $blocQuestions; 
				}
				$res .=         '</div>';
				
				
				/*$res .=         '<div id="adresse-complete-bloc-service-1" class="my-standard-bloc">';
				if($adresseComplete)
				{
					 $res .=           $adresseComplete;
				}
				$res .=         '</div>';
				
				
				$res .=         '<div id="image-google-bloc-service-1">';
				if($imageGoogle)
				{
					 $url = wp_get_attachment_url($imageGoogle);  
					 $res .=           $url;
				}
				$res .=          '</div>';*/
				
				
									 
	 
				$res .= 		 '<div id="contact-appel-bloc-service-1">
									 	 <button id="contact-us-button-1">Contact Us</button>
										 <a href="https://wa.me/+33761830251"><div id="call-us-button-1"><img  src="' . wp_get_attachment_url(783) . '" alt="Image phone"/></div></a>
									 	 	
					    		 </div>';
				
				

				
				/*------ 4 Combinaisons de formulaire possible-----------*/

				if(!$nbrePersonneMin && !$nbrePersonneMax) //Combo 1
				{ 
					$res .= '<div id="my-form-hide-persons">1</div>';	
				}
				if (!$isDate) //Combo 2
				{
					$res .= '<div id="my-form-hide-date-1">1</div>';
				}
				
				if (!$isDateFin) //Combo 3
				{
					$res .= '<div id="my-form-hide-date-2">1</div>';
				}
				
				if (!$isKilometrage) //Combo 4
				{
					$res .= '<div id="my-form-hide-kms">1</div>';
				}

				/* --- Nom à pré remplir ------------*/
				$res .= '<div id="my-form-title">' . get_the_title() . '</div>';
					

				
				
			}
		}

	}

	 
 	$res .=	     '</div>';

	wp_reset_postdata();
	return $res;

 }


function servicePage1Init(){
	
	if (isset($_GET['id']))
	{
	
		add_action('wp_head', 'servicePage1Style',1);

		add_action('wp_footer', 'servicePage1Script',8);

		add_shortcode( 'service-page-1', 'servicePage1Function' );
	}

}
add_action('init', 'servicePage1Init');


/** Always end your PHP files with this closing tag */
?>