<?php
/**
 * Block template file: /lib/template-parts/blocks/subscriptions_table.php
 *
 * Subscriptions Table Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'subscriptions-table-' . $block['id'];
if ( ! empty($block['anchor'] ) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$classes = 'block-subscriptions-table';
if ( ! empty( $block['className'] ) ) {
    $classes .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $classes .= ' align' . $block['align'];
}
?>

<?php if ( get_field( 'hide_block' ) == 1 ) : ?>
    <?php // echo 'true'; ?>
<?php else : ?>
    <?php // echo 'false'; ?>


    <?php $html_anchor = get_field( 'html_anchor' ); ?>

<div id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $classes ); ?>">
	<?php if ( have_rows( 'table_columns' ) ): ?>
        <table <?php if ( $html_anchor ) : ?>id="<?php the_field( 'html_anchor' ); ?>"<?php endif; ?>>

		<?php while ( have_rows( 'table_columns' ) ) : the_row(); ?>

			<?php if ( get_row_layout() == 'table_head' ) : ?>
                <thead>
				<?php if ( have_rows( 'head_colunm' ) ) : ?>
                    <tr>
					<?php while ( have_rows( 'head_colunm' ) ) : the_row(); ?>
						<th><?php the_sub_field( 'header_content' ); ?></th>
					<?php endwhile; ?>
                    </tr>
				<?php else : ?>
					<?php // No rows found ?>
				<?php endif; ?>
                </thead>

			<?php elseif ( get_row_layout() == 'table_body' ) : ?>
                <tbody>
				<?php if ( have_rows( 'body_rows' ) ) : ?>
                    
					<?php while ( have_rows( 'body_rows' ) ) : the_row(); ?>
						<?php if ( have_rows( 'columns' ) ) : ?>
                            <tr>
							<?php while ( have_rows( 'columns' ) ) : the_row(); ?>
								<?php if ( have_rows( 'column_content' ) ): ?>
									<?php while ( have_rows( 'column_content' ) ) : the_row(); ?>
										<?php if ( get_row_layout() == '' ) : ?>
											<td><?php the_sub_field( 'task' ); ?></td>
										<?php elseif ( get_row_layout() == 'points' ) : ?>
											<td class="points"><span class="point-mark"><?php the_sub_field( 'number_of_points' ); ?></span></td>
										<?php endif; ?>
									<?php endwhile; ?>
								<?php else: ?>
									<?php // No layouts found ?>
								<?php endif; ?>
							<?php endwhile; ?>
                            </tr>
						<?php else : ?>
							<?php // No rows found ?>
						<?php endif; ?>
					<?php endwhile; ?>
                    
				<?php else : ?>
					<?php // No rows found ?>
				<?php endif; ?>
                </tbody>
			<?php endif; ?>

		<?php endwhile; ?>

        </table>
	<?php else: ?>
		<?php // No layouts found ?>
	<?php endif; ?>
    <?php $notes = get_field( 'notes' ); ?>
    <?php if ( $notes ) : ?>
        <div class="table-notes"><?php the_field( 'notes' ); ?></div>
    <?php endif; ?>
</div>


<?php endif; ?>