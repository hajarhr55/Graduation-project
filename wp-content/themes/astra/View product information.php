<?php
/**
 *  Template name: product information
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





        <style>
    .container.page-section {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .form-title {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        text-align: center;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-control {
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 14px;
    }
    .form-control:focus {
        border-color: #17a2b8;
        box-shadow: 0 0 5px rgba(23, 162, 184, 0.5);
        outline: none;
    }
    .form-label {
        font-size: 16px;
        margin-bottom: 10px;
        display: block;
        color: #555;
    }
    .btn {
        background-color: #17a2b8;
        border: none;
        padding: 10px 15px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
    }
    .btn:hover {
        background-color: #138496;
    }



</style>
<div class="container page-section">
    <h2 class="form-title">استرجاع بيانات المنتج</h2>

    <form method="post">
        <div class="form-group">
            <label for="product_id" class="form-label">رقم المنتج:</label>
            <input type="number" name="product_id" id="product_id" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" name="submitbtn" value="استرجاع بيانات المنتج" class="btn">
        </div>
    </form>

    <?php
    // استرجاع البيانات فقط إذا تم الضغط على الزر
    if (isset($_POST['submitbtn'])) {
        // استرجاع البيانات
        $product_data = fetch_product_data();

        if ($product_data): ?>
            <h3>بيانات المنتج:</h3>
            <table>
                <tr>
                    <td><strong>اسم المنتج:</strong></td>
                    <td><input type="text" class="form-control" value="<?php echo esc_attr($product_data['product_name']); ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>سعر الوحدة:</strong></td>
                    <td><input type="text" class="form-control" value="<?php echo esc_attr($product_data['price_unit']); ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>الكمية المتاحة:</strong></td>
                    <td><input type="number" class="form-control" value="<?php echo esc_attr($product_data['quantity_available']); ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>نوع المنتج:</strong></td>
                    <td><input type="text" class="form-control" value="<?php echo esc_attr($product_data['product_type']); ?>" readonly></td>
                </tr>
                <tr>
                    <td><strong>وصف المنتج:</strong></td>
                    <td><textarea class="form-control" readonly><?php echo esc_textarea($product_data['product_description']); ?></textarea></td>
                </tr>
                <tr>
                    <td><strong>صورة المنتج:</strong></td>
                    <td><img src="<?php echo esc_url($product_data['product_image']); ?>" alt="Product Image" width="100" height="100"></td>
                </tr>
                <tr>
                    <td><strong>رقم العائلة:</strong></td>
                    <td><input type="text" class="form-control" value="<?php echo esc_attr($product_data['family_id']); ?>" readonly></td>
                </tr>
            </table>
        <?php else: ?>
            <!-- الرسالة تظهر فقط عند عدم العثور على المنتج عبر الكود PHP -->
            <p style="color: red;">لم يتم العثور على المنتج. يرجى التحقق من رقم المنتج.</p>
        <?php endif; ?>
    <?php } ?>
</div>







		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>





