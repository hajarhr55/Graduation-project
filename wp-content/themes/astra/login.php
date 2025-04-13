<?php
/**
 *  Template name:login page
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

   
        <div class="login-container">
    <h2>تسجيل الدخول</h2>
    <form method="post" action="">
        <input type="text" id="username" name="username" placeholder="اسم المستخدم أو البريد الإلكتروني" required>
        <input type="password" id="password" name="password" placeholder="كلمة المرور" required>
        
        
        <button type="submit" name="login">تسجيل الدخول</button>
    </form>
    <div class="links">
        <p>ليس لديك حساب؟ <a href="<?php echo esc_url(site_url('/sign-up-page')); ?>">قم بإنشاء حساب</a></p>
    </div>
</div>

<style>
    .login-container {
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        margin: 50px auto;
        text-align: center;
    }
    .login-container h2 {
        margin-bottom: 20px;
        color: #4A90E2;
    }
    .login-container input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        width: 100%;
    }
    .login-container button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #4A90E2;
        color: white;
        font-size: 16px;
        cursor: pointer;
        width: 100%;
    }
    .login-container button:hover {
        background-color: #357ABD;
    }
    .login-container .links {
        margin-top: 15px;
        font-size: 14px;
    }
    .login-container .links a {
        color: #4A90E2;
        text-decoration: none;
    }
    .login-container .links a:hover {
        text-decoration: underline;
    }
    .error-message {
        color: red;
        font-size: 14px;
        margin-bottom: 15px;
    }
</style>






		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
