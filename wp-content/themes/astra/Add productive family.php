    <?php
    /**
     *  Template name: add productive family
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


            <div class="container page-section">
    <h3 class="form-title">إضافة عائلة جديدة</h3>
    <form method="POST" action="" enctype="multipart/form-data">
        <div class="form-group">
            <label class="form-label">الاسم الأول:</label>
            <input type="text" name="first_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">اسم العائلة:</label>
            <input type="text" name="last_name" class="form-control" >
        </div>
        <div class="form-group">
            <label class="form-label">رقم الهاتف:</label>
            <input type="number" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">العنوان:</label>
            <input type="text" name="address_family" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">البريد الإلكتروني:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">اسم المستخدم:</label>
            <input type="text" name="user_login" class="form-control" required>
        </div>
        <div class="form-group">
            <label class="form-label">كلمة المرور:</label>
            <input type="password" name="user_password" class="form-control" required>
        </div>
        
        <button type="submit" name="submitbtn_family" class="btn">إضافة العائلة</button>
    </form>
</div>



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





            <?php astra_primary_content_bottom(); ?>

        </div><!-- #primary -->

    <?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

        <?php get_sidebar(); ?>

    <?php endif ?>

    <?php get_footer(); ?>
