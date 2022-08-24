<?php

/*
Plugin Name:  Search Bar 1
Version: 1.0
Description: Display Search Bar Category
Author: Denis Kucuk
License: GPLv2 or later
Text Domain: search-bar-1
*/

/**
 * [current_year] returns a text
 * @return string Text
*/

function searchBarStyle()
{
	    ?>
			<style>
				
				#searchBar-1
				{
					display: flex;
					flex-direction: row;
					max-width: 350px;
					box-shadow: 0 2px 8px rgba(0,0,0,0.3);
					border-radius: 30px;
					margin-left: auto;
					margin-right: auto;
				}
				
				#searchBar-1 button
				{
					color: white;
					width: 100%;
					height: 50px !important;
					border-radius: 0px 30px 30px 0px;
					font-weight: bold;
					background-color:  #25282a; /*#2c3033;*/
					text-transform: unset !important;
					letter-spacing: 0.7px;
				}
								
				#searchBar-1 button:hover
				{
					color: #d8dadc !important;
				}
				
				
				#bloc-searchBar-1
				{
					display: flex;
					flex-direction: row;
					align-items: center;
				}
				
				#bloc-searchBar-1:hover
				{
					color: grey;
				}
				
				#bloc-searchBar-1 img
				{
					 display: inline-block;
					width: 20px !important;
					margin-left: 13px;
					margin-right: 10px
				}
				
				#searchBarinput-1
				{
					height: 50px !important;
					width: 218px !important;
					border: 0px !important;
					padding: 14px 1px 12px 5px;
					color: rgba(0,0,0,0.5);
				}
				
				@media (max-width:402px) 
				{
					#searchBarinput-1
					{
						width: 200px !important;
					}
				}
				
				@media (max-width:382px) 
				{
					#searchBarinput-1
					{
						width: 185px !important;
					}
				}
				



				#suggestion-close-btn
				{
					font-size: 1.5em;
					color: grey;
					text-align: center;
					width: 30px;
				}
				
				#bloc-searchBar-1:hover
				{
					
				}
				
				#suggestion-close-btn:hover
				{
					cursor: pointer;
				}
				
				#suggestion-box
				{
					display:none;
					
						position: fixed;
						top: 20%;
						z-index:1000;
						padding:20px;
						border-radius: 10px;
						box-shadow: 0 3px 9px rgba(0,0,0,0.4);

						width: 100%;
						max-width: 450px;
						background-color:white;
						left: 50%;
						transform: translateX(-50%);
				}
				
				#suggestion-box-title
				{
					font-weight: bold;
					font-size: 1.5em;
				}
				
				#searchBar-suggestion-list
				{
					overflow:scroll;
					max-height: 300px;
					overflow-x: hidden;
					overflow-y: scroll;
				}
				
				.searchBox-items{
					margin-bottom: 9px;
				}
				
				.searchBox-items hr{
					margin-top: 9px !important;
				}
				
				#searchBox-category-name
				{
					font-size: 1.2em;
					margin-left: 10px;
				}
				
				.searchBox-items img
				{
					width: 35px !important;
				}
				
			</style>

		<?php 
}




function searchBarScript()
{
	    ?>
			<script>

			<?php
				if (!isset($_GET['id']))  //Condition à mettre en doublon dans le init
				{
			?>

				jQuery(document).ready(function($) {
					
					let list1 = document.getElementById("searchBar-suggestion-list");

					$("#suggestion-close-btn").click(function() {
						$("#suggestion-box").css({"display":"none"});
						
					});
					
					$("#bloc-searchBar-1").click(function() {
						$("#suggestion-box").css({"display":"block"});
						list1.scroll({
						  top: 20,
							behavior: 'smooth'
						});
						
					});
					
					$(".searchBox-items-link").on('click', function(event){
						document.cookie = 'actual-page=; Max-Age=-99999999;'; 

						document.cookie = 'actual-order-by=; Max-Age=-99999999;'; 
					
						document.cookie = 'actual-order=; Max-Age=-99999999;'; 
						
						console.log('cookie suppriméééééééé');
						
					});
				
				const urlParams = new URLSearchParams(window.location.search);	
					
				if(urlParams.has('categoryName'))
				{
					$catName = urlParams.get('categoryName').substring(0,25) + '...';
					
					$("#searchBarinput-1").text($catName);
					$('html, body').animate({ scrollTop: $("#searchBar-1").offset().top -50}, 200);

				}

				});

				<?php
				}
				?>

			</script>

		<?php 
}





 function searchBar1Function() {

 	$res = '
 				<div id="searchBar-1">
 					<div id="bloc-searchBar-1">
 							<img src="' . wp_get_attachment_url(252) . '" alt="loupe"/>
 							<div id="searchBarinput-1">Which Services ?</div>
 					</div>
 					<button type="submit">Search</button>
 				</div>
 		   ';

     
    $categories = get_categories( array(   //voir mes codes 'requetes-custom.php' dont la méthode get_terms(...)  pour récuperer les catégorie selon la taxonomie !!!!!!!!!!!!!!!!!!!
    'orderby' => 'meta_value_num',
     'meta_key' => 'ordre',
    'order'   => 'ASC'
	) );

	$nbrItems = count($categories);

	$res .= '	<br>
				<div id="suggestion-box">
					<div style="display: flex; flex-direction: row; align-items: center; justify-content: space-between">
						<div id="suggestion-box-title" >Our ' . $nbrItems . ' services :</div>
						<div id="suggestion-close-btn">X</div>
					</div>
					<br/>
					<div id="searchBar-suggestion-list">
						<div class="searchBox-items" style="background-color: white; height: 20px;"></div>';  //Ne pas toucher cette balise de comblement !!!!!!
    
	
	$i = 0;
    foreach( $categories as $category ) 
    {
		$res .= 		'<a class="searchBox-items-link" href="' . get_home_url() . '?category=' . $category->slug . '&categoryName=' . $category->name . '"><div class="searchBox-items">';   


			$imageId = get_field('logo_categorie_1', $category);

			if($imageId)
			{
				 		$imageId = (int) $imageId;
						$img = wp_get_attachment_image($imageId,'thumbnail');
						$res .= $img . '&nbsp;&nbsp;<span id="searchBox-category-name">' . $category->name . '</span>';	
			}
			else
				$res .=		 '<span id="searchBox-category-name" style="margin-left: 35px">' .  $category->name . '</span>';

			$res .=  		'';

			if(++$i != $nbrItems) {
				$res .=  	'<hr>';
			}

			$res .=  '</div></a>';
	} 

	$res .= 	  '		
					</div>
			 <div>';

	wp_reset_postdata();
	return $res;

 }


function searchBar1Init(){
	
	if (!isset($_GET['id']))  //Condition à mettre en doublon dans le script
	{
		add_action('wp_head', 'searchBarStyle',1);

		add_action('wp_footer', 'searchBarScript',8);

		add_shortcode( 'search-bar-1', 'searchBar1Function' );
	}
}
add_action('init', 'searchBar1Init');


/** Always end your PHP files with this closing tag */
?>