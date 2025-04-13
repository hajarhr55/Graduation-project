<?php
/**
 *  Template name: delete family
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
</head>
<body>
    <div class="container page-section">
        <h2 class="form-title">حذف بيانات العائلة</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="family_id" class="form-label">أدخل معرف العائلة:</label>
                <input type="number" id="family_id" name="family_id" class="form-control" required>
            </div>
            <button type="submit" name="delete_family_btn" class="btn">حذف العائلة</button>
        </form>






		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
