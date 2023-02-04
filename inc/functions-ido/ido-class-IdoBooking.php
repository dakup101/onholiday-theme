<?php
class IdoBooking
{
    // @client (object): systemClient, systemLogin, systemPwd
    protected $client;
    protected $language;

    public function __construct()
    {
        $this->update_client();
    }

    public function update_db($systemClient, $systemLogin, $systemPWD)
    {
        global $wpdb;
        $table = $wpdb->base_prefix . 'ido_booking';
        $data = array(
            'systemClient' => $systemClient,
            'systemLogin' => $systemLogin,
            'systemPwd' => sha1($systemPWD)
        );
        $wpdb->query("TRUNCATE TABLE $table");

        $format = array('%s', '%s', '%s', '%s');
        $result = $wpdb->insert($table, $data, $format);
        $this->update_client();
        return $result;
    }

    // TODO: Removie this Function

    public function print_client()
    {
        echo "<pre>";
        print_r($this->client);
        echo "</pre>";
    }
    public function update_client()
    {
        global $wpdb;
        $sql = "SELECT * from `{$wpdb->base_prefix}ido_booking`";
        $result = $wpdb->get_results($sql);
        !empty($result) ? $this->client = $result[0] : $this->client = array();
    }
    public function get_client()
    {
        return $this->client;
    }
    public function get_key()
    {
        return sha1(date("Ymd")) . $this->client->systemPwd;
    }
}
