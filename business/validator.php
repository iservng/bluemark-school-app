<?php
class Validate {
  private $fields;

  public function __construct() {
    $this->fields = new Fields;
  }

  public function getFields() {
    return $this->fields;
  }

  // Validate a generic text fields
  public function text($name, $value, $required = true, $min = 3, $max = 100) {
    //Get field object  onyeka_address
    $field = $this->fields->getField($name);

    // If field is not required and empty, remove error and exit
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }

    //Check field and set or clear error message onyeka_address
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else {
      $field->clearErrorMessage();
    }
  }


  /*****************The room booked validator*******************/



  /*******************************************************/
//THESE ARE MINE
  //So am gonna make my custom made function here
  public function onyekaname_text($name, $value, $required = true, $min = 3, $max = 30) {
    //Get field object
    $field = $this->fields->getField($name);

    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }

    //Check field and set or clear error message
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    // call pattern below
    $pattern = '/^[a-zA-Z]{3,30}$/';
    $message = 'Invalid Name Format';
    $this->pattern($name, $value, $pattern, $message, true);
  }






  // onyeka other text
  public function onyekaother_text($name, $value, $required = true, $min = 3, $max = 20) {
    //Get field object
    $field = $this->fields->getField($name);
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    //Check field and set or clear error message
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    // call pattern below
    $pattern = '/^[a-zA-Z]{3,20}$/';
    $message = 'Invalid field Format';
    $this->pattern($name, $value, $pattern, $message, $required = true);
  }

  public function onyekacarno_text($name, $value, $required = true, $min = 3, $max = 20) {
    //Get field object
    $field = $this->fields->getField($name);
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    //Check field and set or clear error message
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    // call pattern below
    $pattern = '/^[[:alnum:]]{3,10}$/';
    $message = 'Invalid field Format';
    $this->pattern($name, $value, $pattern, $message, $required = true);
  }




  // Onyeka ID test here below
  public function onyekaID_text($name, $value, $required = true, $min = 3, $max = 20) {
    //Get field object
    $field = $this->fields->getField($name);
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    //Check field and set or clear error message
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }
    // call pattern below
    // $pattern = '/^[[:digit:]]{3,20}$/';
    $pattern = '/^[a-zA-Z0-9\/]{3,20}$/';
    $message = 'Invalid field Format';
    $this->pattern($name, $value, $pattern, $message, $required = true);
  }

// price text
public function onyekaprice_text($name, $value, $required = true, $min = 1, $max = 20) {
  //Get field object
  $field = $this->fields->getField($name);
  if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  //Check field and set or clear error message onyeka_address
  if ($required && empty($value)) {
    $field->setErrorMessage('Required');
  } else if (strlen($value) < $min) {
    $field->setErrorMessage('Too short');
  } else if (strlen($value) > $max) {
    $field->setErrorMessage('Too long');
  } else if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  // call pattern below
  $pattern = '/^[[:digit:]]{1,20}$/';
  $message = 'Invalid field Format';
  $this->pattern($name, $value, $pattern, $message, $required = true);
}

///serach date function here
public function dayMonthdate($name, $value, $required = true, $min = 1, $max = 2) {
  //Get field object
  $field = $this->fields->getField($name);
  if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  //Check field and set or clear error message
  if ($required && empty($value)) {
    $field->setErrorMessage('Required');
  } else if (strlen($value) < $min) {
    $field->setErrorMessage('Too short');
  } else if (strlen($value) > $max) {
    $field->setErrorMessage('Too long');
  } else if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  // call pattern below
  $pattern = '/^[[:digit:]]{1,2}$/';
  $message = 'Invalid field Format';
  $this->pattern($name, $value, $pattern, $message, $required = true);
}


// YEAR DATE
public function yeardate($name, $value, $required = true, $min = 1, $max = 4) {
  //Get field object
  $field = $this->fields->getField($name);
  if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  //Check field and set or clear error message
  if ($required && empty($value)) {
    $field->setErrorMessage('Required');
  } else if (strlen($value) < $min) {
    $field->setErrorMessage('Too short');
  } else if (strlen($value) > $max) {
    $field->setErrorMessage('Too long');
  } else if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  // call pattern below
  $pattern = '/^[[:digit:]]{1,4}$/';
  $message = 'Invalid field Format';
  $this->pattern($name, $value, $pattern, $message, $required = true);
}




  //Address Fields my own
  public function onyeka_address($name, $value, $required = true, $min = 3, $max = 300) {
    //Get field object
    $field = $this->fields->getField($name);

    // If field is not required and empty, remove error and exit
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }

    //Check field and set or clear error message
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else {
      $field->clearErrorMessage();
    }

    // call pattern below
    $pattern = '/^[a-zA-Z0-9\s\.,-]{1,300}$/';
    $message = 'Invalid Address Format';
    $this->pattern($name, $value, $pattern, $message, $required = true);
  }

  //This function validate long strings that are longer that 300 characters 
  public function onyeka_longText($name, $value, $required = true, $min = 3, $max = 3000) {
    //Get field object
    $field = $this->fields->getField($name);

    // If field is not required and empty, remove error and exit
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }

    //Check field and set or clear error message
    if ($required && empty($value)) {
      $field->setErrorMessage('Required');
    } else if (strlen($value) < $min) {
      $field->setErrorMessage('Too short');
    } else if (strlen($value) > $max) {
      $field->setErrorMessage('Too long');
    } else {
      $field->clearErrorMessage();
    }

    // call pattern below
    $pattern = '/^[a-zA-Z0-9\s\.,-]{3,}$/';
    $message = 'Invalid Address Format';
    $this->pattern($name, $value, $pattern, $message, $required = true);
  }

// onyeka_date function below
public function onyeka_date($name, $value, $required = true, $min = 3, $max = 10) {
  //Get field object
  $field = $this->fields->getField($name);

  // If field is not required and empty, remove error and exit
  if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }

  //Check field and set or clear error message
  if ($required && empty($value)) {
    $field->setErrorMessage('Required');
  } else if (strlen($value) < $min) {
    $field->setErrorMessage('Too short');
  } else if (strlen($value) > $max) {
    $field->setErrorMessage('Too long');
  } else {
    $field->clearErrorMessage();
  }

  // call pattern below
  //we shall remove this hard coded 2 in the 40years to come
  $pattern = '/^[2][[:digit:]]{3}[-][[:digit:]]{2}[-][[:digit:]]{2}$/';
  $message = 'Invalid Date Format';
  $this->pattern($name, $value, $pattern, $message, $required = true);
}








  // Validate a field with a generic pattern
  public function pattern($name, $value, $pattern, $message, $required = true) {

    //Get field object
    $field = $this->fields->getField($name);

    //If field is not required and empty
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }

    //Check field and set or clear error message
    $match = preg_match($pattern, $value);
    if ($match === false) {
      $field->setErrorMessage('Error testing field');
    } else if ($match != 1) {
      $field->setErrorMessage($message);
    } else {
      $field->clearErrorMessage();
    }
  }



  public function phone($name, $value, $required = true) {
    $field = $this->fields->getField($name);

    //Called the text method and exit if it yield error
    $this->text($name, $value, $required);
    if ($field->hasError()) {
      return;
    }


    //Call the pattern method to validate a phone number
    $pattern = '/^[0][7-9][0-1][[:digit:]]{8}$/';
    $message = 'Invalid phone number';
    $this->pattern($name, $value, $pattern, $message, $required);

  }


  


    public function bloodgroup($name, $value, $required = true) 
    {
      $field = $this->fields->getField($name);

      //Called the text method and exit if it yield error onyekaprice_text
      $this->text($name, $value, $required, 1, 3);
      if ($field->hasError()) {
        return;
      }


      //Call the pattern method to validate a phone number
      $pattern = '/^[[:alnum:]]{1,15}[\+\s]?$/';
      $message = 'Invalid phone number';
      $this->pattern($name, $value, $pattern, $message, $required);

    }






// function foreign_n_local_phones()
public function patternphone($name, $value, $required = true) {

  //Get field object
  $field = $this->fields->getField($name);

  //If field is not required and empty
  if (!$required && empty($value)) {
    $field->clearErrorMessage();
    return;
  }
  // $pattern = '/^(0[1-9]|1[012])\/[1-9][[:digit:]]{3}?$/'
  $pattern = '/^[[:digit:]]{8,15}$/';

  //Check field and set or clear error message
  $match = preg_match($pattern, $value);
  if ($match === false) {
    $field->setErrorMessage('Error testing field');
  } else if ($match != 1) {
    $field->setErrorMessage('Error testing field');
  } else {
    $field->clearErrorMessage();
  }
}






  public function email($name, $value, $required = true) {
    $field = $this->fields->getField($name);

    //if field is not required and empty, remove error and exit
    if (!$required && empty($value)) {
      $field->clearErrorMessage();
      return;
    }

    //Call the text method and exit if it yields an error
    $this->text($name, $value, $required);
    if ($field->hasError()) {
      return;
    }

    // Split email address on @ and check parts
    $parts = explode('@', $value);
    if (count($parts) < 2) {
      $field->setErrorMessage('At (@) sign required');
      return;
    }

    if (count($parts) > 2) {
      $field->setErrorMessage('Only one @ sign allowed');
      return;
    }

    $local = $parts[0];
    $domain = $parts[1];

    if (strlen($local) > 64) {
      $field->setErrorMessage('Username part too long');
      return;
    }

    if (strlen($domain) > 255) {
      $field->setErrorMessage('Domain name part too long');
      return;
    }

    //Patterns for address formattedd local part


    //Combined pattern for testing local part
    $localPattern = '/^[[:alnum:]]{3,64}$/';

    //Call the pattern function for email and exit if it yield an error
    $this->pattern($name, $local, $localPattern, 'Invalid username part.');
    if ($field->hasError()) {
      return;
    }

    //Pattern for domain part
    $hostname = '([[:alnum:]]([-[:alnum:]]{0,62}[[:alnum:]])?)';
    $hostnames = '(' . $hostname . '(\.' . $hostname . ')*)';
    $top = '\.[[:alnum:]]{2,6}';
    $domainPattern = '/^' . $hostnames . $top . '$/';

    //Call the pattern method
    $this->pattern($name, $domain, $domainPattern, 'Invalid domain name part');

  }


  public function password($name, $password, $required = true) {
    $field = $this->fields->getField($name);

    if (!$required && empty($password)) {
      $field-clearErrorMessage();
      return;
    }

    //Pattern to validate password
    $charClasses = array();
    $charClasses[] = '[:digit:]';
    $charClasses[] = '[:upper:]';
    $charClasses[] = '[:lower:]';

    $pw = '/^';
    $valid = '[';

    foreach ($charClasses as $charClass) {
      $pw .= '(?=.*[' . $charClass . '])';
      $valid .= $charClass;
    }
    $valid .= ']{6,}';
    $pw .= $valid . '$/';

    $pwMatch = preg_match($pw, $password);

    if ($pwMatch === false) {
      $field->setErrorMessage('Error testing password');
      return;
    } else if ($pwMatch != 1) {
      $field->setErrorMessage('Password must contain one upper, lower, and a digit');
      return;
    }

  }


  

  public function verify($name, $password, $verify, $required = true) {
    //Get the field object
    $field = $this->fields->getField($name);

    $this->text($name, $verify, $required, 8);
    if ($field->hasError()) {
      return;
    }

    if (strcmp($password, $verify) != 0) {
      $field->setErrorMessage('Password do not match');
      return;
    }


  }


  public function state($name, $value, $required = true) {
    $field = $this->fields->getField($name);
    $this->text($name, $value, $required);
    if ($field->hasError()) { return; }

    $states = array(
      'Abia',
      'Adamawa',
      'Akwa Ibom',
      'Anambra',
      'Bauchi',
      'Bayelsa',
      'Benue',
      'Borno',
      'Cross River',
      'Delta',
      'Ebonyi',
      'Enugu',
      'Edo',
      'Ekiti',
      'Gombe',
      'Imo',
      'Jigawa',
      'Kaduna',
      'Kano',
      'Katsina',
      'Kebbi',
      'Kogi',
      'Kwara',
      'Lagos',
      'Nasarawa',
      'Niger',
      'Ogun',
      'Ondo',
      'Osun',
      'Oyo',
      'Plateau',
      'Rivers',
      'Sokoto',
      'Taraba',
      'Yobe',
      'Zamfara',
      'Abuja'
    );

    $states = implode('|', $states);
    $pattern = '/^(' . $states . ')$/';

    $this->pattern($name, $value, $pattern, 'Invalid State.', $required);


  }



  public function zip($name, $value, $required = true) {
    //Get the field object
    $field = $this->fields->getField($name);

    $this->text($name, $value, $required);
    if ($field->hasError()) { return; }

    $pattern = '/^[[:digit:]]{5}(-[[:digit:]]{4})?$/';
    $message = 'invalid zip code';
    $this->pattern($name, $value, $pattern, $message, $required);
  }


  public function cardType($name, $value) {
    $field = $this->fields->getField($name);
    if (empty($value)) {
      $field-setErrorMessage('Please select a card');
      return;
    }

    $types = array();
    $types[] = 'm';
    $types[] = 'v';
    $types[] = 'a';
    $types[] = 'd';

    $types = implode('|', $types);
    $pattern = '/^(' . $types . ')$/';
    $this->pattern($name, $value, $pattern, 'Invalid card type.');

  }


  public function cardNumber($name, $value, $type) {
    //Get the field object
    $field = $this->fields->getfield($name);

    switch ($type) {
      case 'm':
        // code...MasterCard
        $prefixes = '51-55';
        $lengths = '16';
        break;

      case 'v':
        // code...Visa Card
        $prefixes = '4';
        $lengths = '13,16';
        break;

      case 'd':
        // code...Discover
        $prefixes = '6011,622126-622925,644-649,65';
        $lengths = '16';
        break;

      case 'a':
        // code...American Express
        $prefixes = '34,37';
        $lengths = '15';
        break;

      case '':
        // code...No card selected
        $field->setErrorMessage();
        return;

      default:
        // code...
        $field->setErrorMessage('Invalid card type');
        return;
    }
    //Check lengths
    $lengths = explode(',', $lengths);
    $validLengths = false;

    foreach ($lengths as $length) {
      $pattern = '/^[[:digit:]]{' . $length . '}$/';
      if (preg_match($pattern, $value) === 1) {
        $validLengths = true;
        break;
      }
    }

    if (!$validLengths) {
      $fild->setErrorMessage('Invalid card number length.');
      return;
    }

    //Check prefixes
    $prefixes = explode(',', $prefixes);
    $rangePattern = '/^[[:digit:]]+-[[:digit:]]+$/';
    $validPrefix = false;

    foreach ($prefixes as $prefix) {
      if (preg_match($rangePattern, $prefix) === 1) {

        $range = explode('-', $prefix);
        $start = intval($range[0]);
        $end = intval($range[1]);

        for($prefix = $start; $prefix <= $end; $prefix++) {
          $pattern = '/^' . $prefix . '/';
          if (preg_match($pattern, $value) === 1) {
            $validPrefix = true;
            break;
          }
        }

      } else {
        $pattern = '/^' . $prefix . '/';
        if (preg_match($pattern, $value) === 1) {
          $validPrefix = true;
          break;
        }
      }
    }

    if (!$validPrefix) {
      $field->setErrorMessage('Invalid card number prefix.');
      return;

    }

    //Validate checksum
    $sum = 0;
    $length = strlen($value);

    for ($i = 0; $i < $length; $i++) {
      $digit = intval($value[$length - $i - 1]);
      $digit = ($i % 2 == 1) ? $digit * 2 : $digit;
      $digit = ($digit > 9) ? $digit - 9 : $digit;
      $sum += $digit;
    }
    if ($sum % 10 != 0) {
      $field->setErrorMessage('Invalid card number checksum');
      return;
    }
    $field->clearErrorMessage();

  }


  public function expDate($name, $value) {
    $field = $this->fields->getField($name);
    $datePattern = '/^(0[1-9]|1[012])\/[1-9][[:digit:]]{3}?$/';

    $match = preg_match($datePattern, $value);
    if ($match === false) {
      $field->setErrorMessage('Error testing field');
      return;
    }

    if ($match != 1) {
      $field->setErrorMessage('Invalid date format.');
      return;
    }

    $dateParts = explode('/', $value);
    $month = $dateParts[0];
    $year = $dateParts[1];
    $dateString = $month . '/01/' . $year . 'last day of 23:59:59';
    $exp = new DateTime($dateString);
    $now = new DateTime();
    if ($xp < $now) {
      $field->setErrorMessage('Card has expired');
      return;
    }
    $field->clearErrorMessage();

  }


}

 ?>
