<?php
function nomLengthIsValid($nomToValid)
{
    $length = strlen($nomToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Nom correct'
    ];
    if ($length < 2){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Nom trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Nom trop long'
        ];
    }
    return $responses;
}

function prenomLengthIsValid($prenomToValid)
{
    $length = strlen($prenomToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Prenom correct'
    ];
    if ($length < 2){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Prenom trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Prenom trop long'
        ];
    }
    return $responses;
};

function motLengthIsValid($motToValid)
{
    $length = strlen($motToValid);
    $responses=[
        'isValid' =>true,
        'msg'=>'Mot de Passe correct'
    ];
    if ($length < 6){
        $responses=[
            'isValid'=>false,
            'msg'=> 'Mot de Passe trop court'
        ];
    }elseif ($length > 10){
        $responses=[
            'isValid'=>false,
            'msg'=>'Mot de Passe trop long'
        ];
    }
    return $responses;
}
function addSalt($nameToSalt){
  $salt ='anitaRivera123';
  $saltedName =$salt.$nameToSalt.$salt;
  return $saltedName;
};

function encodeName($saltedName){
  $encodeName = sha1($saltedName);
  return $encodeName;
}