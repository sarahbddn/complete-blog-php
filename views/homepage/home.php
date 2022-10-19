<h2 class="content-title">Nouvelles Actualités</h2>
			<hr>
			<?php foreach ($posts as $post) : ?>
				<div class="post" style="margin-left: 0px;">
					<img src="<?php echo BASE_URL . '/static/images/' . $post->getImage(); ?>" class="post_image" alt="">
					<!-- Added this if statement... -->
	
						<a href="<?php echo BASE_URL . 'filtered_posts.php?topic=' . $post['topic']['id'] ?>" class="btn category">
							<?php echo $post['topic']['name'] ?>
						</a>

					<a href="single_post.php?post-slug=<?php echo $post->getSlug() ?>">
						<div class="post_info">
							<h3><?php echo $post->getTitle() ?></h3>
							<div class="info">
								<span><?php echo date("d-m-Y ", strtotime($post->getCreatedAt)); ?></span>
								<span class="read_more">Suite...</span>
							</div>
						</div>
					</a>
				</div>
        <?php endforeach ?>