<?php
ob_start();
/**
 *  Template name: profile
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



/**
 * تحديث البيانات
 */
if (isset($_POST['update_profile'])) {
    global $wpdb;
    $current_user = wp_get_current_user(); // جلب بيانات المستخدم الحالي

    // جلب البيانات الجديدة من الفورم
    $first_name = sanitize_text_field($_POST['first_name']);
    $last_name = sanitize_text_field($_POST['last_name']);
    $email = sanitize_email($_POST['email']);
    $address = sanitize_textarea_field($_POST['address']);

    // التحقق من الدور
    $user_roles = (array) $current_user->roles;

    if (in_array('author', $user_roles)) {
        // حساب الأسرة المنتجة
        $table_name_family = 'productive_family'; // اسم الجدول المخصص للأسرة المنتجة
        $updated = $wpdb->update(
            $table_name_family,
            [
                'First_Name' => $first_name,
                'Last_Name' => $last_name,
                'Email' => $email,
                'Address_Family' => $address,
                'user_id' => $current_user->ID
            ],
            ['user_id' => $current_user->ID], // استخدام معرف المستخدم من ووردبريس
            ['%s', '%s', '%s', '%s', '%d'],
            ['%d']
        );

        // جلب العنوان من جدول الأسرة المنتجة
        $address_family = $wpdb->get_var($wpdb->prepare(
            "SELECT Address_Family FROM productive_family WHERE user_id = %d",
            $current_user->ID
        ));

        // تحديث بيانات المستخدم في ووردبريس
        wp_update_user([
            'ID' => $current_user->ID,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_email' => $email,
            'address' => $address_family // تحديث العنوان من جدول الأسرة المنتجة
        ]);
    } elseif (in_array('subscriber', $user_roles)) {
        // حساب المشترك
        $table_name_subscriber = 'customer_table'; // اسم الجدول المخصص للمشتركين
        $updated = $wpdb->update(
            $table_name_subscriber,
            [
                'First_name' => $first_name,
                'Last_name' => $last_name,
                'Email' => $email,
                'Address' => $address,
            ],
            ['Customer_id' => $current_user->ID], // استخدام معرف المستخدم من ووردبريس
            ['%s', '%s', '%s', '%s'],
            ['%d']
        );

        // جلب العنوان من جدول 'customer_table' في حالة المشتركين
        $address = $wpdb->get_var($wpdb->prepare(
            "SELECT Address FROM customer_table WHERE Customer_id = %d",
            $current_user->ID
        ));

        // تحديث بيانات المستخدم في ووردبريس
        wp_update_user([
            'ID' => $current_user->ID,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'user_email' => $email,
            'address' => $address
        ]);
    } else {
        echo '<p style="color: red;">لا يمكن تحديث البيانات. لم يتم العثور على الدور المناسب.</p>';
        return;
    }

    // عرض رسالة نجاح إذا تم التحديث بنجاح
    if ($updated !== false) {
        echo '<p style="color: green;">تم تحديث بياناتك بنجاح!</p>';
    } else {
        echo '<p style="color: red;">حدث خطأ أثناء تحديث البيانات. تأكد من صحة البيانات أو أن لديك إذنًا مناسبًا.</p>';
    }
}


// تسجيل الخروج
if (isset($_POST['logout'])) {
    wp_logout();
    wp_redirect(home_url()); // إعادة التوجيه إلى الصفحة الرئيسية بعد تسجيل الخروج
    exit;
}

// حذف الحساب
if (isset($_POST['delete_account'])) {
    // حذف الحساب من ووردبريس
    require_once(ABSPATH . 'wp-admin/includes/user.php');
    wp_delete_user($current_user->ID);

    // حذف البيانات من الجدول المخصص
    $table_name = 'customer_table'; // تأكد من تغيير اسم الجدول حسب ما هو موجود في قاعدة البيانات
    $wpdb->delete($table_name, ['Customer_id' => $current_user->ID], ['%d']);

    // عرض رسالة وداع باستخدام JavaScript
    echo '<script type="text/javascript">
        alert("تم حذف حسابك بنجاح. شكراً لاستخدامك موقعنا!");
        window.location.href = "' . home_url() . '"; // إعادة التوجيه إلى الصفحة الرئيسية
    </script>';

    // إنهاء التنفيذ بعد الحذف
    exit;
}


?>


<div class="profile-container">
    <div class="profile-header">
        <img src="https://via.placeholder.com/120" alt="صورة الملف الشخصي">
        <h2>ملفي الشخصي</h2>
        <p><strong>الاسم الأول:</strong> <?php echo esc_html($current_user->first_name); ?></p>
        <p><strong>الاسم الأخير:</strong> <?php echo esc_html($current_user->last_name); ?></p>
        <p><strong>البريد الإلكتروني:</strong> <?php echo esc_html($current_user->user_email); ?></p>
        <p><strong>العنوان:</strong> <?php 
            // استرجاع العنوان من جدول الأسرة المنتجة أو جدول العملاء حسب الدور
            global $wpdb;
            if (in_array('author', (array) $current_user->roles)) {
                $address = $wpdb->get_var($wpdb->prepare(
                    "SELECT Address_Family FROM productive_family WHERE user_id = %d",
                    $current_user->ID
                ));
            } else {
                $address = $wpdb->get_var($wpdb->prepare(
                    "SELECT Address FROM customer_table WHERE Customer_id = %d",
                    $current_user->ID
                ));
            }
            echo esc_html($address); 
        ?></p>
        <button class="update-button" onclick="toggleForm()">تحديث البيانات</button>
    </div>
</div>

<!-- الفورم المخفي في البداية -->
<div id="update-form" class="form-container" style="display: none;">
    <h3>تعديل البيانات</h3>
    <form method="post">
        <input type="text" name="first_name" value="<?php echo esc_attr($current_user->first_name); ?>" placeholder="الاسم الأول" required>
        <input type="text" name="last_name" value="<?php echo esc_attr($current_user->last_name); ?>" placeholder="الاسم الأخير" required>
        <input type="email" name="email" value="<?php echo esc_attr($current_user->user_email); ?>" placeholder="البريد الإلكتروني" required>
        <input type="text" name="address" value="<?php echo esc_attr($address); ?>" placeholder="العنوان" required><br>
        <button type="submit" name="update_profile" class="submit-button">تحديث البيانات</button>
    </form>
</div>

<hr class="separator"> <!-- الخط الفاصل -->

<div class="button-container">
    <!-- زر تسجيل الخروج -->
    <form method="post">
        <button type="submit" name="logout" class="logout-button">تسجيل الخروج</button>
    </form>

    <!-- زر حذف الحساب -->
    <form method="post" id="delete-account-form" onsubmit="return confirmDelete();">
        <button type="submit" name="delete_account" class="delete-button">حذف الحساب</button>
    </form>
</div>




<style>
    /* الحاوية الأساسية */
    .profile-container {
        max-width: 600px;
        margin: 20px auto;
        background: #fff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        text-align: center;
        font-family: 'Arial', sans-serif;
    }

    /* رأس البروفايل */
    .profile-header img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        border: 3px solid #4A90E2;
        margin-bottom: 10px;
    }

    .profile-header h2 {
        margin: 10px 0;
        color: #333;
        font-size: 24px;
        font-weight: bold;
    }

    .profile-header p {
        color: #555;
        margin: 5px 0;
        font-size: 16px;
        line-height: 1.5;
    }

    /* الخط الفاصل */
    .separator {
        border: 0;
        height: 1px;
        background: #ddd;
        margin: 30px 0;
    }

    /* أزرار تحديث البيانات، تسجيل الخروج، وحذف الحساب */
    .button-container {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
    }

    .update-button, .submit-button, .logout-button, .delete-button {
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 16px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .update-button {
        background-color: #4A90E2;
    }

    .update-button:hover {
        background-color: #357ABD;
    }

    .logout-button {
        background-color: #4A90E2;
    }

    .logout-button:hover {
        background-color: #357ABD;
    }

    .delete-button {
        background-color: #E24C4C;
    }

    .delete-button:hover {
        background-color: #C0392B;
    }

    /* الفورم الخاص بتحديث البيانات */
    .form-container {
        max-width: 500px;
        margin: 20px auto;
        text-align: left;
        background: #f9f9f9;
        padding: 15px;
        border-radius: 10px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .form-container h3 {
        color: #4A90E2;
        margin-bottom: 10px;
    }

    .form-container input {
        width: calc(100% - 20px);
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    .submit-button {
        background-color: #4A90E2;
    }

    .submit-button:hover {
        background-color: #357ABD;
    }
</style>

<script>
    // دالة لإظهار / إخفاء الفورم
    function toggleForm() {
        var form = document.getElementById('update-form');
        if (form.style.display === 'none') {
            form.style.display = 'block'; // إظهار الفورم
        } else {
            form.style.display = 'none'; // إخفاء الفورم
        }
    }
</script>









        <?php astra_primary_content_bottom(); ?>

    </div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

    <?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
