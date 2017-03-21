<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Accesspress Mag Pro
 */
?>

</div><!-- #content -->

            <?php
                  $code = do_shortcode('
                          <div align="center" class="publicitate" style="padding: 20px 0 20px 0; margin: 10 auto;">
                            [device]
                              <div id="div-gpt-ad-FEM_Bottom_Mobile" style="margin:0;padding:0">
                                <script type="text/javascript">
                                  googletag.cmd.push(function() { googletag.display("div-gpt-ad-FEM_Bottom_Mobile"); });
                                </script>
                              </div>              
                            [/device]                          
                            [notdevice]
                              <div id="div-gpt-ad-FEM_Bottom_Desktop" style="margin:0;padding:0">
                                <script type="text/javascript">
                                  googletag.cmd.push(function() { googletag.display("div-gpt-ad-FEM_Bottom_Desktop"); });
                                </script>
                              </div>              
                            [/notdevice]              
                          </div>');         
                  echo $code;
            ?>


<?php
    $accesspress_mag_theme_option = get_option( 'accesspress-mag-theme' );
    $apmag_footer_switch = of_get_option( 'footer_switch', 1 );
    $apmag_footer_layout = of_get_option( 'footer_layout' );
    $apmag_sub_footer_switch = of_get_option( 'sub_footer_switch', '1' );
    $apmag_copyright_text = of_get_option( 'mag_footer_copyright', __( '&copy; 2015 AccessPress Mag Pro', 'accesspress-mag' ) );
    $apmag_footer_text = of_get_option( 'mag_footer_text', __( 'Powered By <a href="https://accesspressthemes.com/">Accesspress Themes</a>', 'accesspress-mag' ) );
    $apmag_footer_menu = of_get_option( 'footer_menu_select' );
    $apmag_footer_menu_switch = of_get_option( 'footer_menu_switch' );
    $trans_top = of_get_option( 'trans_top_arrow', __( 'Top', 'accesspress-mag' ) );
?>
    <footer id="colophon" class="site-footer" role="contentinfo">
        <?php
            if( $apmag_footer_switch != '0' ){
            if ( is_active_sidebar( 'footer-1' ) ||  is_active_sidebar( 'footer-2' )  || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' )  ) : ?>
			<div class="top-footer footer-<?php echo esc_attr( $apmag_footer_layout ); ?>">
    			<div class="apmag-container">
                    <div class="footer-block-wrapper clearfix">
        				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
                            <div class="footer-block-1 footer-block wow fadeInLeft" data-wow-delay="0.5s">
            						<?php dynamic_sidebar( 'footer-1' ); ?>
            				</div>
                        <?php endif; ?>

        				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
                            <div class="footer-block-2 footer-block wow fadeInLeft" data-wow-delay="0.8s" style="display: <?php if( $apmag_footer_layout == 'column1' ){ echo 'none'; } else { echo 'block'; }?>;">
            						<?php dynamic_sidebar( 'footer-2' ); ?>
            				</div>
                        <?php endif; ?>

        				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
                            <div class="footer-block-3 footer-block wow fadeInLeft" data-wow-delay="1.2s" style="display: <?php if ( $apmag_footer_layout == 'column1' || $apmag_footer_layout == 'column2' ){ echo 'none'; } else { echo 'block'; } ?>;">
        					   <?php dynamic_sidebar( 'footer-3' ); ?>
        				    </div>
                        <?php endif; ?>

                        <?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
                            <div class="footer-block-4 footer-block wow fadeInLeft" data-wow-delay="1.2s" style="display: <?php if ( $apmag_footer_layout != 'column4' ){ echo 'none'; } else { echo 'block'; }?>;">
        					   <?php dynamic_sidebar( 'footer-4' ); ?>
        					</div>
                        <?php endif; ?>
                    </div> <!-- footer-block-wrapper -->
                 </div><!--apmag-container-->
            </div><!--top-footer-->
        <?php endif; } ?>

        <?php if( $apmag_sub_footer_switch == 1 ){ ?>


          <div id="burda-footer-wrapper">
          			<div id="burda-footer-top">
          				<div id="burda-footer-nav">
          					<div class="menu-footer-menu-container">
                      <ul id="menu-footer-menu" class="burda-menu" style="margin-bottom: 0px;">
                        <li id="menu-item-33111" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33111"><a href="https://www.femeia.ro/about-cookies" target="_blank">About cookies</a></li>
          <li id="menu-item-33112" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-33112"><a href="https://www.femeia.ro/termeni-si-conditii" target="_blank">Termeni si conditii</a></li>
          </ul></div>				</div><!--burda-footer-nav-->
          								<div id="burda-footer-widget-wrapper">
          										<div class="burda-footer-widget">
          												<div id="burda-logo-footer">
          							<img src="https://www.femeia.ro/wp-content/uploads/2015/04/logo-femeia-alb.png" alt="Femeia.ro" height="75px">
          						</div><!--burda-logo-footer-->
          												<p>
                                    <a href="https://femeia.ro/sanatate" target="_blank">SĂNĂTATE</a>
                                     | <a href="https://femeia.ro/frumusete" target="_blank">FRUMUSEȚE</a>
                                     | <a href="https://femeia.ro/cariera" target="_blank">CARIERĂ</a>
                                     | <a href="https://femeia.ro/timp-liber" target="_blank">TIMP LIBER</a>
                                     | <a href="https://femeia.ro/relatii" target="_blank">RELAȚII</a>
                                     | <a href="https://femeia.ro/familie" target="_blank">FAMILIE</a>
                                     | <a href="https://femeia.ro/gastronomie" target="_blank">GASTRONOMIE</a>
                                     | <a href="https://femeia.ro/home-deco" target="_blank">HOME &amp; DECO</a>
                                     | <a href="https://femeia.ro/horoscop" target="_blank">HOROSCOP</a>
                                     | <a href="https://femeia.ro/revista" target="_blank">REVISTA</a>
                                  </p>						<div id="burda-footer-social">
          							<ul>
                          <li class="fb-item">
          									<a href="https://www.facebook.com/femeiaro/" alt="Facebook" class="fb-but2" target="_blank"></a>
          								</li>
          								<li class="twitter-item">
          									<a href="https://twitter.com/femeiaRO" alt="Twitter" class="twitter-but2" target="_blank"></a>
          								</li>
                          <li class="youtube-item">
          									<a href="https://www.youtube.com/channel/UCXoNWKvmiW1JUxWeFq25sQg" alt="YouTube" class="youtube-but2" target="_blank"></a>
          								</li>
          																																<li><a href="https://www.femeia.ro/feed/rss" alt="RSS Feed" class="rss-but2"></a></li>
          															</ul>
          						</div><!--burda-footer-social-->
          						<div id="burda-copyright">
          							<p>&copy; copyright 2017
          Burda Romania - Cel mai mare editor de reviste din Romania.
          Toate drepturile asupra site-ului www.femeia.ro apartin Burda Romania. Reproducerea integrala sau partiala a textelor sau a ilustratiilor din orice pagina a site-ului www.femeia.ro este posibila numai cu acordul prealabil scris al Burda Romania. Pirateria intelectuala se pedepseste conform legii.

                        </p>
          						</div><!--copyright-->
          					</div><!--footer-widget-->

                    <div id="">
          <img src="https://www.femeia.ro/wp-content/uploads/2016/04/logo-burda.png" alt="Femeia.ro" class="burda-logo">
        </div><!--burda-logo-footer-->

          					     <div id="nav_menu-6" class="burda-footer-widget widget_nav_menu">
                           <h3 class="burda-footer-widget-header">Lifestyle Feminin</h3>
                           <div class="menu-health-and-lifestyle-container">
                             <ul id="menu-health-and-lifestyle" class="burda-menu" style="clear:both;">
        											 <li id="menu-item-33127" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33127"><a href="https://www.femeia.ro/" target="_blank">Femeia.ro</a></li>
                                <li id="menu-item-33129" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33129"><a href="https://www.cosmopolitan.ro" target="_blank">Cosmopolitan.ro</a></li>
                                <li id="menu-item-33130" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33130"><a href="https://www.revistaioana.ro" target="_blank">RevistaIoana.ro</a></li>
                                <li id="menu-item-33131" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33131"><a href="https://www.marieclaire.ro" target="_blank">MarieClaire.ro</a></li>
                                <li id="menu-item-33133" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33133"><a href="https://www.miresici.ro" target="_blank">Miresici.ro</a></li>
                                <li id="menu-item-33134" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33134"><a href="https://www.harpersbazaar.ro" target="_blank">HarpersBazaar.ro</a></li>
                                <li id="menu-item-33135" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33135"><a href="https://www.beaumonde.ro" target="_blank">BeauMonde.ro</a></li>
                              </ul>
                            </div>
                          </div>

                        <div id="nav_menu-5" class="burda-footer-widget widget_nav_menu"><h3 class="burda-footer-widget-header">Home &amp; Deco</h3>
                          <div class="menu-beauty-and-fashion-container">
        										<ul id="menu-beauty-and-fashion" class="burda-menu" style="clear:both;">
        												<li id="menu-item-33113" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33113"><a href="https://www.casa-gradina.ro" target="_blank">Casa-Gradina.ro</a></li>
                                <li id="menu-item-33114" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33114"><a href="https://www.casalux.ro" target="_blank">CasaLux.ro</a></li>
                                </ul></div></div>

                        <div id="nav_menu-4" class="burda-footer-widget widget_nav_menu">
                          <h3 class="burda-footer-widget-header">Parenting</h3>
                          <div class="menu-love-and-sex-container">
                            <ul id="menu-love-and-sex" class="burda-menu" style="clear:both;">
                              <li id="menu-item-33120" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33120"><a href="https://www.parinti.com" target="_blank">Parinti.com</a></li>
                                <li id="menu-item-33121" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33121"><a href="https://www.mami.ro">Mami.ro</a></li>
                            </ul>
                          </div>
                        </div>

                        <div id="nav_menu-2" class="burda-footer-widget widget_nav_menu">
                          <h3 class="burda-footer-widget-header">Cooking</h3>
                          <div class="menu-horoscop-container">
                            <ul id="menu-horoscop" class="burda-menu" style="clear:both;">
                              <li id="menu-item-33069" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33069"><a href="https://www.ecuisine.ro" target="_blank">Ecuisine.ro</a></li>
                              <li id="menu-item-33070" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33070"><a href="https://www.romaniagateste.ro" target="_blank">RomaniaGateste.ro</a></li>
                            </ul>
                          </div>
                        </div>


        								<div id="nav_menu-4" class="burda-footer-widget widget_nav_menu">
        									<h3 class="burda-footer-widget-header">Lifestyle Masculin</h3>
        									<div class="menu-love-and-sex-container">
        										<ul id="menu-love-and-sex" class="burda-menu" style="clear:both;">
        											<li id="menu-item-33120" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33120"><a href="https://www.menshealth.ro" target="_blank">MensHealth.ro</a></li>
        												<li id="menu-item-33121" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33121"><a href="https://www.esquire.ro" target="_blank">Esquire</a></li>
        												</ul>
        									</div>
        								</div>

        								<div id="nav_menu-4" class="burda-footer-widget widget_nav_menu">
                          <h3 class="burda-footer-widget-header">Automotive</h3>
                          <div class="menu-love-and-sex-container">
                            <ul id="menu-love-and-sex" class="burda-menu" style="clear:both;">
                              <li id="menu-item-33120" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33120"><a href="https://www.amsonline.ro" target="_blank">AMSonline.ro</a></li>
                            </ul>
                          </div>
                        </div>

        								<div id="nav_menu-4" class="burda-footer-widget widget_nav_menu">
        									<h3 class="burda-footer-widget-header">Travel</h3>
        									<div class="menu-love-and-sex-container">
        										<ul id="menu-love-and-sex" class="burda-menu" style="clear:both;">
        											<li id="menu-item-33120" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-33120"><a href="https://www.natgeo.ro" target="_blank">NatGeo.ro</a></li>
        										</ul>
        									</div>
        								</div>

                      </div><!--burda-footer-widget-wrapper-->
          			</div><!--burda-footer-top-->
          		</div>


        <?php } ?>
	</footer><!-- #colophon -->
    <div id="back-top">
        <a href="#top"><i class="fa fa-arrow-up"></i> <span> <?php echo esc_attr( $trans_top ) ;?> </span></a>
    </div>
</div><!-- #page -->
<?php if ( of_get_option( 'enable_preloader' ) == '1' ) : ?>
    <div id="page-overlay"></div>
<?php endif; ?>
<?php wp_footer(); ?>
</body>
</html>
