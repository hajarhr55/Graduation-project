<?php
/**
 *  Template name: updata family
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
        text-align: center;
        margin-bottom: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-control {
        width: 100%;
        border-radius: 5px;
        border: 1px solid #ccc;
        padding: 10px;
        font-size: 16px;
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
        text-align: center;
    }
    .btn:hover {
        background-color: #138496;
    }
</style>

<div class="container page-section">
    <h2 class="form-title">تحديث بيانات العائلة</h2>
    <form method="POST" action="">
        <div class="form-group">
            <label for="family_id" class="form-label">معرف العائلة:</label>
            <input type="number" id="family_id" name="family_id" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="first_name" class="form-label">الاسم الأول:</label>
            <input type="text" id="first_name" name="first_name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="last_name" class="form-label">الاسم الأخير:</label>
            <input type="text" id="last_name" name="last_name" class="form-control" >
        </div>
        <div class="form-group">
            <label for="phone" class="form-label">رقم الهاتف:</label>
            <input type="tel" id="phone" name="phone" class="form-control" >
        </div>
        <div class="form-group">
            <label for="email" class="form-label">البريد الإلكتروني:</label>
            <input type="email" id="email" name="email" class="form-control" >
        </div>
        <div class="form-group">
            <label for="address_family" class="form-label">عنوان العائلة:</label>
            <input type="text" id="address_family" name="address_family" class="form-control" >
        </div>
        <button type="submit" name="update_family_btn" class="btn">تحديث بيانات العائلة</button>
    </form>
</div>






		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
