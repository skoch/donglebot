<?php

  $payload = array();
  $text = '---';
  // if( isset( $_GET['n'] ) )
  if( isset( $_POST['token'] ) && $_POST['token'] == 'PIJ8vEkgOnoDIpmaiK4ynkJj' )
  {
    $channel = $_POST['channel_name'];
    // $name = $_GET['n'];
    $name = isset( $_POST['text'] ) ? $_POST['text'] : 'excuseme';

    if( strpos( $_SERVER['HTTP_HOST'], 'herokuapp.com' ) !== false )
    {
      $uri = 'mongodb://skoch:n%Ub2yk.2?Ei>2B6FnLKP@ds045464.mongolab.com:45464/heroku_70gfb9l5';
      $options = array( 'connectTimeoutMS' => 30000 );
      $m = new MongoClient( $uri, $options );
      $db = $m->heroku_70gfb9l5;
      $dongbot_collection = $db->dongles;
    }else
    {
      $m = new MongoClient();
      $db = $m->dongles;
      $dongbot_collection = $db->dongbot;
    }

    $dongle = $dongbot_collection->findOne(
      array( "Name" => $name )
    );

    $text = $dongle['Donger'];
    if( $channel != 'test' )
    {
      $payload['channel'] = "#$channel";
    }

    // echo "<pre>"; print_r( array( '$dongle' => $dongle['Donger']) ); echo "</pre>";
  }

  $payload['text'] = $text;

  $url = 'https://hooks.slack.com/services/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';
  $vars = 'payload=' . json_encode( $payload );

  $ch = curl_init( $url );
  curl_setopt( $ch, CURLOPT_POST, 1 );
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $vars );
  curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1 );
  curl_setopt( $ch, CURLOPT_HEADER, 0 );
  curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );

  $response = curl_exec( $ch );


?>
