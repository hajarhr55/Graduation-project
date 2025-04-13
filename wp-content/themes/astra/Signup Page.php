<?php
/**
 *  Template name:  sign up page
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

   
        <div class="signup-container">
    <h2>إنشاء حساب جديد</h2>
    <form method="post" action="">
        <input type="text" name="first_name" placeholder="الاسم الأول" required>
        <input type="text" name="last_name" placeholder="الاسم الأخير" required>
        <input type="text" name="address" placeholder="العنوان" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="text" name="username" placeholder="اسم المستخدم" required>
        <input type="password" name="password" placeholder="كلمة المرور" required>
        <button type="submit" name="register">إنشاء الحساب</button>
    </form>
    <div class="links">
        <p>لديك حساب بالفعل؟ <a href="<?php echo esc_url(site_url('/login-page')); ?>">تسجيل الدخول</a></p>
    </div>
</div>

<style>
    .signup-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin: 50px auto;
        text-align: center;
    }
    .signup-container h2 {
        margin-bottom: 20px;
        color: #4A90E2;
    }
    .signup-container input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }
    .signup-container button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4A90E2;
        color: white;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }
    .signup-container button:hover {
        background-color: #357ABD;
    }
    .signup-container .links {
        margin-top: 15px;
        font-size: 14px;
    }
    .signup-container .links a {
        color: #4A90E2;
        text-decoration: none;
    }
    .signup-container .links a:hover {
        text-decoration: underline;
    }
</style>





		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
