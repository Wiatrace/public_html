<?php

namespace MPHB\Emails\Booking\Admin;

use MPHB\Admin\Fields\FieldFactory;
use MPHB\Admin\Tabs;

abstract class BaseEmail extends \MPHB\Emails\AbstractEmail {

	/**
	 * @param array  $atts
	 * @param string $atts['id'] ID of Email.
	 * @param string $atts['label'] Label.
	 * @param string $atts['description'] Optional. Email description.
	 * @param string $atts['default_subject'] Optional. Default subject of email.
	 * @param string $atts['default_header_text'] Optional. Default text in header.
	 */
	public function __construct( $atts, \MPHB\Emails\Templaters\EmailTemplater $templater ) {

		parent::__construct( $atts, $templater );
		add_action( 'mphb_generate_settings_admin_emails', array( $this, 'generateSettingsFields' ) );
	}

	/**
	 * @param Tabs\SettingsTab $tab
	 */
	public function generateSettingsFields( Tabs\SettingsTab $tab ) {

		parent::generateSettingsFields( $tab ); // TODO: Change the autogenerated stub

		$groups = $tab->getGroups();
		end( $groups )->addField(
			FieldFactory::create(
				'mphb_email_' . $this->id . '_recipients',
				array(
					'type'        => 'text',
					'label'       => __( 'Recipients', 'motopress-hotel-booking' ),
					'placeholder' => MPHB()->settings()->emails()->getAdminEmail(),
					'size'        => 'large',
					'description' => __( 'You can use multiple comma-separated emails', 'motopress-hotel-booking' ),
				)
			)
		);
	}


	/**
	 * @return string
	 * @since 3.8.6 returns the hotel admin email in test mode.
	 */
	protected function getReceiver() {

		if ( $this->isTestMode ) {
			return MPHB()->settings()->emails()->getHotelAdminEmail();
		}

		$recipients = $this->getOption( 'recipients' );

		if ( empty( $recipients ) ) {
			$recipients = MPHB()->settings()->emails()->getHotelAdminEmail();
		}

		return $recipients;
	}

	/**
	 * @return bool
	 */
	public function send() {

		do_action( '_mphb_translate_admin_email_before_send', $this->booking );

		$isSended = parent::send();

		do_action( '_mphb_translate_admin_email_after_send', $this->booking );

		return $isSended;
	}

	/**
	 * @param bool $isSended
	 */
	protected function log( $isSended ) {

		$author = $this->getAuthor();

		if ( $isSended ) {

			$this->booking->addLog( sprintf( __( '"%s" mail was sent to admin.', 'motopress-hotel-booking' ), $this->label ), $author );
		
		} else {

			$this->booking->addLog( sprintf( __( '"%s" mail sending to admin is failed.', 'motopress-hotel-booking' ), $this->label ), $author );
		}
	}
}
