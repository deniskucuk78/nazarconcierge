<?php

/*
Plugin Name:  Utils1
Version: 1.0
Description: Click on Cookie Consent
Author: Denis Kucuk
License: GPLv2 or later
Text Domain: utils1
*/

/**
 * @return string Text
*/



function add_utils1()
{
	    ?>
			<script>
				jQuery(document).ready(function($) {


				});
			</script>

			
			<script>
			//COOKIES
				
				
			jQuery(document).ready(function($) {
				
			
				/*---------Affiche la barre de cookie au clique sur 'Gestion des Cookies' -------------------------------*/
				
				$( "#gestion-cookies-1" ).click(function() {

					event.preventDefault();
					$( "#cookie-law-info-again" ).click();

				});
				
				
				/*---------------------Forcing de l'application des cookies----------------------------------------------*/

				function getCookie(cookieLaw) {
					var cookieArr = document.cookie.split(";");
					for(var i = 0; i < cookieArr.length; i++) {
						var cookiePair = cookieArr[i].split("=");
						if(cookieLaw == cookiePair[0].trim()) {
							return decodeURIComponent(cookiePair[1]);
						}
					}
					return null;
				}


				//A chaque clique manuel vers un consentement, on enregistre l'expiration dans un cookie nommé 'consentExpiration' 
				//Il servira a conserver la date lorsque dans la suite du code on force/simule le clique de consentement.. 
				//cette manoeuvre entraine en effet un retardement de la date d'expiration de manière artificielle

				var consentExp = getCookie('consentExpiration');

				//Si le cookie n'existe pas, on le crée
				if(consentExp == null)
				{
					
					$( "#cookie_action_close_header_reject, #wt-cli-accept-all-btn, #wt-cli-privacy-save-btn  " ).click(function() {

						var CookieDate = new Date;
						CookieDate.setFullYear(CookieDate.getFullYear() +1);
						document.cookie = 'consentExpiration=' + CookieDate.toUTCString() + '; expires=' + CookieDate.toUTCString() + ';'

					});
				}



				//Ce code permet de : 1) soit forcer l'application des préférences s'ils ont déja été fixés,
				// 2) Soit de forcer la suppression de certains cookie si le consentement n'a pas été fait

				var viewedCookiePolicy = getCookie("viewed_cookie_policy");

				if(viewedCookiePolicy != null)
				{
					// 1) on force l'application des préférences
					$( "#wt-cli-privacy-save-btn" ).click();
					console.log("***** forcing effectué");

					//On remet la date d'expiration initiale de 'viewed_cookie_policy' et 'CookieLawInfoConsent' 
					//(en se basant sur la valeur de 'consentExpiration')
					var consent = getCookie("consentExpiration");

					if(consent != null)
					{
						console.log(consent);
						document.cookie = 'viewed_cookie_policy=' + viewedCookiePolicy + '; expires=' + consent + ';'

						var cookieLawInfoConsent = getCookie("CookieLawInfoConsent");

						if(cookieLawInfoConsent != null)
						{
							document.cookie = 'CookieLawInfoConsent=' + cookieLawInfoConsent + '; expires=' + consent + ';'
						}
					}

				}
				else
				{
					// 2)suppression de certains cookie si le consentement n'a pas été fait
					
					/*setTimeout(function() {},5000);*/
							   
							document.cookie = 'CONSENT=; Max-Age=-99999999;'; 

							document.cookie = 'SOCS=; Max-Age=-99999999;'; 

							document.cookie = 'SAPISID=; Max-Age=-99999999;'; 

							document.cookie = 'APISID=; Max-Age=-99999999;'; 

							document.cookie = '__Secure-ENID=; Max-Age=-99999999;'; 


							document.cookie = '__Secure-3PSIDCC=; Max-Age=-99999999;'; 

							document.cookie = '__Secure-1PSIDCC=; Max-Age=-99999999;'; 

							document.cookie = 'SIDCC=; Max-Age=-99999999;'; 

							document.cookie = '_Secure-3PAPISID=; Max-Age=-99999999;'; 

							document.cookie = '__Secure-3PSID=; Max-Age=-99999999;'; 


							document.cookie = '__Secure-1PAPISID=; Max-Age=-99999999;'; 

							document.cookie = '__Secure-1PSID=; Max-Age=-99999999;'; 

							document.cookie = 'AEC=; Max-Age=-99999999;'; 

							document.cookie = 'DV=; Max-Age=-99999999;'; 

							document.cookie = 'SID=; Max-Age=-99999999;'; 


							document.cookie = 'SSID=; Max-Age=-99999999;'; 

							document.cookie = 'HSID=; Max-Age=-99999999;'; 

							document.cookie = 'NID=; Max-Age=-99999999;'; 

							document.cookie = 'OTZ=; Max-Age=-99999999;'; 

							document.cookie = 'SEARCH_SAMESITE=; Max-Age=-99999999;'; 
	
				}
				console.log("************************ JS de utils terminé")
				//$( "#wt-cli-privacy-save-btn" ).click();
				});
			</script>
		<?php 
}


function requetesCustom_init_utils(){
  add_action('wp_footer', 'add_utils1',10000);
}
add_action('init', 'requetesCustom_init_utils');



/*-------------------------------Schedule the delete of Form Items-------------------------------------------*/

//Custom Time Interval 'ten_seconds'
add_filter('cron_schedules', 'moose_add_cron_interval');
function moose_add_cron_interval($schedules)
{
	$schedules['ten_seconds'] = array(
		'interval' => 10,
		'display' => esc_html__('Every Ten Seconds'),
	);
	return $schedules;
}


add_action('moose_cron_hook', 'moose_cron_delete');

function moose_cron_delete()
{

	 global $wpdb; 
 
    $wpdb->query( 
        $wpdb->prepare( 
            "DELETE FROM {$wpdb->prefix}frm_items WHERE DATEDIFF(NOW(),created_at) > %d", 90 
        )
    );
	
$wpdb->query( 
        $wpdb->prepare( 
            "DELETE FROM {$wpdb->prefix}frm_item_metas WHERE DATEDIFF(NOW(),created_at) > %d", 90 
        )
    );
	
}

if(! wp_next_scheduled('moose_cron_hook'))
{
	wp_schedule_event( time(), 'daily' , 'moose_cron_hook' );
}


/** Always end your PHP files with this closing tag */
?>