<?php


namespace WPAdvanced\Settings;

class Phpmailer
{
  private $settings;

  public function __construct( $settings )
  {
    $this->settings = $settings;

    add_action('phpmailer_init', [$this, 'PHPMailerSettings']);
  }

  /**
   * @param $PHPMailer
   */
  public function PHPMailerSettings($PHPMailer) : void
  {
    $this->setSettings($PHPMailer);
  }

  /**
   * @param $PHPMailer
   */
  private function setSettings($PHPMailer) : void
  {
    $PHPMailer->IsSMTP();
    $PHPMailer->SMTPDebug  = $this->settings['debug_level'];
    $PHPMailer->Host       = $this->settings['host'];
    $PHPMailer->SMTPAuth   = true;
    $PHPMailer->Username   = $this->settings['username'];
    $PHPMailer->Password   = $this->settings['password'];
    $PHPMailer->SMTPSecure = $this->settings['secure'];
    $PHPMailer->Port       = $this->settings['port'];
    $PHPMailer->From       = $this->settings['from'];
    $PHPMailer->FromName   = get_bloginfo('name');

    if (empty($this->settings['secure'])) {
      $PHPMailer->SMTPAutoTLS = false;
    } else if ($this->settings['secure'] == 'ssl') {
      $PHPMailer->SMTPOptions = [
        'ssl' => [
          'verify_peer'       => false,
          'verify_peer_name'  => false,
          'allow_self_signed' => true,
        ]
      ];
    }
  }
}