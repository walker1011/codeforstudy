<?php
namespace tutorial;
class Person_PhoneType extends \PBEnum
{
  const MOBILE  = 0;
  const HOME  = 1;
  const WORK  = 2;

  public function __construct($reader=null)
  {
   	parent::__construct($reader);
 	$this->names = array(
			0 => "MOBILE",
			1 => "HOME",
			2 => "WORK");
   }
}
class Person_PhoneNumber extends \PBMessage
{
  var $wired_type = \PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["Person_PhoneNumber"]["1"] = "\\PBString";
    $this->values["1"] = "";
    self::$fieldNames["Person_PhoneNumber"]["1"] = "number";
    self::$fields["Person_PhoneNumber"]["2"] = "\\tutorial\\Person_PhoneType";
    $this->values["2"] = "";
    $this->values["2"] = new \tutorial\Person_PhoneType();
    $this->values["2"]->value = \tutorial\Person_PhoneType::HOME;
    self::$fieldNames["Person_PhoneNumber"]["2"] = "type";
  }
  function number()
  {
    return $this->_get_value("1");
  }
  function set_number($value)
  {
    return $this->_set_value("1", $value);
  }
  function type()
  {
    return $this->_get_value("2");
  }
  function set_type($value)
  {
    return $this->_set_value("2", $value);
  }
  function type_string()
  {
    return $this->values["2"]->get_description();
  }
}
class Person extends \PBMessage
{
  var $wired_type = \PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["Person"]["1"] = "\\PBString";
    $this->values["1"] = "";
    self::$fieldNames["Person"]["1"] = "name";
    self::$fields["Person"]["2"] = "\\PBInt";
    $this->values["2"] = "";
    self::$fieldNames["Person"]["2"] = "id";
    self::$fields["Person"]["3"] = "\\PBString";
    $this->values["3"] = "";
    self::$fieldNames["Person"]["3"] = "email";
    self::$fields["Person"]["4"] = "\\tutorial\\Person_PhoneNumber";
    $this->values["4"] = array();
    self::$fieldNames["Person"]["4"] = "phone";
  }
  function name()
  {
    return $this->_get_value("1");
  }
  function set_name($value)
  {
    return $this->_set_value("1", $value);
  }
  function id()
  {
    return $this->_get_value("2");
  }
  function set_id($value)
  {
    return $this->_set_value("2", $value);
  }
  function email()
  {
    return $this->_get_value("3");
  }
  function set_email($value)
  {
    return $this->_set_value("3", $value);
  }
  function phone($offset)
  {
    return $this->_get_arr_value("4", $offset);
  }
  function add_phone()
  {
    return $this->_add_arr_value("4");
  }
  function set_phone($index, $value)
  {
    $this->_set_arr_value("4", $index, $value);
  }
  function set_all_phones($values)
  {
    return $this->_set_arr_values("4", $values);
  }
  function remove_last_phone()
  {
    $this->_remove_last_arr_value("4");
  }
  function phones_size()
  {
    return $this->_get_arr_size("4");
  }
  function get_phones()
  {
    return $this->_get_value("4");
  }
}
class AddressBook extends \PBMessage
{
  var $wired_type = \PBMessage::WIRED_LENGTH_DELIMITED;
  public function __construct($reader=null)
  {
    parent::__construct($reader);
    self::$fields["AddressBook"]["1"] = "\\tutorial\\Person";
    $this->values["1"] = array();
    self::$fieldNames["AddressBook"]["1"] = "person";
  }
  function person($offset)
  {
    return $this->_get_arr_value("1", $offset);
  }
  function add_person()
  {
    return $this->_add_arr_value("1");
  }
  function set_person($index, $value)
  {
    $this->_set_arr_value("1", $index, $value);
  }
  function set_all_persons($values)
  {
    return $this->_set_arr_values("1", $values);
  }
  function remove_last_person()
  {
    $this->_remove_last_arr_value("1");
  }
  function persons_size()
  {
    return $this->_get_arr_size("1");
  }
  function get_persons()
  {
    return $this->_get_value("1");
  }
}
?>