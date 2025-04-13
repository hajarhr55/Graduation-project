<?php
/**
 *  Template name: view family information
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
* استرجاع بيانات العائلة
*/
function fetch_family_data() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitbtn'])) {
        if (!empty($_POST['family_id'])) {
            $family_id = intval($_POST['family_id']);
            $family_data = get_family_data_by_id($family_id);

            if ($family_data) {
                // عرض البيانات المسترجعة
                return array(
                    'family_name' => $family_data->First_Name . ' ' . $family_data->Last_Name,
                    'family_address' => $family_data->Address_Family,
                    'family_phone' => $family_data->Phone,
                    'family_email' => $family_data->Email // إضافة الإيميل
                );
            } else {
                return "العائلة غير موجودة.";
            }
        }
    }
    return null; // إذا لم يتم العثور على العائلة
}

/**
* دالة لاسترجاع بيانات الأسرة بناءً على الـ family_id
*/
function get_family_data_by_id($family_id) {
    global $wpdb;

    $query = $wpdb->prepare(
        "SELECT First_Name, Last_Name, Phone, Address_Family, Email
         FROM productive_family WHERE family_id = %d", // إضافة حقل Email
        $family_id
    );

    return $wpdb->get_row($query);
}
?>
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
    <h2 class="form-title">استرجاع بيانات العائلة</h2>

    <form method="post">
        <div class="form-group">
            <label for="family_id" class="form-label">رقم العائلة:</label>
            <input type="number" name="family_id" id="family_id" class="form-control" required>
        </div>

        <div class="form-group">
            <input type="submit" name="submitbtn" value="استرجاع بيانات العائلة" class="btn">
        </div>
    </form>

    <?php
    // استرجاع البيانات
    $family_data = fetch_family_data();

    if (is_array($family_data)): ?>
        <h3>بيانات العائلة:</h3>
        <table>
            <tr>
                <td><strong>اسم العائلة:</strong></td>
                <td><input type="text" class="form-control" value="<?php echo esc_attr($family_data['family_name']); ?>" readonly></td>
            </tr>
            <tr>
                <td><strong>عنوان العائلة:</strong></td>
                <td><input type="text" class="form-control" value="<?php echo esc_attr($family_data['family_address']); ?>" readonly></td>
            </tr>
            <tr>
                <td><strong>رقم الهاتف:</strong></td>
                <td><input type="text" class="form-control" value="<?php echo esc_attr($family_data['family_phone']); ?>" readonly></td>
            </tr>
            <tr>
                <td><strong>البريد الإلكتروني:</strong></td> <!-- حقل الإيميل الجديد -->
                <td><input type="email" class="form-control" value="<?php echo esc_attr($family_data['family_email']); ?>" readonly></td>
            </tr>
        </table>
    <?php elseif ($family_data): ?>
        <p><?php echo esc_html($family_data); ?></p>
    <?php endif; ?>
</div>




		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

<?php get_footer(); ?>
