<?php

/*
Plugin Name:  Simple filter Nouveautés 1
Version: 1.0
Description: Display news about electrical terminals
Author: Denis Kucuk
License: GPLv2 or later
Text Domain: simple-filter-nouveautes-1
*/

/**
 * @return string Text
*/

function charger_cards_nouveautes1() {
	
	 // The $_REQUEST contains all the data sent via AJAX from the Javascript call
	 if ( isset($_REQUEST) ) {
		 
		 $page = $_REQUEST['page'];
		 $orderby = $_REQUEST['orderby'];
		 $order = $_REQUEST['order'];
		 $postperpage = $_REQUEST['postperpage'];
		 $categoryFilter = $_REQUEST['categoryFilter'];   
		 $postTypes = $_REQUEST['postTypes'];
		
		 if ($page && $page > 0 && $page < 1000 && $orderby && $orderby !='' && $order && $order != '' && $categoryFilter && $postTypes && $postperpage && $postperpage > 0 && $postperpage <101) {
			 
			 //On injectera $taxQuery dans $args, puis on injectera $args dans new WP_Query( $args );
			 $taxQuery = array('relation' => 'OR');
			 
			 foreach($categoryFilter as $filter)
			 {
				 array_push($taxQuery, array(
					 						'taxonomy'=>$filter[0], //nom de la taxonomy
					 						'terms'=>$filter[1],   //array de categories enfants, ex :  new Array("card_neuf","card_ancien")
					 						'field'=>'slug',
					 						'include_children'=> true,
				 ));
			 }

			 $args =  array(
				 
							'post_type' => $postTypes,

							'tax_query' =>  $taxQuery,

							'posts_per_page' => $postperpage,
							'paged' => $page,
				 			'order'=>  $order,
							
							);
			 
			 if($orderby != "date" && $orderby != "title")
			 {
				 $args['orderby'] = 'meta_value_num';
				 $args['meta_key'] = $orderby;
			 }

			 if($orderby == "title")
			 {
			 	$args['orderby'] = 'title';
			 }
		  
			 $the_query = new WP_Query( $args );

		    if ( $the_query->have_posts() ) {
		
	  			$res = '';

	    		while($the_query->have_posts()) {
					$the_query->the_post();
					$res .= '<div class="card">'; 

					$tarifMin = get_field('tarif_min');
					$unitePrix = get_field('unite_prix');
					$nbrePersonneMin = get_field('nombre_personne_min');
				    $nbrePersonneMax = get_field('nombre_personne_max');
				    $villeDepartement = get_field('ville_departement');	
					$photoService1 = get_field('photo_service_1');
					$postLink = get_post_permalink(get_the_id());
					
					if($photoService1)
					{
							$res .= '<div class="image-card-1"><a href="' . get_home_url() .  '/service-premium?id=' . get_the_id() .  '"><img src="' . wp_get_attachment_url($photoService1)  . '" alt ="Picture of service"></a></div>';
					}
					
					$res .=         '<h4 id="card-title-1" class="standard-card-bloc">' . get_the_title() . '</h4>';

					if($villeDepartement)
				    {
						$res .= 	 '<div id="city-departement-bloc-card-1" class="standard-card-bloc" style="display: flex; flex-direction: row; align-items: center; flex-wrap: nowrap">' . $villeDepartement . '</div>';
					}

					$res .=           '<div id="price-person-bloc-card-1" class="standard-card-bloc" style="display: flex; flex-direction: row;  align-items: center; flex-wrap: wrap; margin-bottom: 25px">' . wp_get_attachment_image(8,'thumbnail');

					if($tarifMin)
					{
						$res .=                '<div id="price-card-1" style="margin-right: 25px;">From ' . $tarifMin . '€';
												
						if($unitePrix)
						{
							$res .=                ' per ' . $unitePrix;
						}
						
						$res .=                '</div>';
					}
					else{
						$res .=                '<div id="price-card-1" style="margin-right: 25px;">Quotation on demand</div>';
					}
					
					if($nbrePersonneMin || $nbrePersonneMax)
					{
						$res .=                '<div id="person-bloc-card-1" style="display: flex; flex-direction: row; align-items: center; flex-wrap: nowrap">' . wp_get_attachment_image(9,'thumbnail') . ' Person(s) :&nbsp;';

						if($nbrePersonneMin)
						{
							$res .=                  '<div>From ' . $nbrePersonneMin . '&nbsp;</div>';
						}

						if($nbrePersonneMax)
						{
							$res .=                   '<div> to ' . $nbrePersonneMax . '</div>';
						}	

						$res .=                 '</div>';
					}


					$res.=             '</div>';
					
					$res.=             '<a class="see-details-card-link" href="' . get_home_url() .  '/service-premium?id=' . get_the_id() .  '"><div class="see-details-card" style="padding: 5px; width: 90%; max-width: 400px; border: 1px solid #ae9828; margin-left: auto; margin-right: auto; margin-bottom: 18px; text-align: center; border-radius: 10px; color: #ae9828; font-weight: bold">See Details</div></a>';
					
					
					$res .= '</div>';
	             }

				wp_reset_postdata();

     		}

			 echo $res;
		 }


	 }
	 // Always die in functions echoing AJAX content
	 die();
}


function compter_cards_nouveautes1() {
	
	 
	 if ( isset($_REQUEST)  ) {
		 
		 $categoryFilter = $_REQUEST['categoryFilter']; 
		 $postTypes = $_REQUEST['postTypes'];
		
		 if ($categoryFilter &&  $postTypes) {
		 
			 //J'enrichis l'argument $taxQuery suivant la valeur de $categoryFilter (définis en JS)
			 $taxQuery = array('relation' => 'OR');
			 
			 foreach($categoryFilter as $filter)
			 {
				 array_push($taxQuery, array(
					 						'taxonomy'=>$filter[0],
					 						'terms'=>$filter[1],
					 						'field'=>'slug',
					 						'include_children'=> true,
				 ));
			 }

				$the_query = new WP_Query( array(
					
				'post_type' => $postTypes,

				'tax_query' =>  $taxQuery,

				//Interdit pour le count : 'paged', 'posts_per_page', ('order') !!!!!!!!!!
					
				) );

				if ( $the_query->have_posts() )
				{
					$res = $the_query->found_posts;
				}

				wp_reset_postdata();
				echo $res;
     		

		 }

	 }
	 // Always die in functions echoing AJAX content
	 die();
}


function add_afficher_plus_script()
{
	    ?>
			<script>
				jQuery(document).ready(function($) {
				 
				var homeurl = <?php echo "'" . get_home_url() . "'" ?>;
				var currentUrl = 	<?php global $wp; echo "'" . home_url( add_query_arg( array(), $wp->request ) ) . "'" ?>; 
				
				/*if(window.location.href.includes(homeurl + '/'))*/
				 /*if(window.location.href == homeurl + '/')*/
				
				if(homeurl == currentUrl)  //Cette condition est à mettre en doublon dans le Init
				{
					console.log("****** *** *****");
					console.log(homeurl);
					console.log(currentUrl);
					
				var ajaxurl = <?php echo "'" .admin_url('admin-ajax.php') . "'" ?>;

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

					
				const postPerPageConst = 10;
				var totalInBase = -1;	
				var page = 1;


				var actualPage = getCookie('actual-page');
				var actualOrderBy = getCookie('actual-order-by');
			    var actualOrder = getCookie('actual-order');
					
				if(actualPage != null && actualOrderBy != null && actualOrder != null)
					{
					var orderby = actualOrderBy;
				 	var order = actualOrder;
					var postperpage = postPerPageConst*parseInt(actualPage);
					}
					
				else
					{
					var orderby = "date";
				 	var order = "desc";
				    var postperpage = postPerPageConst;	
					}
				 
				$('#dropdown-filter-1 select option[value=' + orderby + '-' + order + '] ').prop('selected', true);
				 
				 var postTypesTemp = $("#post-types-1").text().split("~");
				 var postTypes = new Array();
				 postTypesTemp.forEach(el => postTypes.push(el));
				 				 
				 var categoryFilter = new Array();
					
				 const urlParams = new URLSearchParams(window.location.search);
					
					
				if(urlParams.has('category'))
				{
					categoryFilter.push(new Array('category', new Array(urlParams.get('category'))));  // Modifier le premier paramètre
					
					//scroller au titre de filter-plugin
				}
				else
				{   var categories = $("#taxonomy-terms-1").text().split("~");
				    categories.forEach(el => {
				 		categoryFilter.push(eval(el));
				 	});
				}

				  	
					//------------- Evenement 'Afficher Plus'
					$( "#afficher-plus-2" ).click(function() {
						$("#spinnerbox").css({"display":"block"});
						$.ajax({
							 url: ajaxurl, 
							 data: {
							 'action':'charger_cards_nouveautes1',    //correspond au suffixe de 'wp_ajax_charger_cards_nouveautes1'   =>  add_action( 'wp_ajax_charger_cards_nouveautes1', 'ajax_charger_cards_nouveautes1' );
							 'page' : page, 
							 'postperpage' : postperpage,
							 'orderby' : orderby,
							 'order' : order,
							 'postTypes' : postTypes,
							 'categoryFilter' : categoryFilter
							 },
							 success:function(data) {
							 console.log("********** Charger Réussi");
							 $("#spinnerbox").css({"display":"none"});
							 $("#row-nouveautes1-infinite").append(data);
								 
							$('#row-nouveautes1-infinite .card').off('click');
							 
							 if(actualPage != null)
								{
									page = parseInt(actualPage) + 1;
									actualPage = null;
									postperpage = postPerPageConst;
								}
							else
								{
									page = page + 1;
								}
								 
								 
							$( ".image-card-1 img, .see-details-card " ).click(function() {


								var date = new Date();
								date.setTime(date.getTime() + (30*60*1000));
								document.cookie = "actual-page=" + (page-1)  + ";expires=" + date.toUTCString() + "; path=/";
								document.cookie = "actual-order-by=" + orderby  + ";expires=" + date.toUTCString() + "; path=/";
								document.cookie = "actual-order=" + order  + ";expires=" + date.toUTCString() + "; path=/";

							});
								 
							postperpage = postPerPageConst;
				
							 

								 if($("#row-nouveautes1-infinite .card").length < totalInBase)
									 {
										
									 }
								 else
									 {
										 $("#afficher-plus-2").css({"display":"none"});
									 }
								 
							 },
							 error: function(errorThrown){

							 }
						 });
					 });
					
					
					//-------------------Evenement trier
					$( "#dropdown-filter-1 select" ).change(function() {
						
						var vals = $(this).val();
						var fields = vals.split('-');
						var newOrderby = fields[0];
						var newOrder = fields[1];
						
						if(newOrderby != orderby || newOrder != order)
						{
						orderby = newOrderby;
					    order = newOrder;
						page = 1;
						
						$("#row-nouveautes1-infinite").empty();
						$("#afficher-plus-2").css({"display":"block"});
						$( "#afficher-plus-2" ).click();

						
						 }
					 });
					
					
					 // ---------- Compte 
					 $.ajax({
						 url: ajaxurl, // Since WP 2.8 ajaxurl is always defined and points to adminajax.php
						 data: {
						 'action':'compter_cards_nouveautes1',
						'categoryFilter' : categoryFilter,
						'postTypes' : postTypes,
						 },
						 success:function(data) {
						 console.log("********** Comptage Réussi");
						 totalInBase = parseInt(data);
						$( "#afficher-plus-2" ).click();  //simule un click après le comptage
						 }, 
						 error: function(errorThrown){

						 }
					 });

				 
					 /* Important : Nous détruisons les cookies */
					document.cookie = 'actual-page=; Max-Age=-99999999;'; 
					document.cookie = 'actual-order-by=; Max-Age=-99999999;'; 
					document.cookie = 'actual-order=; Max-Age=-99999999;'; 
 
				 

				}
					

				});
			</script>

		<?php 
}


function style_nouveautes1()
{
	    ?>
			<style>

				
				 #cards-and-filter-1
				{
					margin-top: -10px;
					max-width: 1140px;
					margin-left: auto;
					margin-right: auto;
				}
				
				#container-nouveautes1-infinite
				{
					margin-top: 10px;
				}

				.container-denis-1 .row {
				  display: flex;
					align-items: center;
					justify-content: flex-start; /* sinon space-around */
					flex-wrap: wrap;
					align-items: center;

				}


				.container-denis-1 .card
				{

					display: flex;
					box-shadow: 0 0 5px grey;
					flex-direction: column;
					align-items: left;
					margin: 10px 0px 25px;
					padding: 0px 0px 10 0px;
					align-self: normal;
					border-radius: 9px;
					max-width: calc(50% - 30px);
					margin-left: 15px;
					margin-right: 15px;
					
					
					animation: 2s fadeIn;
				 	animation-fill-mode: forwards;
					
					
				}


				#card-title-1
				{
					margin-top: 0px;
				}
				
				.standard-card-bloc
				{
					padding: 5px 12px 5px 12px;
					margin-bottom: 0px;
				}
				
				.image-card-1 img
				{
					border-radius: 9px 9px 0px 0px !important;
					margin-top: -1px !important;
				}
				
				
				#price-person-bloc-card-1 img
				{
					max-width: 20px;
					margin-right: 4px;
				}

				.container-denis-1 img:hover
				{
					/*opacity: 0.8;*/
				}
				
				#city-departement-bloc-card-1
				{
					margin-top: -12px
				}
				
				.see-details-card-link:active, .see-details-card-link:focus,  .see-details-card-link:hover, .see-details-card-link:visited, .see-details-card:active, .see-details-card:focus
				{
					border: 0px black solid !important;
				}
				
				.see-details-card-link
				{
					margin-top: auto;
				}

				.see-details-card:hover
				{
					background-color: #ae9828;
					color: white !important;
					cursor: pointer;
				}


				.container-denis-1 a
				{
					display: inline-block;
					margin-bottom: 10px;
		
				}
				

				.afficher-plus
				{
					text-align: center;
					margin-top: 25px;

				}

				.afficher-plus span
				{
					border: 2px solid;
					padding: 8px 30px 8px 30px;
					border-radius: 15px;
					font-weight: bold;
					
					animation: 2s fadeIn;
				 	animation-fill-mode: forwards;
				}

				.afficher-plus span:hover
				{
					cursor: pointer;
					background-color: rgba(200,200,100,0.3);
				}



				@media (max-width:900px) 
				{ 
					.container-denis-1 .card
					{
						max-width: calc(100% - 10px);
						margin-top: 10px;
						margin-left: auto;
						margin-right: auto;
						margin-bottom: 15px;
					}
					
				}
				
				@media (min-width:850px)   /* Attention ici min !!!!!!!!!!!!!!!!!!!! */
				{
					.container-denis-1 .card
					{
						transition: transform 0.5s;
					}
					
					.container-denis-1 .card:hover
					{
						-ms-transform: scale(1.02);
						-webkit-transform: scale(1.02);
						transform: scale(1.02);
					}
				}


				/*---- Filter------------------------------------------------------*/


				#dropdown-filter-1
				{
					text-align: right;

				}

				#dropdown-filter-1 .select
				{

					padding: 8px 5px 8px 10px !important;
					color: black;
					border: 2px solid #dddddd;
					cursor: pointer;
					border-radius: 8px;
					height: 42px;
					width: auto !important;
					margin-right: 90px;	
					font-weight: bold;
					
					/*Replace default style (arrow)*/

				}


				#dropdown-filter-1 .select:hover 
				{
					outline: none;
					color: rgba(0,0,0,0.7);
				}


				@media (max-width:900px) { 

					#dropdown-filter-1 .select
					{	
						margin-right: 9px;	
					}

					
				}

				#filter-plugin-datas
				{
					font-size: 0.1em;
					opacity: 0;
				}


			</style>

		<?php 
}


function requetesCustom_nouveautes1_FunctionShortCode($attr) {

  $args = shortcode_atts( array(
 
 'options1' => 'date*desc*Les nouveautés~title*asc*Alphabétique',
 'options2' => 'service',
 'options3' => "new Array('category', new Array('car-rental','meuble_recent'))~new Array('taxonomy_X', new Array('category1','category2'))"

  ), $attr );

  $options = explode('~', $args['options1']);
  $postTypes = $args['options2'];
	
  $taxos = $args['options3'];

 	$res = '<div id="cards-and-filter-1">

 			<div id="dropdown-filter-1">
 				<select class="select">';

 				foreach ($options as $key=>$opt) {
 						$elts = explode('*', $opt);
 						$orderBy = $elts[0];
 						$order = $elts[1]; 
 						$txt = $elts[2];

 						if($key==0)
 							$res .= '<option value="' . $orderBy . '-' . $order . '" class="options-1" selected>' . $txt . '</option>';
 						else
 							$res .= '<option value="' . $orderBy . '-' . $order . '" class="options-1">' . $txt . '</option>';
 				}			

					
 	$res .=     '</select>
 			</div>


 	       <div id="container-nouveautes1-infinite" class="container-denis-1">
 	       		<div class="row" id="row-nouveautes1-infinite">
 	       		</div>
 	       	</div>

		   <p id="spinnerbox" style="text-align: center; margin: 30px; margin-bottom: 60px; display: none"><img style="width: 40px;" src="' . wp_get_attachment_url(401) . '" alt="spinner"/></p>

 	       <div id="afficher-plus-2" class="afficher-plus"><span>Load More</span></div>

 	       <div id="filter-plugin-datas">
 	       		<span id="post-types-1">' . $postTypes . ' </span><br>
 	       		<span id="taxonomy-terms-1">' . $taxos . ' </span><br>
 	       </div>

	    </div>';

	return $res;
 }




/*----**/

function requetesCustom_nouveautes1(){
	
	global $wp;
	$current_url = home_url( add_query_arg( array(), $wp->request ) ); //url
	//$current_slug = add_query_arg( array(), $wp->request );

	if ($current_url == get_home_url())  //Cette condition est à mettre en doublon dans le script
	{
		add_action( 'wp_ajax_compter_cards_nouveautes1', 'compter_cards_nouveautes1' );
		add_action( 'wp_ajax_nopriv_compter_cards_nouveautes1', 'compter_cards_nouveautes1' );  //partie publique
		add_action( 'wp_ajax_charger_cards_nouveautes1', 'charger_cards_nouveautes1' );
		add_action( 'wp_ajax_nopriv_charger_cards_nouveautes1', 'charger_cards_nouveautes1' );  //partie publique

		add_action('wp_head', 'style_nouveautes1',1);
		add_action('wp_footer', 'add_afficher_plus_script',3);

		add_shortcode( 'requete_custom_nouveautes1_NomShortCode', 'requetesCustom_nouveautes1_FunctionShortCode' );
	
	}
}


add_action('init', 'requetesCustom_nouveautes1');











/** Always end your PHP files with this closing tag */
?>