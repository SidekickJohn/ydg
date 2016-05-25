
<?php if( is_child( 'superfoods' ) && !is_page( 'superfoods' )):?>
	<footer class="footer fixed-footer">
			<div class="container">
					<nav class="nav navbar pull-left">
						<ul>
							<li>
								<a href="http://localhost/yourdailygreen/fragen-und-anmerkungen/">Fragen und Anmerkungen</a>
							</li>
							<li>
								<a href="http://localhost/yourdailygreen/datenschutz/">Datenschutz</a>
							</li>
							<li>
								<a href="http://localhost/yourdailygreen/agb/">AGB</a>
							</li>
							<li>
								<a href="http://localhost/yourdailygreen/impressum/">Impressum</a>
							</li>
						</ul>
					</nav>
					<div class="social-area pull-right">
						<a class="btn btn-social btn-facebook btn-simple" href="#">
							<i class="fa fa-facebook-square"></i>
						</a>
						<a class="btn btn-social btn-twitter btn-simple" href="#">
							<i class="fa fa-twitter"></i>
						</a>
						<a class="btn btn-social btn-pinterest btn-simple" href="#">
							<i class="fa fa-pinterest"></i>
						</a>
					</div>
					<div class="copyright">
							&copy; 2016 <a href="http://www.yourdailygreen.de">Daily Green</a>
					</div>
			</div>
	</footer>
	<?php else:?>
		<footer class="footer">
				<div class="container">
						<nav class="nav navbar pull-left">
							<ul>
								<li>
									<a href="http://localhost/yourdailygreen/fragen-und-anmerkungen/">Fragen und Anmerkungen</a>
								</li>
								<li>
									<a href="http://localhost/yourdailygreen/datenschutz/">Datenschutz</a>
								</li>
								<li>
									<a href="http://localhost/yourdailygreen/agb/">AGB</a>
								</li>
								<li>
									<a href="http://localhost/yourdailygreen/impressum/">Impressum</a>
								</li>
							</ul>
						</nav>
						<div class="social-area pull-right">
							<a class="btn btn-social btn-facebook btn-simple" href="#">
								<i class="fa fa-facebook-square"></i>
							</a>
							<a class="btn btn-social btn-twitter btn-simple" href="#">
								<i class="fa fa-twitter"></i>
							</a>
							<a class="btn btn-social btn-pinterest btn-simple" href="#">
								<i class="fa fa-pinterest"></i>
							</a>
						</div>
						<div class="copyright">
								&copy; 2016 <a href="http://www.yourdailygreen.de">Daily Green</a>
						</div>
				</div>
		</footer>
		<?php endif; ?>
</div> <!-- End of Wrapper-Div -->
    <?php wp_footer(); ?>
    <!--- TODO Analysetool -->
</div> <!-- End of supercontainer -->
</body>
</html>
