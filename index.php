<?php

  if( isset( $_GET['n'] ) )
  {
    $name = $_GET['n'];

    echo "<pre>"; print_r( 'heroku' ); echo "</pre>";
    echo "<pre>"; print_r( array( '$name' => $name) ); echo "</pre>";
    $m = new MongoClient( 'mongodb://skoch:n%Ub2yk.2?Ei>2B6FnLKP@ds045464.mongolab.com:45464/heroku_70gfb9l5' );
    echo "<pre>"; print_r( array( '$m' => $m) ); echo "</pre>";
    $db = $m->heroku_70gfb9l5;
    echo "<pre>"; print_r( array( '$db' => $db) ); echo "</pre>";
    $dongbot_collection = $db->dongles;
    echo "<pre>"; print_r( array( '$dongbot_collection' => $dongbot_collection) ); echo "</pre>";

    // if( strpos( $_SERVER['HTTP_HOST'], 'herokuapp.com' ) !== false )
    // {
    //   echo "<pre>"; print_r( 'heroku' ); echo "</pre>";
    //   echo "<pre>"; print_r( array( '$name' => $name) ); echo "</pre>";
    //   $m = new MongoClient( 'mongodb://skoch:n%Ub2yk.2?Ei>2B6FnLKP@ds045464.mongolab.com:45464/heroku_70gfb9l5' );
    //   echo "<pre>"; print_r( array( '$m' => $m) ); echo "</pre>";
    //   $db = $m->heroku_70gfb9l5;
    //   echo "<pre>"; print_r( array( '$db' => $db) ); echo "</pre>";
    //   $dongbot_collection = $db->dongles;
    //   echo "<pre>"; print_r( array( '$dongbot_collection' => $dongbot_collection) ); echo "</pre>";
    // }else
    // {
    //   $m = new MongoClient();
    //   $db = $m->dongles;
    //   $dongbot_collection = $db->dongbot;
    // }

    $dongle = $dongbot_collection->findOne(
      array( "Name" => $name )
    );
    echo "<pre>"; print_r( array( '$dongle' => $dongle['Donger']) ); echo "</pre>";
  }else
  {
    echo "<pre>"; print_r( 'choose again' ); echo "</pre>";
  }


?>
