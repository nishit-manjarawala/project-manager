<?php get_header(); ?>

<div class="errorpage">
	<div class="wrapper">
		<div class="container">
			<header class="header-primary">
				<a href="index.html" rel="home"><img src="<?= get_template_directory_uri() ?>/themes/images/logo-icon.png" alt="logo" class="logo"></a>
			</header><!-- header-primary -->
		
			<div class="content-primary">
				<h1 class="title">Page Not Found</h1>
				<p class="description">The page you are looking for was moved, removed, <br>
				renamed or might never existed.</p>
				<div class="section-footer">
					<a href="<?= get_site_url();?>" class="btn btn-primary">Back To Homepage</a>
					<a href="mailto:name@mail.com" class="btn btn-secondary">Report Error</a>
				</div>
			</div><!-- content-primary -->
		</div><!-- container -->
	</div>
</div>
<?php get_footer(); ?>