<?php

use Symfony\Component\Translation\MessageCatalogue;

$catalogue = new MessageCatalogue('en', array (
  'validators' => 
  array (
    'username_invalid' => 'Invalid username',
    'birth.invalid' => 'Invalid birthdate',
    'user.not_blank' => 'One or more required parameters weren\'t introduced',
    'user.email_invalid' => 'Invalid e-mail',
    'user.phone.invalid' => 'Invalid phone',
    'user.password.not_confirmed' => 'Unconfirmed password',
    'user.email.not_unique' => 'The user with this email already exist',
    'user.login.not_unique' => 'The user with this username already exist',
    'product.not_blank' => 'This value should not be blank or contains unallowed values',
    'category.name.not_unique' => 'A category with this name already exists.',
  ),
));



return $catalogue;
