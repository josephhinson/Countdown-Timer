<?php
/**
* Initiation class for countdown timer
*/
class OT_CountDown_Timer {
	
	function __construct()
	{
		add_action('init', array($this, 'init'));
	}
	function init() {
		wp_enqueue_script('jquery');
		add_shortcode("countdown_timer", array($this, 'countdown_timer'));
	}
	// [countdown_timer year="2014" month="5" day="7" hour="1-24" format="dHMS"]
	function countdown_timer($atts) {
			extract(shortcode_atts(array(
				"year" => "2020",
				"month" => "12",
				"day" => "25",
				"hour" => "",
				'format' => 'dHMS',
				'class' => ''
	        ), $atts));
			$return = '';
			wp_enqueue_script( 'ot_cd_plugin', OT_COUNTDOWN_URL . 'js/countdown/jquery.plugin.min.js', 'jQuery', '1.0', true );
			wp_enqueue_script( 'ot_countdown', OT_COUNTDOWN_URL . 'js/countdown/jquery.countdown.min.js', 'ot_cd_plugin', '1.0', true );
			wp_enqueue_style( 'ot_countdown_css', OT_COUNTDOWN_URL.'css/countdown.css', false, '1.0', 'screen' );
			ob_start(); ?>
			<div class="ot_countdown_wrapper <?php echo $class; ?>" id="ot_countdown-wrapper">
				<script type="application/javascript">
				jQuery(document).ready(function() {
					var liftoff;
					liftoff = new Date(<?php echo $year; ?>, <?php echo $month; ?> - 1, <?php echo $day; ?>, <?php if ($hour) { echo $hour; } else { echo '0'; } ?>, 0, 0, 0);
					jQuery('.ot_countdown_wrapper').countdown( {
						until: jQuery.countdown.UTCDate(<?php echo get_option('gmt_offset'); ?>, liftoff),
						padZeroes: true,
						format: '<?php echo $format; ?>'
					});
				});
				</script>
			</div><!--end aligncenter -->
			<div class="clr"></div>
			<?php
			$return = ob_get_clean();
			return $return;
	}
	// end shortcode
}
$OT_CountDown_Timer = new OT_CountDown_Timer();