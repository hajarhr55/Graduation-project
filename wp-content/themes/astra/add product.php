<?php
/**
 * add product
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
        <h3 class="form-title">إضافة منتج جديد</h3>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label class="form-label">اسم المنتج:</label>
                <input type="text" name="product_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">السعر:</label>
                <input type="number" step="0.01" name="price_unit" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">الكمية المتوفرة:</label>
                <input type="number" name="quantity_available" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">نوع المنتج:</label>
                <select name="product_type" class="form-control" required>
                    <option value="المالحة">المالحة</option>
                    <option value="الحلويات">الحلويات</option>
                </select>
            </div>
            <div class="form-group">
    <label class="form-label">وصف المنتج:</label>
    <textarea name="product_description" class="form-control" rows="4" required></textarea>
</div>

            <div class="form-group">
                <label class="form-label">رقم معرف الأسرة:</label>
                <input type="number" name="family_id" class="form-control" required>
            </div>
            <div class="form-group">
                <label class="form-label">صورة المنتج:</label>
                <input type="file" name="product_image" class="form-control">
            </div>
            <button type="submit" name="submitbtn_product" class="btn">إضافة المنتج</button>
        </form>
    </div>






		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
