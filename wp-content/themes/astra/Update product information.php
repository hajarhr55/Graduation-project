<?php
/**
 *    Update product information
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
        max-width: 700px;
        margin: 0 auto;
        padding: 30px;
        background-color: #f7f7f7;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .form-title {
        font-size: 26px;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-control {
        width: 100%;
        border-radius: 8px;
        border: 1px solid #ddd;
        padding: 12px;
        font-size: 15px;
        box-sizing: border-box;
        transition: border-color 0.3s ease;
    }
    .form-control:focus {
        border-color: #17a2b8;
        outline: none;
    }
    .form-label {
        font-size: 16px;
        margin-bottom: 8px;
        display: block;
        color: #555;
    }
    .radio-group {
        display: flex;
        flex-direction: column;
        gap: 12px; 
        margin-top: 12px; 
    }
    .radio-label {
        font-size: 14px;
        color: #333;
    }
    .btn {
        background-color: #17a2b8;
        border: none;
        padding: 12px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        border-radius: 8px;
        cursor: pointer;
        width: 100%;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: #138496;
    }
</style>
<div class="container page-section">
    <form method="POST" enctype="multipart/form-data">
        <div class="form-title">تحديث بيانات المنتج</div>

        <div class="form-group">
            <label class="form-label" for="product_id">معرف المنتج:</label>
            <input type="number" name="product_id" id="product_id" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="product_name">اسم المنتج:</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="price_unit">السعر:</label>
            <input type="number" step="0.01" name="price_unit" id="price_unit" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="quantity_available">الكمية المتوفرة:</label>
            <input type="number" name="quantity_available" id="quantity_available" class="form-control" required>
        </div>

        <div class="form-group">
            <label class="form-label" for="product_type">نوع المنتج:</label>
            <select name="product_type" id="product_type" class="form-control" required>
                <option value="">اختر نوع المنتج</option>
                <option value="المالحة">المالحة</option>
                <option value="الحلويات">الحلويات</option>
            </select>
        </div>

        <div class="form-group">
            <label class="form-label" for="product_description">وصف المنتج:</label>
            <textarea name="product_description" id="product_description" class="form-control" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label class="form-label" for="product_image">صورة المنتج:</label>
            <input type="file" name="product_image" id="product_image" class="form-control" required>
        </div>

        <button type="submit" name="updatebtn" class="btn">تحديث المنتج</button>
    </form>
</div>















		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
