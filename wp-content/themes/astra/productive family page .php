
<?php
/**
 *  Template name: productive family page 
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

    <?php
    add_shortcode( 'seller_orders', 'show_seller_orders' );
function show_seller_orders() {
    if ( ! is_user_logged_in() ) {
        return 'الرجاء تسجيل الدخول لعرض طلباتك.';
    }

    $current_user = wp_get_current_user();
    $user_email = $current_user->user_email;

    global $wpdb;

    // البحث عن معرفات المنتجات المرتبطة بالبريد الإلكتروني للأسرة المنتجة
    $product_ids = $wpdb->get_col( $wpdb->prepare(
        "SELECT post_id FROM $wpdb->postmeta WHERE meta_key = '_seller_email' AND meta_value = %s",
        $user_email
    ));

    if ( empty( $product_ids ) ) {
        return 'لا توجد طلبات مرتبطة بك.';
    }

    // جلب الطلبات المرتبطة بهذه المنتجات
    $order_items = $wpdb->get_results("
        SELECT oi.order_id, oi.order_item_name, oim.meta_value AS product_id, oim2.meta_value AS quantity
        FROM {$wpdb->prefix}woocommerce_order_items AS oi
        INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS oim
            ON oi.order_item_id = oim.order_item_id AND oim.meta_key = '_product_id'
        INNER JOIN {$wpdb->prefix}woocommerce_order_itemmeta AS oim2
            ON oi.order_item_id = oim2.order_item_id AND oim2.meta_key = '_qty'
        WHERE oim.meta_value IN (" . implode(',', $product_ids) . ")
    ");

    if ( empty( $order_items ) ) {
        return 'لا توجد طلبات جديدة.';
    }

    // عرض الطلبات
    $output = '<h2>طلباتك:</h2>';
    $output .= '<table border="1" cellpadding="5" cellspacing="0">';
    $output .= '<tr><th>رقم الطلب</th><th>اسم المنتج</th><th>الكمية</th></tr>';

    foreach ( $order_items as $item ) {
        $output .= "<tr>
            <td>{$item->order_id}</td>
            <td>{$item->order_item_name}</td>
            <td>{$item->quantity}</td>
        </tr>";
    }

    $output .= '</table>';
    return $output;
} 
?>




		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
