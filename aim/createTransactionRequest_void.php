<?php
/*************************************************************************************************

Use the AIM XML API to Void a transaction

SAMPLE XML FOR API CALL
--------------------------------------------------------------------------------------------------
<?xml version="1.0"?>
<createTransactionRequest xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <merchantAuthentication>
    <name>cnpdev4289</name>
    <transactionKey>SR2P8g4jdEn7vFLQ</transactionKey>
  </merchantAuthentication>
  <refId>87573639</refId>
  <transactionRequest>
    <transactionType>voidTransaction</transactionType>
    <refTransId>2165665483</refTransId>
  </transactionRequest>
</createTransactionRequest>

SAMPLE XML RESPONSE
--------------------------------------------------------------------------------------------------
<?xml version="1.0" encoding="utf-8"?>
<createTransactionResponse xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="AnetApi/xml/v1/schema/AnetApiSchema.xsd">
  <refId>87573639</refId>
  <messages>
    <resultCode>Ok</resultCode>
    <message>
      <code>I00001</code>
      <text>Successful.</text>
    </message>
  </messages>
  <transactionResponse>
    <responseCode>1</responseCode>
    <authCode>BXN26R</authCode>
    <avsResultCode>P</avsResultCode>
    <cvvResultCode/>
    <cavvResultCode/>
    <transId>2165665483</transId>
    <refTransID>2165665483</refTransID>
    <transHash>63F1254FC5E62EAE41A249CABD589D47</transHash>
    <testRequest>0</testRequest>
    <accountNumber>XXXX0015</accountNumber>
    <accountType>MasterCard</accountType>
    <messages>
      <message>
        <code>1</code>
        <description>This transaction has been approved.</description>
      </message>
    </messages>
  </transactionResponse>
</createTransactionResponse>

**************************************************************************************************/

    require('../config.inc.php');
    require('../AuthnetXML.class.php');


    $xml = new AuthnetXML(AUTHNET_LOGIN, AUTHNET_TRANSKEY, AuthnetXML::USE_DEVELOPMENT_SERVER);
    $xml->createTransactionRequest(array(
        'refId' => rand(1000000, 100000000),
        'transactionRequest' => array(
            'transactionType' => 'voidTransaction',
            'refTransId' => '2165665483'
        ),
    ));

    echo $xml;
?>