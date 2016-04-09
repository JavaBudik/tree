<ul class="menu-left">
	<li class="level1"><a href="/produkciya1">Продукция</a>
		<ul>
			<?php
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'page',
				//'post_parent' => 9,
               'post_parent__in' => array(281,283,285,287),//array(375,377,379,381),
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post(); ?>
					<li class="level2"><a href="<?php the_permalink();?>"><?php the_title(); ?></a>
					</li>
					<?php
				}
			}
			wp_reset_postdata(); ?>
		</ul>
	</li>
	<li class="level1"><a href="/uslugi">Услуги</a>
		<ul>
			<?php
			$args = array(
				'posts_per_page' => -1,
				'post_type' => 'page',
				'post_parent' => 11,
				'orderby' => 'title',
				'order' => 'ASC'
			);
			$query = new WP_Query($args);
			if ($query->have_posts()) {
				while ($query->have_posts()) {
					$query->the_post(); ?>
					<li class="level2"><a href="<?php the_permalink();?>"><?php the_title(); ?></a>
					</li>
					<?php
				}
			}
			wp_reset_postdata(); ?>
		</ul>
	</li>
</ul>