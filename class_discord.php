<?php
class Discord {
  public $id;
  public $data;
  public $channels;
  public $members;

  public function __construct($id) {
    $this->id = $id;
  }

  public function fetch() {
    $url = 'https://discordapp.com/api/servers/'.$this->id.'/widget.json';
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    $this->data = json_decode(curl_exec($ch));
    curl_close($ch);
  }

  public function getMemberCount() {
    return count($this->data->members);
  }

  public function getServerStatus() {
    if(count($this->data->members) > 0)
      $status = "success";
    else
      $status = "error";
    return $status;
  }
}
?>