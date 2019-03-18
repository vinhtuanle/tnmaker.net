<?php
/**
 * Cấu hình cơ bản cho WordPress
 *
 * Trong quá trình cài đặt, file "wp-config.php" sẽ được tạo dựa trên nội dung
 * mẫu của file này. Bạn không bắt buộc phải sử dụng giao diện web để cài đặt,
 * chỉ cần lưu file này lại với tên "wp-config.php" và điền các thông tin cần thiết.
 *
 * File này chứa các thiết lập sau:
 *
 * * Thiết lập MySQL
 * * Các khóa bí mật
 * * Tiền tố cho các bảng database
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Thiết lập MySQL - Bạn có thể lấy các thông tin này từ host/server ** //
/** Tên database MySQL */
define( 'DB_NAME', 'tnmaker' );

/** Username của database */
define( 'DB_USER', 'root' );

/** Mật khẩu của database */
define( 'DB_PASSWORD', '' );

/** Hostname của database */
define( 'DB_HOST', 'localhost' );

/** Database charset sử dụng để tạo bảng database. */
define( 'DB_CHARSET', 'utf8mb4' );

/** Kiểu database collate. Đừng thay đổi nếu không hiểu rõ. */
define('DB_COLLATE', '');

/**#@+
 * Khóa xác thực và salt.
 *
 * Thay đổi các giá trị dưới đây thành các khóa không trùng nhau!
 * Bạn có thể tạo ra các khóa này bằng công cụ
 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * Bạn có thể thay đổi chúng bất cứ lúc nào để vô hiệu hóa tất cả
 * các cookie hiện có. Điều này sẽ buộc tất cả người dùng phải đăng nhập lại.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         ']B?LWG)]#I;Pf<Tb:uqv1viQHPHwQgXu4iq)+itV3)+a7(^cn!I#22vxm.m1:dcI' );
define( 'SECURE_AUTH_KEY',  '1r9~^uUCg3e_e9tAH?YxYVXt}u^Yv3fyB0XayRMCoP5rrY1AcAkQ-1X3wYjYvB`,' );
define( 'LOGGED_IN_KEY',    'iU<U9C4-~j<J,9=3;u%?t{j/is^8b~FP<Co*s@9Y<U`_]o07{4K(?.d<Y9C;NwG!' );
define( 'NONCE_KEY',        'C#+O z3O[.H:sSX[PchX$E*ZOQy}]:)j~9(`jTK8GV[D*c)jet6L56!y/4rs7&o$' );
define( 'AUTH_SALT',        'Zgewf,2!IdT+Fi55y|>JRm,qj@/>h;MxnKxsOW%pL!+W//c7/f6c_%7rtlF =.r-' );
define( 'SECURE_AUTH_SALT', 'K356#4-/K;8D mE+U#xx-`Pv;v0:zz (LzQr+HnZDpR;;`1Jj9/b7D6b8#}!G}!1' );
define( 'LOGGED_IN_SALT',   '|>s,TYSCYF$&(b$Fy}I1?81kVz5,XL;DXQs1UgYA)D]whh%%#8(PwPlT3_F$@s>s' );
define( 'NONCE_SALT',       'A%CE2d/P1ce2,~%v7NsUXd?WrW+KD+7[258I%Lbb=0;#^J4OQf4`3>[a7#:GzjnF' );

/**#@-*/

/**
 * Tiền tố cho bảng database.
 *
 * Đặt tiền tố cho bảng giúp bạn có thể cài nhiều site WordPress vào cùng một database.
 * Chỉ sử dụng số, ký tự và dấu gạch dưới!
 */
$table_prefix = 'wp_';

/**
 * Dành cho developer: Chế độ debug.
 *
 * Thay đổi hằng số này thành true sẽ làm hiện lên các thông báo trong quá trình phát triển.
 * Chúng tôi khuyến cáo các developer sử dụng WP_DEBUG trong quá trình phát triển plugin và theme.
 *
 * Để có thông tin về các hằng số khác có thể sử dụng khi debug, hãy xem tại Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Đó là tất cả thiết lập, ngưng sửa từ phần này trở xuống. Chúc bạn viết blog vui vẻ. */

/** Đường dẫn tuyệt đối đến thư mục cài đặt WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Thiết lập biến và include file. */
require_once(ABSPATH . 'wp-settings.php');
