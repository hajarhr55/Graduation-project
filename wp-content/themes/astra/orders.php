<?php
/**
 *  Template name: orders
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


// تعريف دالة get_family_id_from_user لاسترجاع Family_id بناءً على user_id من جدول الأسر المنتجة
function get_family_id_from_user() {
    $current_user = wp_get_current_user(); // الحصول على المستخدم الحالي

    // التحقق من وجود user_id صالح
    if (isset($current_user->ID)) {
        global $wpdb;

        // جلب Family_ID من جدول الأسر المنتجة بناءً على user_id الخاص بووردبريس
        $family_id = $wpdb->get_var(
            $wpdb->prepare(
                "SELECT Family_id FROM productive_family WHERE user_id = %d",
                $current_user->ID
            )
        );

        return $family_id; // إرجاع Family_ID إذا وُجد
    }

    return null; // إذا لم يكن هناك user_id صالح
}

// دالة لعرض الطلبات بناءً على معرف الأسرة
function get_orders_by_family_id() {
    $family_id = get_family_id_from_user(); // استخراج Family_ID من جدول الأسر المنتجة

    // إذا لم يتم العثور على معرف الأسرة، عرض رسالة
    if (!$family_id) {
        echo '<div class="order-message">لا يوجد معرف لهذه الأسرة.</div>';
        return;
    }

    global $wpdb;
    // جلب الطلبات التي تخص العائلة
    $orders = $wpdb->get_results(
        $wpdb->prepare("SELECT * FROM order_table_new WHERE Family_ID = %d", $family_id)
    );

    if ($orders) {
        echo '<div class="orders-list">';
        foreach ($orders as $order) {
            // استخدام wc_get_product للحصول على تفاصيل المنتج
            $product = wc_get_product($order->Product_id);
            if ($product) {
                $product_name = $product->get_name(); // اسم المنتج
                $product_price = $product->get_price(); // السعر
            } else {
                echo '<div class="order-item"><p>المنتج برقم ' . $order->Product_id . ' غير موجود.</p></div>';
                continue; // إذا لم يتم العثور على المنتج، تخطى هذا الطلب
            }

            // إذا كانت قيمة order_number صفرًا أو مفقودة، استخدم رقم الطلب الفعلي
            $order_number = $order->order_number ? $order->order_number : $order->order_id; // استبدال الرقم الفعلي للطلب إذا كانت القيمة صفرًا أو مفقودة

            // عرض بيانات الطلب 
            echo '<div class="order-item">';
            echo '<h3>الطلب : ' . $order_number . '</h3>';
            echo '<p><strong>رقم المنتج:</strong> ' . $order->Product_id . '</p>';
            echo '<p><strong>المنتج:</strong> ' . $product_name . '</p>';
            echo '<p><strong>الكمية:</strong> ' . $order->Quantity_product . '</p>';
            echo '<p><strong>السعر الإجمالي:</strong> ' . $order->Product_total_price . ' ر.س</p>';
            echo '<p><strong>رقم الجوال:</strong> ' . $order->customer_phone . '</p>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<div class="order-message">لا توجد طلبات لهذه الأسرة.</div>';
    }
}

// استدعاء دالة عرض الطلبات
get_orders_by_family_id();
?>




<style>
    .order-message {
        background-color: #f9f9f9;
        padding: 15px;
        margin: 20px 0;
        border: 1px solid #e0e0e0;
        color: #333;
        font-size: 16px;
        text-align: center;
    }

    .orders-list {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }

    .order-item {
        background-color: #f9f9f9;
        padding: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .order-item h3 {
        color: #0073e6;
        font-size: 20px;
    }

    .order-item p {
        font-size: 16px;
        line-height: 1.5;
    }

    .order-item p strong {
        color: #333;
    }
</style>

<?php astra_primary_content_bottom(); ?>

</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
