<?php
/**
 * Astra functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Define Constants
 */
define( 'ASTRA_THEME_VERSION', '4.8.7' );
define( 'ASTRA_THEME_SETTINGS', 'astra-settings' );
define( 'ASTRA_THEME_DIR', trailingslashit( get_template_directory() ) );
define( 'ASTRA_THEME_URI', trailingslashit( esc_url( get_template_directory_uri() ) ) );
define( 'ASTRA_THEME_ORG_VERSION', file_exists( ASTRA_THEME_DIR . 'inc/w-org-version.php' ) );

/**
 * Minimum Version requirement of the Astra Pro addon.
 * This constant will be used to display the notice asking user to update the Astra addon to the version defined below.
 */
define( 'ASTRA_EXT_MIN_VER', '4.8.4' );

/**
 * Load in-house compatibility.
 */
if ( ASTRA_THEME_ORG_VERSION ) {
	require_once ASTRA_THEME_DIR . 'inc/w-org-version.php';
}

/**
 * Setup helper functions of Astra.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-theme-options.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-theme-strings.php';
require_once ASTRA_THEME_DIR . 'inc/core/common-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-icons.php';

define( 'ASTRA_PRO_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( 'https://wpastra.com/pricing/', 'dashboard', 'free-theme', 'dashboard' ) : 'https://woocommerce.com/products/astra-pro/' );
define( 'ASTRA_PRO_CUSTOMIZER_UPGRADE_URL', ASTRA_THEME_ORG_VERSION ? astra_get_pro_url( 'https://wpastra.com/pricing/', 'customizer', 'free-theme', 'upgrade' ) : 'https://woocommerce.com/products/astra-pro/' );

/**
 * Update theme
 */
require_once ASTRA_THEME_DIR . 'inc/theme-update/astra-update-functions.php';
require_once ASTRA_THEME_DIR . 'inc/theme-update/class-astra-theme-background-updater.php';

/**
 * Fonts Files
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-font-families.php';
if ( is_admin() ) {
	require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts-data.php';
}

require_once ASTRA_THEME_DIR . 'inc/lib/webfont/class-astra-webfont-loader.php';
require_once ASTRA_THEME_DIR . 'inc/lib/docs/class-astra-docs-loader.php';
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-fonts.php';

require_once ASTRA_THEME_DIR . 'inc/dynamic-css/custom-menu-old-header.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/container-layouts.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/astra-icons.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-walker-page.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-enqueue-scripts.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-gutenberg-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-wp-editor-css.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/block-editor-compatibility.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/inline-on-mobile.php';
require_once ASTRA_THEME_DIR . 'inc/dynamic-css/content-background.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-dynamic-css.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-global-palette.php';

// Enable NPS Survey only if the starter templates version is < 4.3.7 or > 4.4.4 to prevent fatal error.
if ( ! defined( 'ASTRA_SITES_VER' ) || version_compare( ASTRA_SITES_VER, '4.3.7', '<' ) || version_compare( ASTRA_SITES_VER, '4.4.4', '>' ) ) {
	// NPS Survey Integration
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-notice.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/class-astra-nps-survey.php';
}

/**
 * Custom template tags for this theme.
 */
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-attr.php';
require_once ASTRA_THEME_DIR . 'inc/template-tags.php';

require_once ASTRA_THEME_DIR . 'inc/widgets.php';
require_once ASTRA_THEME_DIR . 'inc/core/theme-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/admin-functions.php';
require_once ASTRA_THEME_DIR . 'inc/core/sidebar-manager.php';

/**
 * Markup Functions
 */
require_once ASTRA_THEME_DIR . 'inc/markup-extras.php';
require_once ASTRA_THEME_DIR . 'inc/extras.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog-config.php';
require_once ASTRA_THEME_DIR . 'inc/blog/blog.php';
require_once ASTRA_THEME_DIR . 'inc/blog/single-blog.php';

/**
 * Markup Files
 */
require_once ASTRA_THEME_DIR . 'inc/template-parts.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-loop.php';
require_once ASTRA_THEME_DIR . 'inc/class-astra-mobile-header.php';

/**
 * Functions and definitions.
 */
require_once ASTRA_THEME_DIR . 'inc/class-astra-after-setup-theme.php';

// Required files.
require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-helper.php';

require_once ASTRA_THEME_DIR . 'inc/schema/class-astra-schema.php';

/* Setup API */
require_once ASTRA_THEME_DIR . 'admin/includes/class-astra-api-init.php';

if ( is_admin() ) {
	/**
	 * Admin Menu Settings
	 */
	require_once ASTRA_THEME_DIR . 'inc/core/class-astra-admin-settings.php';
	require_once ASTRA_THEME_DIR . 'admin/class-astra-admin-loader.php';
	require_once ASTRA_THEME_DIR . 'inc/lib/astra-notices/class-astra-notices.php';
}

/**
 * Metabox additions.
 */
require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-boxes.php';

require_once ASTRA_THEME_DIR . 'inc/metabox/class-astra-meta-box-operations.php';

/**
 * Customizer additions.
 */
require_once ASTRA_THEME_DIR . 'inc/customizer/class-astra-customizer.php';

/**
 * Astra Modules.
 */
require_once ASTRA_THEME_DIR . 'inc/modules/posts-structures/class-astra-post-structures.php';
require_once ASTRA_THEME_DIR . 'inc/modules/related-posts/class-astra-related-posts.php';

/**
 * Compatibility
 */
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gutenberg.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-jetpack.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/woocommerce/class-astra-woocommerce.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/edd/class-astra-edd.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/lifterlms/class-astra-lifterlms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/learndash/class-astra-learndash.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bb-ultimate-addon.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-contact-form-7.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-visual-composer.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-site-origin.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-gravity-forms.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-bne-flyout.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-ubermeu.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-divi-builder.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-amp.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-yoast-seo.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/surecart/class-astra-surecart.php';
require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-starter-content.php';
require_once ASTRA_THEME_DIR . 'inc/addons/transparent-header/class-astra-ext-transparent-header.php';
require_once ASTRA_THEME_DIR . 'inc/addons/breadcrumbs/class-astra-breadcrumbs.php';
require_once ASTRA_THEME_DIR . 'inc/addons/scroll-to-top/class-astra-scroll-to-top.php';
require_once ASTRA_THEME_DIR . 'inc/addons/heading-colors/class-astra-heading-colors.php';
require_once ASTRA_THEME_DIR . 'inc/builder/class-astra-builder-loader.php';

// Elementor Compatibility requires PHP 5.4 for namespaces.
if ( version_compare( PHP_VERSION, '5.4', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-elementor-pro.php';
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-web-stories.php';
}

// Beaver Themer compatibility requires PHP 5.3 for anonymous functions.
if ( version_compare( PHP_VERSION, '5.3', '>=' ) ) {
	require_once ASTRA_THEME_DIR . 'inc/compatibility/class-astra-beaver-themer.php';
}

require_once ASTRA_THEME_DIR . 'inc/core/markup/class-astra-markup.php';

/**
 * Load deprecated functions
 */
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-filters.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-hooks.php';
require_once ASTRA_THEME_DIR . 'inc/core/deprecated/deprecated-functions.php';





/**
 * اضافة منتج
 */ 

 function add_new_product() {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitbtn_product'])) {
			global $wpdb;

			// التحقق من الحقول
			$product_name = isset($_POST['product_name']) ? sanitize_text_field($_POST['product_name']) : '';
			$price_unit = isset($_POST['price_unit']) ? floatval($_POST['price_unit']) : 0.0;
			$quantity_available = isset($_POST['quantity_available']) ? intval($_POST['quantity_available']) : 0;
			$product_type = isset($_POST['product_type']) ? sanitize_text_field($_POST['product_type']) : ''; // الحلويات أو المالحة
			$family_id = isset($_POST['family_id']) ? intval($_POST['family_id']) : 0;
			$product_description = isset($_POST['product_description']) ? sanitize_textarea_field($_POST['product_description']) : ''; // وصف المنتج

			// التعامل مع تحميل الصورة
			$product_image = '';
			if (!empty($_FILES['product_image']['name'])) {
					require_once(ABSPATH . 'wp-admin/includes/file.php');
					require_once(ABSPATH . 'wp-admin/includes/image.php');
					require_once(ABSPATH . 'wp-admin/includes/media.php');
					$attachment_id = media_handle_upload('product_image', 0);
					if (!is_wp_error($attachment_id)) {
							$product_image = wp_get_attachment_url($attachment_id); // رابط الصورة
					}
			}

			// اسم الجدول
			$table_name = 'product_table';
			$family_table_name = 'productive_family';

			// التحقق من صحة الحقول الأساسية
			if (!empty($product_name) && $price_unit > 0 && $quantity_available > 0 && !empty($product_type)) {

					// تحقق من وجود family_id في جدول الأسر
					$family_exists = $wpdb->get_var(
							$wpdb->prepare("SELECT COUNT(*) FROM $family_table_name WHERE Family_id = %d", $family_id)
					);

					if (!$family_exists) {
							echo '<div class="notice notice-error"><p>رقم معرف الأسرة غير صحيح. يرجى إدخال معرف صالح.</p></div>';
							return;
					}

					// الحصول على اسم الأسرة بناءً على المعرف
					$family_data = $wpdb->get_row(
							$wpdb->prepare("SELECT First_Name, Last_Name FROM $family_table_name WHERE Family_id = %d", $family_id)
					);

					if ($family_data) {
							$family_name = $family_data->First_Name . ' ' . $family_data->Last_Name; // عرض اسم الأسرة
					} else {
							$family_name = 'غير معروف'; // إذا لم يتم العثور على الأسرة
					}

					// إدخال المنتج في WooCommerce
					$product_data = array(
							'post_title'   => $product_name,
							'post_content' => $product_description, // إضافة الوصف
							'post_status'  => 'publish',
							'post_type'    => 'product',
							'meta_input'   => array(
									'_price' => $price_unit,
									'_regular_price' => $price_unit,
									'_stock' => $quantity_available,
									'_stock_status' => 'instock',
									'family_name' => $family_name, // إضافة اسم الأسرة كـ Meta Field
							)
					);

					// إضافة المنتج إلى WooCommerce
					$product_id = wp_insert_post($product_data);

					// التحقق من إضافة المنتج إلى WooCommerce
					$product = get_post($product_id);
					if ($product && $product->post_type === 'product') {
							echo '';
					} else {
							echo 'لم يتم إضافة المنتج  !';
							return;
					}

					if ($product_id) {
							// إضافة التصنيف بناءً على النوع
							$category_slug = '';
							if ($product_type == 'الحلويات') {
									$category_slug = 'الحلويات'; // التصنيف الحلويات
							} else if ($product_type == 'المالحة') {
									$category_slug = 'الاطعمة-المالحة'; // التصنيف الأطعمة المالحة
							}

							// ربط المنتج بالتسمية المحددة في WooCommerce
							wp_set_object_terms($product_id, $category_slug, 'product_cat', true);

							// ربط الصورة بالمنتج
							if (!empty($attachment_id)) {
									set_post_thumbnail($product_id, $attachment_id); // تعيين الصورة كصورة بارزة
							}

							// إدخال البيانات في الجدول المخصص بعد إضافة المنتج في WooCommerce
							$result = $wpdb->insert(
									$table_name,
									array(
											'Product_name' => $product_name,
											'Price_unit' => $price_unit,
											'Quantity_Available' => $quantity_available,
											'Product_Type' => $product_type,
											'Product_image' => $product_image, // تخزين رابط الصورة
											'Family_id' => $family_id,
											'Product_id' => $product_id, // معرف المنتج في WooCommerce
											'Product_Description' => $product_description, // تخزين وصف المنتج
									),
									array('%s', '%f', '%d', '%s', '%s', '%d', '%d', '%s') // تحديد نوع البيانات للحقول
							);

							if ($result) {
									echo '<div class="notice notice-success"><p>تمت إضافة المنتج بنجاح من الأسرة: ' . $family_name . '</p>';
									echo '<p>التصنيف: ' . $product_type . '</p></div>';
							} else {
									echo '<div class="notice notice-error"><p>حدث خطأ أثناء إضافة المنتج: ' . $wpdb->last_error . '</p></div>';
							}
					} else {
							echo '<div class="notice notice-error"><p>فشل إضافة المنتج إلى الموقع.</p></div>';
					}
			} else {
					echo '<div class="notice notice-error"><p>يرجى ملء جميع الحقول المطلوبة لإضافة المنتج.</p></div>'; // رسالة مخصصة للمنتج
			}
	}
}
add_action('wp', 'add_new_product');

/**
* عرض اسم الأسرة في صفحة المنتج
*/
add_action('woocommerce_single_product_summary', 'display_family_name_on_product', 25);

function display_family_name_on_product() {
	global $post;

	// الحصول على قيمة اسم الأسرة
	$family_name = get_post_meta($post->ID, 'family_name', true);

	// عرض اسم الأسرة إذا كان موجودًا
	if (!empty($family_name)) {
			echo '<p class="family-name"><strong>المنتج من إنتاج:</strong> ' . esc_html($family_name) . '</p>';
	}
}












/**
 * حذف المنتج
 */
if (isset($_POST['deletebtn'])) {
    // تحقق من وجود معرف المنتج
    $product_id = intval($_POST['product_id']); // تأكد من تحويل المعرف إلى رقم صحيح

    if ($product_id > 0) {
        // تحقق من وجود المنتج قبل الحذف
        $exists = product_exists_by_id($product_id);

        if ($exists) {
            // استدعاء دالة الحذف من الجدول الخاص
            $deleted_db = delete_product_by_id($product_id);

            if ($deleted_db) {
                // حذف المنتج من WooCommerce
                $deleted_wc = wp_delete_post($product_id, true);

                if ($deleted_wc) {
                    echo "<p style='color:green;'>تم حذف المنتج بنجاح  .</p>";
                } else {
                    echo "<p style='color:orange;'>تم حذف المنتج من قاعدة البيانات الخاصة بك، ولكن فشل حذف المنتج من WooCommerce.</p>";
                }
            } else {
                echo "<p style='color:red;'>فشل في حذف المنتج من قاعدة البيانات الخاصة بك. حدث خطأ أثناء العملية.</p>";
            }
        } else {
            echo "<p style='color:red;'>المنتج غير موجود. يرجى إدخال معرف منتج صالح.</p>";
        }
    } else {
        echo "<p style='color:red;'>يرجى إدخال معرف منتج صحيح.</p>";
    }
}

/**
 * دالة للتحقق من وجود المنتج بناءً على ID
 */
function product_exists_by_id($product_id) {
    global $wpdb;

    // تحقق من وجود المنتج في قاعدة البيانات
    $query = $wpdb->prepare(
        "SELECT COUNT(*) FROM product_table WHERE product_id = %d",
        $product_id
    );

    // إعادة true إذا كان المنتج موجودًا، وإلا false
    return $wpdb->get_var($query) > 0;
}

/**
 * دالة حذف المنتج بناءً على ID المنتج
 */
function delete_product_by_id($product_id) {
    global $wpdb;

    // استعلام الحذف
    $query = $wpdb->prepare(
        "DELETE FROM product_table WHERE product_id = %d",
        $product_id
    );

    // تنفيذ استعلام الحذف
    $result = $wpdb->query($query);

    // إذا نجح الحذف، أعد true
    return $result !== false;
}







/**
 * استرجاع بيانات المنتج
 */
function fetch_product_data() {
	// التحقق إذا تم إرسال البيانات عبر POST
	if (isset($_POST['submitbtn'])) {
			if (!empty($_POST['product_id'])) {
					$product_id = intval($_POST['product_id']);
					$product_data = get_product_data_by_id($product_id);

					if ($product_data) {
							// يتم استخدام البيانات المسترجعة في النموذج أو أي مكان آخر
							return array(
									'product_name' => $product_data->product_name,
									'price_unit' => $product_data->price_unit,
									'quantity_available' => $product_data->quantity_available,
									'product_type' => $product_data->product_type,
									'product_image' => $product_data->product_image,
									'family_id' => $product_data->family_id,
									'product_description' => $product_data->product_description, // إضافة وصف المنتج
							);
					}
			}
	}
	return null; // إذا لم يتم العثور على المنتج أو لم يتم الضغط على زر الاسترجاع
}



/**
 * دالة لاسترجاع بيانات المنتج من قاعدة البيانات
 */
function get_product_data_by_id($product_id) {
	global $wpdb;

	$query = $wpdb->prepare(
		"SELECT product_name, price_unit, quantity_available, product_type, product_image, family_id, product_description 
		FROM product_table WHERE product_id = %d",
		$product_id
	);

	return $wpdb->get_row($query);
}










/**
 * تحديث بيانات المنتج
 */
if (isset($_POST['updatebtn'])) {
	// جلب البيانات من الفورم
	$product_id = intval($_POST['product_id']);
	$product_name = sanitize_text_field($_POST['product_name']);
	$price_unit = floatval($_POST['price_unit']);
	$quantity_available = intval($_POST['quantity_available']);
	$product_type = sanitize_text_field($_POST['product_type']);
	$product_description = sanitize_textarea_field($_POST['product_description']); // إضافة الوصف

	// التعامل مع تحميل الصورة
	$product_image = '';
	if (!empty($_FILES['product_image']['name'])) {
			require_once(ABSPATH . 'wp-admin/includes/file.php');
			require_once(ABSPATH . 'wp-admin/includes/image.php');
			require_once(ABSPATH . 'wp-admin/includes/media.php');
			$attachment_id = media_handle_upload('product_image', 0); // تحميل الصورة
			if (!is_wp_error($attachment_id)) {
					$product_image = wp_get_attachment_url($attachment_id); // الحصول على رابط الصورة
			} else {
					echo "<p style='color:red;'>فشل تحميل الصورة. يرجى التحقق من الملف.</p>";
			}
	}

	if ($product_id > 0) {
			// التحقق من وجود المنتج
			$product_data = get_product_data_by_id($product_id);

			if ($product_data) {
					// استدعاء دالة التحديث مع تمرير رابط الصورة
					$updated = update_product_data($product_id, $product_name, $price_unit, $quantity_available, $product_type, $product_description, $product_image);

					if ($updated) {
							echo "<p style='color:green;'>تم تحديث المنتج بنجاح.</p>";
					} else {
							echo "<p style='color:red;'>لم يتم تحديث أي بيانات. ربما لم تحدث تغييرات على المنتج.</p>";
					}
			} else {
					echo "<p style='color:red;'>فشل في تحديث المنتج. تأكد من صحة معرف المنتج.</p>";
			}
	} else {
			echo "<p style='color:red;'>يرجى إدخال معرف منتج صحيح.</p>";
	}
}


// دالة لتحديث بيانات المنتج
function update_product_data($product_id, $product_name, $price_unit, $quantity_available, $product_type, $product_description, $product_image = '') {
	global $wpdb;

	// استعلام التحديث في الجدول المخصص
	$result = $wpdb->update(
			'product_table', // اسم الجدول
			[
					'product_name'        => $product_name,
					'price_unit'          => $price_unit,
					'quantity_available'  => $quantity_available,
					'product_type'        => $product_type,        // تحديث نوع المنتج
					'product_description' => $product_description, // تحديث وصف المنتج
					'product_image'       => $product_image,       // تحديث الصورة إذا تم رفعها
			],
			['product_id' => $product_id], // شرط التحديث
			['%s', '%f', '%d', '%s', '%s', '%s'], // صيغة القيم المحدثة
			['%d']                         // صيغة شرط المعرف
	);

	if ($result !== false) {
			// تحديث واجهة WooCommerce
			$product_post = get_post($product_id);
			if ($product_post && $product_post->post_type === 'product') {
					// تحديث التصنيف في WooCommerce
					$category_slug = ($product_type == 'الحلويات') ? 'الحلويات' : 'الاطعمة-المالحة';
					wp_set_object_terms($product_id, $category_slug, 'product_cat', false);

					// تحديث باقي البيانات (الوصف والاسم)
					$product_data = [
							'ID'           => $product_id,
							'post_title'   => $product_name,       // تحديث اسم المنتج
							'post_content' => $product_description, // تحديث الوصف
					];
					wp_update_post($product_data);

					// تحديث البيانات الوصفية
					update_post_meta($product_id, '_price', $price_unit); // السعر
					update_post_meta($product_id, '_regular_price', $price_unit); // السعر العادي
					update_post_meta($product_id, '_stock', $quantity_available); // الكمية المتوفرة
					update_post_meta($product_id, '_stock_status', $quantity_available > 0 ? 'instock' : 'outofstock'); // حالة المخزون

					// إذا تم رفع صورة جديدة
					if (!empty($product_image)) {
							// تحميل الصورة كصورة بارزة
							$attachment_id = attachment_url_to_postid($product_image);
							if ($attachment_id) {
									set_post_thumbnail($product_id, $attachment_id); // تعيين الصورة البارزة
							}
					}
			}
	}

	return $result !== false;
}







/**
 * إضافة عائلة جديدة
 */
function add_new_family() {
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submitbtn_family'])) {
		global $wpdb;

		// التحقق من الحقول
		$first_name = isset($_POST['first_name']) ? sanitize_text_field($_POST['first_name']) : '';
		$last_name = isset($_POST['last_name']) ? sanitize_text_field($_POST['last_name']) : '';
		$phone = isset($_POST['phone']) ? sanitize_text_field($_POST['phone']) : '';
		$address_family = isset($_POST['address_family']) ? sanitize_text_field($_POST['address_family']) : '';
		$user_login = isset($_POST['user_login']) ? sanitize_text_field($_POST['user_login']) : '';
		$user_password = isset($_POST['user_password']) ? sanitize_text_field($_POST['user_password']) : '';
		$email = isset($_POST['email']) ? sanitize_email($_POST['email']) : '';

		// التحقق من الحقول الأساسية
		if (empty($first_name) || empty($last_name) || empty($phone) || empty($address_family) || empty($user_login) || empty($user_password) || empty($email)) {
			echo '<div class="notice notice-error"><p>يرجى ملء جميع الحقول المطلوبة.</p></div>';
			return;
		}

		// التحقق من وجود اسم المستخدم في WordPress
		if (username_exists($user_login)) {
			echo '<div class="notice notice-error"><p>اسم المستخدم موجود بالفعل في النظام. يرجى اختيار اسم مستخدم آخر.</p></div>';
			return;
		}

		// التحقق من وجود اسم المستخدم في جدول productive_family
		$existing_user = $wpdb->get_var($wpdb->prepare(
			"SELECT COUNT(*) FROM productive_family WHERE user_login = %s",
			$user_login
		));

		if ($existing_user > 0) {
			echo '<div class="notice notice-error"><p>اسم المستخدم موجود بالفعل في جدول الأسر. يرجى اختيار اسم مستخدم آخر.</p></div>';
			return;
		}

		// إدخال البيانات في جدول الأسر
		$result = $wpdb->insert(
			'productive_family',
			array(
				'First_Name' => $first_name,
				'Last_Name' => $last_name,
				'Phone' => $phone,
				'Address_Family' => $address_family,
				'user_login' => $user_login,
				'user_password' => wp_hash_password($user_password),
				'Email' => $email
			),
			array('%s', '%s', '%s', '%s', '%s', '%s', '%s')
		);

		if ($result === false) {
			echo '<div class="notice notice-error"><p>حدث خطأ أثناء إضافة العائلة. حاول مرة أخرى.</p></div>';
			return;
		}

		// الحصول على Family_id
		$family_id = $wpdb->insert_id;

		// إضافة المستخدم إلى WordPress
		$user_id = wp_insert_user(array(
			'user_login' => $user_login,
			'user_pass' => $user_password,
			'first_name' => $first_name,
			'last_name' => $last_name,
			'user_email' => $email,
			'role' => 'author',
		));

		if (is_wp_error($user_id)) {
			echo '<div class="notice notice-error"><p>حدث خطأ أثناء إضافة المستخدم: ' . $user_id->get_error_message() . '</p></div>';
			return;
		}

		// تحديث جدول الأسر مع معرف المستخدم
		$update_result = $wpdb->update(
			'productive_family',
			array('user_id' => $user_id),
			array('Family_id' => $family_id),
			array('%d'),
			array('%d')
		);

		// حفظ العنوان كـ Meta Field في جدول المستخدمين
		if ($update_result !== false) {
			update_user_meta($user_id, 'address_family', $address_family);
			echo '<div class="notice notice-success"><p>تمت إضافة العائلة بنجاح! معرف العائلة هو: ' . $family_id . '</p></div>';
		} else {
			echo '<div class="notice notice-error"><p>حدث خطأ أثناء تحديث بيانات العائلة.</p></div>';
		}
	}
}
add_action('wp', 'add_new_family');














 




/**
* تحديث بيانات العائلة
*/
if (isset($_POST['update_family_btn'])) {
	// جلب البيانات من الفورم
	$family_id = intval($_POST['family_id']);
	$first_name = sanitize_text_field($_POST['first_name']);
	$last_name = sanitize_text_field($_POST['last_name']);
	$phone = sanitize_text_field($_POST['phone']);
	$address_family = sanitize_text_field($_POST['address_family']);
	$email = sanitize_email($_POST['email']); // إضافة حقل الإيميل الجديد

	if ($family_id > 0) {
			global $wpdb;

			// اسم الجدول
			$table_name = 'productive_family';
			$wp_users_table = $wpdb->prefix . 'users'; // جدول wp_users

			// جلب بيانات العائلة بناءً على Family_id
			$family_data = $wpdb->get_row(
					$wpdb->prepare("SELECT * FROM $table_name WHERE Family_id = %d", $family_id),
					ARRAY_A
			);

			if ($family_data) {
					// استخدام القيم الحالية إذا كانت الحقول المدخلة فارغة
					$first_name = !empty($first_name) ? $first_name : $family_data['First_Name'];
					$last_name = !empty($last_name) ? $last_name : $family_data['Last_Name'];
					$phone = !empty($phone) ? $phone : $family_data['Phone'];
					$address_family = !empty($address_family) ? $address_family : $family_data['Address_Family'];
					$email = !empty($email) ? $email : $family_data['Email']; // استخدام الإيميل الحالي إذا كان فارغ

					// تحديث جدول productive_family
					$updated_family = $wpdb->update(
							$table_name,
							[
									'First_Name' => $first_name,
									'Last_Name' => $last_name,
									'Phone' => $phone,
									'Address_Family' => $address_family,
									'Email' => $email // تحديث الإيميل
							],
							['Family_id' => $family_id],
							['%s', '%s', '%s', '%s', '%s'], // إضافة '%s' للإيميل
							['%d']
					);

					// تحديث display_name في جدول wp_users
					$user_id = $family_data['user_id'];
					if (!empty($user_id)) {
							$display_name = trim("$first_name $last_name");
							$wpdb->update(
									$wp_users_table,
									['display_name' => $display_name],
									['ID' => $user_id],
									['%s'],
									['%d']
							);
					}

					// التحقق من نجاح التحديث
					if ($updated_family !== false) {
							echo "<p style='color:green;'>تم تحديث بيانات العائلة بنجاح.</p>";
					} else {
							echo "<p style='color:red;'>لم يتم تحديث أي بيانات. ربما لم تحدث تغييرات.</p>";
					}
			} else {
					echo "<p style='color:red;'>لم يتم العثور على العائلة. تأكد من صحة معرف العائلة.</p>";
			}
	} else {
			echo "<p style='color:red;'>يرجى إدخال معرف عائلة صحيح.</p>";
	}
}






/**
* حذف العائلة
*/


        // تنفيذ عملية الحذف عند إرسال النموذج
        if (isset($_POST['delete_family_btn'])) {
					// تحقق من وجود معرف العائلة
					$family_id = intval($_POST['family_id']); // تأكد من تحويل المعرف إلى رقم صحيح

					if ($family_id > 0) {
							// التحقق من وجود العائلة أولاً
							$family_exists = check_if_family_exists($family_id);

							if ($family_exists) {
									// استدعاء دالة الحذف
									$deleted = delete_family_by_id($family_id);

									if ($deleted) {
											echo "<p style='color:green;'>تم حذف العائلة بنجاح.</p>";
									} else {
											echo "<p style='color:red;'>فشل في حذف العائلة. حدث خطأ أثناء عملية الحذف.</p>";
									}
							} else {
									echo "<p style='color:red;'>لا توجد عائلة بهذا المعرف.</p>";
							}
					} else {
							echo "<p style='color:red;'>يرجى إدخال معرف عائلة صحيح.</p>";
					}
			}

			// دالة للتحقق من وجود العائلة
			function check_if_family_exists($family_id) {
					global $wpdb;

					// استعلام للتحقق من وجود العائلة
					$query = $wpdb->prepare(
							"SELECT COUNT(*) FROM productive_family WHERE Family_ID = %d",
							$family_id
					);

					$count = $wpdb->get_var($query);

					return $count > 0; // إذا كانت القيمة أكبر من 0، فهذا يعني أن العائلة موجودة
			}

			// دالة حذف العائلة بناءً على ID العائلة
			function delete_family_by_id($family_id) {
					global $wpdb;

					// استعلام الحذف
					$query = $wpdb->prepare(
							"DELETE FROM productive_family WHERE Family_ID = %d",
							$family_id
					);

					// تنفيذ استعلام الحذف
					$result = $wpdb->query($query);

					// إذا نجح الحذف، أعد true
					return $result !== false;
			}













/**
 * انشاء حساب جديد
 */
if (isset($_POST['register'])) { // التأكد من الضغط على زر التسجيل
	global $wpdb;

	// جلب البيانات من النموذج
	$username   = sanitize_text_field($_POST['username']); // اسم المستخدم
	$first_name = sanitize_text_field($_POST['first_name']); // الاسم الأول
	$last_name  = sanitize_text_field($_POST['last_name']);  // الاسم الأخير
	$email      = sanitize_email($_POST['email']);           // البريد الإلكتروني
	$address    = sanitize_text_field($_POST['address']);    // العنوان
	$password   = sanitize_text_field($_POST['password']);   // كلمة المرور

	// التحقق من الحقول المطلوبة
	if (empty($username) || empty($first_name) || empty($last_name) || empty($email) || empty($address) || empty($password)) {
			echo "<p style='color: red;'>يرجى ملء جميع الحقول.</p>";
			return;
	}

	// التحقق من تكرار اسم المستخدم أو البريد الإلكتروني
	if (username_exists($username)) {
			echo "<p style='color: red;'>اسم المستخدم مأخوذ. يرجى اختيار اسم مستخدم آخر.</p>";
			return;
	}

	if (email_exists($email)) {
			echo "<p style='color: red;'>البريد الإلكتروني مستخدم بالفعل. يرجى استخدام بريد إلكتروني آخر.</p>";
			return;
	}

	// إنشاء المستخدم في ووردبريس
	$user_id = wp_create_user($username, $password, $email); // إنشاء المستخدم باستخدام اسم المستخدم وكلمة المرور والبريد الإلكتروني
	if (is_wp_error($user_id)) {
			echo "<p style='color: red;'>حدث خطأ أثناء إنشاء الحساب: " . $user_id->get_error_message() . "</p>";
			return;
	}

	// تحديث البيانات الإضافية (الاسم الأول، الاسم الأخير) في ملف المستخدم
	wp_update_user([
			'ID'         => $user_id,
			'first_name' => $first_name,
			'last_name'  => $last_name,
	]);

	// إدخال البيانات الإضافية في الجدول المخصص
	$table_name = 'customer_table'; // اسم الجدول المخصص
	$hashed_password = wp_hash_password($password); // تشفير كلمة المرور

	$inserted = $wpdb->insert(
			$table_name,
			[
					'Customer_id' => $user_id,  // استخدام معرف المستخدم في ووردبريس لحقل Customer_id
					'username'    => $username, // اسم المستخدم
					'password'    => $hashed_password, // كلمة المرور المشفرة
					'First_name'  => $first_name,
					'Last_name'   => $last_name,
					'Email'       => $email,
					'Address'     => $address,
			],
			['%d', '%s', '%s', '%s', '%s', '%s', '%s']
	);

	if ($inserted === false) {
			echo "<p style='color: red;'>حدث خطأ أثناء حفظ البيانات الإضافية: " . $wpdb->last_error . "</p>";
	} else {
			echo "<p style='color: green;'>تم إنشاء الحساب وحفظ البيانات بنجاح.</p>";
	}
}








/**
 * تسجيل دخول
 */


 if (isset($_POST['login'])) {
	global $wpdb;

	// بدء الجلسة إذا لم تكن قد بدأت بالفعل
	if (session_status() == PHP_SESSION_NONE) {
			session_start();
	}

	// الحصول على بيانات النموذج
	$username = sanitize_text_field($_POST['username']);
	$password = sanitize_text_field($_POST['password']);

	// التحقق من صحة البيانات
	if (!empty($username) && !empty($password)) {
			// محاولة تسجيل الدخول باستخدام ووردبريس
			$user = wp_signon(array(
					'user_login'    => $username,
					'user_password' => $password,
					'remember'      => true, // لتذكر الجلسة
			), false);

			// إذا تم تسجيل الدخول بنجاح عبر ووردبريس
			if (!is_wp_error($user)) {
					// جلب معرّف الأسرة (إذا كان موجودًا في جدول الأسر المنتجة)
					$family_table_name = 'productive_family'; // اسم جدول الأسر المنتجة
					$user_data = $wpdb->get_row($wpdb->prepare(
							"SELECT * FROM $family_table_name WHERE user_login = %s",
							$username
					));

					if ($user_data && !empty($user_data->Family_ID)) {
							// تخزين family_id في user_meta
							update_user_meta($user->ID, 'family_id', $user_data->Family_ID);
					}

					// تخزين رسالة النجاح في الجلسة
					$_SESSION['login_success'] = "تم تسجيل دخولك بنجاح!";

					wp_redirect(home_url()); // إعادة التوجيه إلى الصفحة الرئيسية بعد تسجيل الدخول
					exit;
			} else {
					echo '<p class="error-message">فشل تسجيل الدخول.</p>';
			}
	} else {
			echo '<p class="error-message">يرجى إدخال اسم المستخدم وكلمة المرور.</p>';
	}
}

// عرض رسالة النجاح إذا كانت موجودة في الجلسة
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION['login_success'])) {
	echo '<p class="success-message">' . $_SESSION['login_success'] . '</p>';
	unset($_SESSION['login_success']); // إزالة الرسالة بعد عرضها
}






 



add_filter( 'woocommerce_account_menu_items', 'remove_my_account_menu_items', 999 );
function remove_my_account_menu_items( $items ) {
    // إزالة الأقسام غير المطلوبة من القائمة
    unset( $items['dashboard'] ); // إزالة لوحة التحكم
    unset( $items['downloads'] ); // إزالة التنزيلات
    unset( $items['edit-address'] ); // إزالة العنوان
    unset( $items['edit-account'] ); // إزالة تفاصيل الحساب
    unset( $items['customer-logout'] ); // إزالة تسجيل الخروج
    unset( $items['inquiries'] ); // إزالة قسم الاستفسارات (Inquiries)
    return $items;
}







/**
 * ربط الطلبات بالجدول
 */
add_action('woocommerce_checkout_create_order', 'save_order_data_to_custom_table', 10, 2);

function save_order_data_to_custom_table($order, $data) {
    global $wpdb;

    // اسم الجدول المخصص
    $table_name = 'order_table_new';

    // جلب تاريخ الطلب
    $order_date = $order->get_date_created(); // الحصول على تاريخ الطلب
    $formatted_date = $order_date ? $order_date->format('Y-m-d H:i:s') : current_time('Y-m-d H:i:s');

    // جلب معرف العميل
    $customer_id = $order->get_customer_id();

    // جلب رقم الجوال
    $customer_phone = $order->get_billing_phone(); // رقم الجوال من معلومات الفوترة

    // جلب العناصر المشتراة
    $items = $order->get_items();

    // التكرار على كل عنصر في الطلب
    foreach ($items as $item_id => $item) {
        $product_id = $item->get_product_id(); // معرف المنتج
        $quantity = $item->get_quantity(); // الكمية
        $total_price = $item->get_total(); // السعر الإجمالي للمنتج

        // استرجاع Family_ID بناءً على Product_id من جدول المنتجات
        $family_id_query = $wpdb->get_var($wpdb->prepare("SELECT Family_ID FROM product_table WHERE Product_id = %d", $product_id));

        if ($family_id_query) {
            $family_id = $family_id_query;

            // إدخال البيانات
            $result = $wpdb->insert(
                $table_name,
                array(
                    'Order_Date'          => $formatted_date,
                    'Product_id'          => $product_id,
                    'Customer_id'         => $customer_id,
                    'Family_ID'           => $family_id,  // إضافة معرف الأسرة هنا
                    'Product_total_price' => $total_price,
                    'Quantity_product'    => $quantity,
                    'customer_phone'      => $customer_phone, // إضافة رقم الجوال هنا
                ),
                array('%s', '%d', '%d', '%d', '%f', '%d', '%s') // أنواع البيانات
            );

            if ($result === false) {
                error_log('Failed to insert data. Error: ' . $wpdb->last_error . ' Query: ' . $wpdb->last_query);
            } else {
                error_log('Data inserted successfully');
            }
        } else {
            error_log('Family ID not found for Product ID: ' . $product_id);
        }
    }
}






/**
 * اضافة تعليق
 */

function save_review_in_both_tables($comment_id) {
	// الحصول على تفاصيل التعليق
	$comment = get_comment($comment_id);

	if (!$comment) {
			error_log("Comment not found for ID: $comment_id");
			return;
	}

	// استرجاع البيانات اللازمة
	$customer_id = $comment->user_id; // معرف المستخدم
	$message = $comment->comment_content; // نص التعليق
	$product_id = $comment->comment_post_ID; // معرف المنتج أو المنشور

	// الاتصال بقاعدة البيانات
	global $wpdb;
	$table_name = 'comment_table'; // اسم الجدول

	// التحقق من أن القيم الأساسية موجودة
	if (empty($product_id)) {
			error_log("Product ID is empty for comment ID: $comment_id");
			return;
	}

	// استرجاع معرف التعليق من wp_comments
	$comment_data = get_comment($comment_id);
	$wp_comment_id = $comment_data->comment_ID; // معرف التعليق في wp_comments

	// إضافة البيانات إلى الجدول
	$inserted = $wpdb->insert(
			$table_name,
			array(
					'Comment_id'   => $wp_comment_id, // استخدام معرف التعليق من wp_comments
					'Customer_id'  => $customer_id,
					'message'      => $message,
					'product_id'   => $product_id
			),
			array(
					'%d', // نوع البيانات لـ Comment_id
					'%d', // نوع البيانات لـ Customer_id
					'%s', // نوع البيانات لـ message
					'%d'  // نوع البيانات لـ product_id
			)
	);

	// التحقق من نجاح العملية
	if ($inserted === false) {
			error_log("Failed to insert comment into $table_name. MySQL Error: " . $wpdb->last_error);
	} else {
			error_log("Comment successfully inserted into $table_name for comment ID: $comment_id");
	}
}

// ربط الدالة بـ Hook عند إضافة تعليق
add_action('comment_post', 'save_review_in_both_tables');