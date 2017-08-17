<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package PWP_Simplicity
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="front-page site-main">

		<section class="section-harnessing-power" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/img/harnessigng-power-bg.png' ); ?>);">

			<h2 class="color-white">harnessing the power of peat</h2>
			<div class="rugged-bar rugged-bar-white"></div>

			<p>Rich, complex and notoriously smoky, Laphroaig® is a single malt not to be taken lightly. But for the brave who undertake the venture, there are endless peaty rewards for the taking.</p>
 			<p>When seeking smoke and bolder flavours, Laphroaig® 10 Year Old and Select offer two unique ways way to impart these traits. Come explore their diverse palates and start crafting cocktails as unique as the Scotch itself.</p>
		</section>

		<section class="section-explore-expressions" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/img/barley-bg.png' ); ?>);">

			<div class="section-explore-expressions-header">
				<h2 class="color-white">explore the expressions</h2>
				<div class="rugged-bar rugged-bar-green"></div>

				<p>Creating the perfect Laphroaig® cocktail begins with choosing the right Laphroaig® for the job.</p>
			</div>

			<div class="pwp-inline not-responsive flush-columns section-explore-expressions-bottle">
				<div class="col2 pwp-vertical-align-middle">
					<img src="<?php echo esc_url( get_template_directory_uri().'/img/Bottle.png' ); ?>">
				</div>
				<div class="col2 pwp-vertical-align-middle section-explore-expressions-bottle-text">
					<h3>Laphroaig®<br>10 year old</h3>
					<p>The benchmark Islay malt, 10 Year Old has a nose and taste that deliver a unique measure of Islay peat smoke, tangy, salt-laden air and an echo of sweetness at the end.</p>
				</div>
			</div>

			<div class="pwp-align-center">
				<p>The deep peatiness will stand out in bold, peat-forward cocktails or impart a subtle smoke via float, rinse or atomizer.</p>
			</div>

			<div class="section-explore-expressions-tasting-notes">
				<div class="section-explore-expressions-tasting-notes-header">
					<h3>tasting notes</h3>
					<div class="rugged-bar rugged-bar-green"></div>

					<div class="pwp-inline">
						<div class="col2 pwp-vertical-align-top">
							<h5>NOSE</h5>
							<p>Huge smoke, seaweedy and “medicinal” with a hint of sweetness</p>

							<h5>BODY</h5>
							<p>Full</p>
						</div>

						<div class="col2 pwp-vertical-align-top">
						<h5>PALATE</h5>
						<p>Surprising sweetness with a hint of saltand layers of peatiness</p>

						<h5>FINISH</h5>
						<p>Long and lingering</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section-select" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/img/barley-bg.png' ); ?>);">

			<div class="pwp-inline not-responsive flush-columns section-select-bottle">
				<div class="col2 pwp-vertical-align-middle section-select-bottle-text">
					<h3>Laphroaig<sup>®</sup> Select</h3>
					Matured in five different barrel types, the signature Laphroaig smokiness is complimented by a gentle sweetness, creating a whisky that is artfully peated, approachable and perfectly balanced.

				</div>
				<div class="col2 pwp-vertical-align-middle">
					<img src="<?php echo esc_url( get_template_directory_uri().'/img/Select.png' ); ?>">
				</div>
			</div>

			<div class="pwp-align-center">
				<p>Create smoky cocktails using Laphroaig® Select as a base to add peat without overpowering other flavors.</p>
			</div>

			<div class="section-select-tasting-notes">
				<div class="section-explore-expressions-tasting-notes-header">
					<h3>tasting notes</h3>
					<div class="rugged-bar rugged-bar-green"></div>

					<div class="pwp-inline">
						<div class="col2 pwp-vertical-align-top">
							<h5>NOSE</h5>
							<p>Peat first, then ripe red fruits with a hint of dryness</p>

							<h5>BODY</h5>
							<p>Full</p>
						</div>

						<div class="col2 pwp-vertical-align-top">
							<h5>PALATE</h5>
							<p>Sweet up front then classic dry, peaty, ashy flavours followed by a rich finish</p>

							<h5>FINISH</h5>
							<p>Long lingering and floral, with marzipan and limes at the end</p>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="section-making-laphroaig" style="background-image: url(<?php echo esc_url( get_template_directory_uri().'/img/harnessigng-power-bg.png' ); ?>);">

			<div class="section-making-laphroaig-header pwp-align-center">
				<h2>the making of laphroaig<sup>®</sup></h2>
				<div class="rugged-bar rugged-bar-white"></div>

				<br>
				<p>For over 200 years, Laphroaig<sup>®</sup> has distilled their notably divisive whisky on the southern coast of Islay.<br>Let’s open a bottle and see exactly what’s inside.</p>
			</div>

			<div class="section-making-laphroaig-ingredients" >
				<div class="section-making-laphroaig-ingredients-water section-making-laphroaig-ingredients-i span8 pwp-float-right">
					<div class="pwp-inline">
						<div class="section-making-laphroaig-ingredients-icon col2 pwp-vertical-align-middle pwp-align-center">
							<img src="<?php echo esc_url( get_template_directory_uri().'/img/ingredients/water.png' ); ?>" class="pwp-inline-block">
						</div>
						<div class="section-making-laphroaig-ingredients-text col2 pwp-vertical-align-middle">
							<h3>Water</h3>
							<p class="medium">Soft, peated water sourced exclusively from Loch Kilbride. About 15% of Laphroaig’s® flavor comes from this water.</p>
						</div>
					</div>
				</div>
				<div class="section-making-laphroaig-ingredients-peat section-making-laphroaig-ingredients-i span8 pwp-float-left pwp-align-right">
					<div class="pwp-inline">
						<div class="section-making-laphroaig-ingredients-text col2 pwp-vertical-align-middle">
							<h3>Peat</h3>
							<p class="medium">A mix of heather, lichen and a higher moss ratio. Laphroaig® is one of few Scottish distilleries to hand-cut its own peat to retain more moisture, creating a slower burn for a more intense peat smoke on the malt.</p>
						</div>
						<div class="section-making-laphroaig-ingredients-icon col2 pwp-vertical-align-middle pwp-align-center">
							<img src="<?php echo esc_url( get_template_directory_uri().'/img/ingredients/peat.png' ); ?>" class="pwp-inline-block">
						</div>
					</div>
				</div>
				<div class="section-making-laphroaig-ingredients-barley section-making-laphroaig-ingredients-i span8 pwp-float-right">
					<div class="pwp-inline">
						<div class="section-making-laphroaig-ingredients-icon col2 pwp-vertical-align-middle pwp-align-center">
							<img src="<?php echo esc_url( get_template_directory_uri().'/img/ingredients/barley.png' ); ?>" class="pwp-inline-block">
						</div>
						<div class="section-making-laphroaig-ingredients-text col2 pwp-vertical-align-middle">
							<h3>malted Barley</h3>
							<p class="medium">One of the few remaining Scottish distilleries to malt its own barley, maltings are kiln dried at industry low temperatures, resulting in a higher phenol spec of 40 to 60 ppm.</p>
						</div>
					</div>
				</div>
				<div class="section-making-laphroaig-ingredients-still section-making-laphroaig-ingredients-i span8 pwp-float-left pwp-align-right">
					<div class="pwp-inline">
						<div class="section-making-laphroaig-ingredients-text col2 pwp-vertical-align-middle">
							<h3>Distillation</h3>
							<p class="medium">Laphroaig® runs the longest head in the industry, with the spirit run’s first cut made at 45 minutes, making it less sweet while preserving its more tarry, medicinal, peaty notes.</p>
						</div>
						<div class="section-making-laphroaig-ingredients-icon col2 pwp-vertical-align-middle pwp-align-center">
							<img src="<?php echo esc_url( get_template_directory_uri().'/img/ingredients/still.png' ); ?>" class="pwp-inline-block">
						</div>
					</div>
				</div>
				<div class="section-making-laphroaig-ingredients-islay section-making-laphroaig-ingredients-i span8 pwp-float-right">
					<div class="pwp-inline">
						<div class="section-making-laphroaig-ingredients-icon col2 pwp-vertical-align-middle pwp-align-center">
							<img src="<?php echo esc_url( get_template_directory_uri().'/img/ingredients/islay.png' ); ?>" class="pwp-inline-block">
						</div>
						<div class="section-making-laphroaig-ingredients-text col2 pwp-vertical-align-middle">
							<h3>Islay</h3>
							<p class="medium">The salty air off the Atlantic. The moss-laden peat bogs. Islay is as much responsible for the richness and character of Laphroaig® as the people who live here.</p>
						</div>
					</div>
				</div>
				<div class="section-making-laphroaig-ingredients-bottle">
					<img src="<?php echo esc_url( get_template_directory_uri().'/img/Bottle.png' ); ?>">
				</div>
			</div>
		</section>

		<section class="section-flavors-laphroaig">

			<div class="section-flavors-laphroaig-header pwp-align-center">
				<h2>the flavours of laphroaig<sup>®</sup></h2>
				<div class="rugged-bar rugged-bar-green"></div>

				<br>
				<p>Creating cocktails with Laphroaig® is complex business. But master the art and you’ll have a world of flavours at hand. The tool below matches the notes you might find in our Scotch with complimentary and balancing flavors. Pour yourself a dram, select a flavor that stands out and start experimenting. Sláinte!</p>
			</div>


			[wheel]

			<div class="section-flavors-laphroaig-cocktail">
				<div class="section-flavors-laphroaig-cocktail-header">
					<h3>what we crafted</h3>
					<h2>kiss of islay</h2>
					<div class="rugged-bar rugged-bar-white"></div>
				</div>
				<div class="section-flavors-laphroaig-cocktail-content">
					<div class="pwp-inline">
						<div class="col2 pwp-vertical-align-middle">
							[drink]
						</div>
						<div class="section-flavors-laphroaig-cocktail-recipe col2 pwp-vertical-align-middle">
							<p class="small"><b>1.5oz</b> Makers Mark®</p>
							<p class="small"><b>0.5oz</b> Laphroaig® 10</p>
							<p class="small"><b>0.25oz</b> Simple syrup</p>
							<p class="small"><b>Dash</b> Angostura bitters</p>
							<p class="small"><b>Dash</b> Chocolate bitters</p>
						</div>
					</div>
				</div>
				<div class="section-flavors-laphroaig-cocktail-directions">
					<p class="small">Stir. Serve on the rocks.</p>
				</div>
			</div>
		</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
