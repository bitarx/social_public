<?php
require_once __DIR__ .'/OAuth/OAuth.php' ;

class NijiUtil extends OAuthSignatureMethod_RSA_SHA1
{
  const API_HOST        = "app.appli-hills.com";
  const CONSUMER_KEY    = "0b32fa9b34313ac6";
  const CONSUMER_SECRET = "25313091937645d622d373aba1882531";
  const PUBKEY_FILENAME = "public.crt";

  const SB_API_HOST        = "sb.app.appli-hills.com";
  const SB_CONSUMER_KEY    = "0bacae904380ed27";
  const SB_CONSUMER_SECRET = "54952402feba3e88d43f96859e6b25af";
  const SB_PUBKEY_FILENAME = "sb.public.crt";

  const DEV_API_HOST        = "sb.app.appli-hills.com";
  const DEV_CONSUMER_KEY    = "a706b39c5d02be7c";
  const DEV_CONSUMER_SECRET = "d0612b87942bf3a1cd78944ab47294e7";
  const DEV_PUBKEY_FILENAME = "sb.public.crt";

  protected $apiHost        = "";
  protected $consumerKey    = "";
  protected $consumerSecret = "";
  protected $publicKeyDir   = "";

  protected $errorlogFile =  "../tmp/logs/appli-hills_error.log";

  public static function create()
  {
    $util = new self();

    if (defined("AH_IS_SANDBOX") && AH_IS_SANDBOX) {
      $util->apiHost        = self::SB_API_HOST;
      $util->consumerKey    = self::SB_CONSUMER_KEY;
      $util->consumerSecret = self::SB_CONSUMER_SECRET;
    } elseif (defined("DEV_IS_SANDBOX") && DEV_IS_SANDBOX) {
      $util->apiHost        = self::DEV_API_HOST;
      $util->consumerKey    = self::DEV_CONSUMER_KEY;
      $util->consumerSecret = self::DEV_CONSUMER_SECRET;
    } else {
      $util->apiHost        = self::API_HOST;
      $util->consumerKey    = self::CONSUMER_KEY;
      $util->consumerSecret = self::CONSUMER_SECRET;
    }
    $util->publicKeyDir = dirname(__FILE__);

    return $util;
  }

  public function getSelf($fields = array())
  {
    $result = $this->getPeople("@me", "@self", null, $fields);
    return (isset($result["entry"]) && is_array($result["entry"])) ? $result["entry"] : null;
  }

  public function getPerson($targetId, $fields = array())
  {
    $result = $this->getPeople($targetId, "@self", null, $fields);
    return (isset($result["entry"]) && is_array($result["entry"])) ? $result["entry"] : null;
  }

  public function getFriends($hasApp = null, $count = 10, $startIndex = 0, $userId = "@me")
  {
    $query = array();
    $query["count"] = $count;
    $query["startIndex"] = (string)$startIndex;

    if ($hasApp !== null) {
      $query["filterBy"] = "hasApp";
      $query["filterOp"] = "equals";

      if ($hasApp === true) {
        $query["filterValue"] = "TRUE";
      } elseif ($hasApp === false) {
        $query["filterValue"] = "FALSE";
      }
    }

    $api = "/people/{$userId}/@friends?" . http_build_query($query, "", "&");

    $request = $this->getOAuthRequest($api, $this->getOwnerId(), "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());

    return ($result) ? @json_decode($result, true) : null;
  }

  public function createActivity($title, $url = null, $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $data = array();
    $data["title"] = $title;

    if (!empty($url)) {
      if (is_array($url)) {
        foreach ($url as $key => $_url) {
          $data[$key . "_url"] = $_url;
        }
      } else {
        $data["url"] = $url;
      }
    }

    $data = json_encode($data);

    $request = $this->getOAuthRequest("/activities/@me/@self/@app", $ownerId, "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));

    return ($result !== false);
  }

  public function saveAppData($data, $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $data = json_encode($data);

    $request = $this->getOAuthRequest("/appdata/@me/@self/@app", $ownerId, "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));

    return ($result !== false);
  }

  public function getAppData($fields = array(), $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $api = "/appdata/@me/@self/@app";

    if (!empty($fields)) {
      $api .= "?fields=" . implode(",", $fields);
    }

    $request = $this->getOAuthRequest($api, $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());
    $data    = ($result) ? @json_decode($result, true) : null;

    return (isset($data["entry"]) && is_array($data["entry"])) ? $data["entry"] : null;
  }

  public function deleteAppData($fields = array(), $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $api = "/appdata/@me/@self/@app";

    if (!empty($fields)) {
      $api .= "?fields=" . implode(",", $fields);
    }

    $request = $this->getOAuthRequest($api, $ownerId, "DELETE");
    $result  = $this->sendRequest($request, "202", $request->to_postdata());

    return ($result !== false);
  }

  public function createMessage($title, $body, $recipients, $url = null, $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $data = array();

    $data["title"]      = $title;
    $data["body"]       = $body;
    $data["recipients"] = (is_array($recipients)) ? $recipients : array($recipients);

    if (!empty($url)) {
      if (is_array($url)) {
        $urls = array();
        foreach ($url as $type => $_url) {
          $urls[] = array("value" => $_url, "type" => $type);
        }

        $data["urls"] = $urls;
      } else {
        $data["urls"] = array(
          array("value" => $url),
        );
      }
    }

    $data = json_encode($data);

    $request = $this->getOAuthRequest("/messages/@me/@outbox", $ownerId, "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));

    return ($result !== false);
  }

  public function saveTextData($text, $textDataId, $ownerId = null)
  {
  	if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $data = array();

    $data["text"]      = $text;
    $data["textDataId"]      = $textDataId;

    $data = json_encode($data);

    $request = $this->getOAuthRequest("/textdata/@me/@app/", $ownerId, "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));

    $result = @json_decode($result, true);
    return (isset($result["entry"])) ? $result["entry"] : null;
  }

  public function getTextData($fields = array(), $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $api = "/textdata/@me/@app";

    if (!empty($fields)) {
      $api .= "?fields=" . implode(",", $fields);
    }
    $request = $this->getOAuthRequest($api, $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());
    if (!$result) {
      return null;
    }

    $result = @json_decode($result, true);
    return (isset($result["entry"])) ? $result["entry"] : null;
  }

  public function deleteTextData($textdataId, $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $request = $this->getOAuthRequest("/textdata/@me/@app/$textdataId", $ownerId, "DELETE");
    $result  = $this->sendRequest($request, "202", $request->to_postdata());
    return ($result !== false);
  }

  public function createPayment($callbackUrl, $finishPageUrl, $items)
  {
    $data = array(
      "callbackUrl"    => $callbackUrl,
      "finishPageUrl"  => $finishPageUrl,
      "paymentEntries" => $items,
    );

    $data = json_encode($data);

    $request = $this->getOAuthRequest("/payment/@me/@self/@app", $this->getOwnerId(), "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));
    if (!$result) {
      return null;
    }

    $result = @json_decode($result, true);
    return (isset($result["payment"][0])) ? $result["payment"][0] : null;
  }

  public function getPayment($paymentId, $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $request = $this->getOAuthRequest("/payment/@me/@self/@app/{$paymentId}", $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());

    if (!$result) {
      return null;
    }

    $result = @json_decode($result, true);
    return (isset($result["payment"][0])) ? $result["payment"][0] : null;
  }

  public function getNgword($text)
  {
    $data = json_encode(array("text" => $text));

    $request = $this->getOAuthRequest("/ngwords", $this->getOwnerId(), "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));

    return ($result) ? @json_decode($result, true) : null;
  }

  public function createHpGrant($grantId)
  {
    $data = array(
      "grantId"    => $grantId,
    );

    $data = json_encode($data);
    $request = $this->getOAuthRequest("/hpgrant/@me/@self/@app", $this->getOwnerId(), "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));

    return ($result !== false);
  }

  public function createHpPayment($callbackUrl, $finishPageUrl, $items)
  {
    $data = array(
      "callbackUrl"    => $callbackUrl,
      "finishPageUrl"  => $finishPageUrl,
      "paymentEntries" => $items,
    );

    $data = json_encode($data);

    $request = $this->getOAuthRequest("/hppayment/@me/@self/@app", $this->getOwnerId(), "POST");
    $result  = $this->sendRequest($request, "201", $data, $this->requestToHeaders($request, $data));
    if (!$result) {
      return null;
    }

    $result = @json_decode($result, true);
    return (isset($result["entry"]["payment"][0])) ? $result["entry"]["payment"][0] : null;
  }

  public function getHpPayment($paymentId, $ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $request = $this->getOAuthRequest("/hppayment/@me/@self/@app/{$paymentId}", $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());

    if (!$result) {
      return null;
    }

    $result = @json_decode($result, true);
    return (isset($result["entry"]["payment"][0])) ? $result["entry"]["payment"][0] : null;
  }

  public function isBlocked($userId, $targetId = null)
  {
    $ownerId = $this->getOwnerId();

    if (empty($targetId)) {
      $targetId = $ownerId;
    }

    $request = $this->getOAuthRequest("/accessblocks/{$userId}/{$targetId}", $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());

    if (!$result) {
      return false;
    }

    $result = @json_decode($result, true);
    return (isset($result["status"])) ? ($result["status"] === "1") : false;
  }

  public function getPeople($userId, $selector, $pid = null, $fields = array())
  {
    $api = "/people/{$userId}/{$selector}";

    if (!empty($pid)) {
      $api .= "/{$pid}";
    }

    if (!empty($fields)) {
      $api .= "?fields=" . implode(",", $fields);
    }

    $request = $this->getOAuthRequest($api, $this->getOwnerId(), "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());

    return ($result) ? @json_decode($result, true) : null;
  }

  public function getCommunityStatus($ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }

    $request = $this->getOAuthRequest("/community/@me/@self/@app", $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());
    $result = @json_decode($result, true);

    return (isset($result["entry"]) && is_array($result["entry"])) ? $result["entry"] : null;
  }

  public function getTelAuth($ownerId = null)
  {
    if (empty($ownerId)) {
      $ownerId = $this->getOwnerId();
    }
    $request = $this->getOAuthRequest("/telauth/@me/@self/@app", $ownerId, "GET");
    $result  = $this->sendRequest($request, "200", $request->to_postdata());
    $result = @json_decode($result, true);

    return (isset($result["entry"]) && is_array($result["entry"])) ? $result["entry"] : null;
  }

  protected function getOAuthRequest($api, $requestorId = null, $method = "GET")
  {
    $url = "http://" . $this->apiHost . "/social/rest" . $api;

    $consumer = new OAuthConsumer($this->consumerKey, $this->consumerSecret);
    $request = OAuthRequest::from_consumer_and_token($consumer, null, $method, $url);

    if (!empty($requestorId)) {
      $request->set_parameter('xoauth_requestor_id', $requestorId);
    }

    $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, null);

    return $request;
  }

  protected function sendRequest($request, $expectedCode = "200", $data = null, $headers = array())
  {
  	$uri    = $request->get_normalized_http_url();
    $method = $request->get_normalized_http_method();

    if (!empty($data) && is_array($data)) {
      $data = http_build_query($data, "", "&");
    }

    $method = strtoupper($method);

    if ($method !== "POST" && !empty($data)) {
      $uri .= "?" . $data;
    }

    $curl = curl_init();

    curl_setopt($curl, CURLOPT_URL, $uri);

    if ($method === "POST") {
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
      curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
    } elseif ($method !== "GET") {
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
    }

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HEADER, 1);

    if (!empty($headers)) {
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    }

    $result = curl_exec($curl);

    curl_close($curl);

    list ($header, $body) = split("(\r\n){2}", $result);
    $responseCode = null;
    if (preg_match("!^(HTTP/\d\.\d) (\d{3})(?: (.+))?!", $header, $match)) {
      $responseCode = $match[2];
    }

    if ($responseCode === $expectedCode) {
      return $body;
    } else {
      if ($this->errorlogFile !== "") {
        $fp = fopen($this->errorlogFile, "a+");
        fwrite($fp, "Request URL: {$uri}" . PHP_EOL);

        if (!empty($data)) {
          fwrite($fp, "Request Data: {$data}" . PHP_EOL);
        }

        fwrite($fp, "Response Code: {$responseCode}" . PHP_EOL);
        fwrite($fp, "Response Body: {$body}" . PHP_EOL . PHP_EOL);
        fclose($fp);
      }

      return false;
    }
  }

  public function checkSignature($method = null, $url = null, $parameters = null)
  {
    $request = OAuthRequest::from_request($method, $url, $parameters);
    return $this->check_signature($request, null, null, $request->get_parameter("oauth_signature"));
  }

  public function getOwnerId()
  {
    // cookieを追加
    if (isset($_SESSION["opensocial_owner_id"])) {
      return $_SESSION["opensocial_owner_id"];
    } elseif (isset($_COOKIE["opensocial_owner_id"])) {
      return $_COOKIE["opensocial_owner_id"];
    } elseif (isset($_REQUEST["opensocial_owner_id"])) {
      return $_REQUEST["opensocial_owner_id"];
    } elseif (isset($_GET["opensocial_owner_id"])) {
      return $_GET["opensocial_owner_id"];
    } elseif (isset($_POST["opensocial_owner_id"])) {
      return $_POST["opensocial_owner_id"];
    }
  }

  protected function requestToHeaders($request, $data)
  {
    $authHeader = $request->to_header();

    if ($requestorId = $request->get_parameter("xoauth_requestor_id")) {
      $key   = OAuthUtil::urlencode_rfc3986("xoauth_requestor_id");
      $value = OAuthUtil::urlencode_rfc3986($requestorId);

      $authHeader .= ',' . $key . '="' . $value . '"';
    }

    return array(
      $authHeader,
      'Content-Type: application/json',
      'Content-Length: ' . strlen($data),
    );
  }

  protected function fetch_private_cert(&$request)
  {

  }

  protected function fetch_public_cert(&$request)
  {
    return $this->getPublicKey();
  }

  public function getPublicKey()
  {
    if (defined("AH_IS_SANDBOX") && AH_IS_SANDBOX) {
      return file_get_contents($this->publicKeyDir . "/" . self::SB_PUBKEY_FILENAME);
    } elseif (defined("DEV_IS_SANDBOX") && DEV_IS_SANDBOX) {
      return file_get_contents($this->publicKeyDir . "/" . self::DEV_PUBKEY_FILENAME);
    } else {
      return file_get_contents($this->publicKeyDir . "/" . self::PUBKEY_FILENAME);
    }
  }
}


