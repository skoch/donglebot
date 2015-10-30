<?php

  $dongles = get_dongles();
  echo "<pre>"; print_r( array( '$dongles' => $dongles ) ); die( "</pre>" );

  function get_dongles()
  {
    $dongles = array();
    $csv = "https://docs.google.com/spreadsheets/d/1_yiCbDyfTzQcixWZR8Yl_yjGjT2wBgAcJRZ8aw1o1qw/pub?output=csv";
    // $row = 1;
    if( ( $handle = fopen( $csv, "r" ) ) !== FALSE )
    {
      while( ( $data = fgetcsv( $handle, 1000, "," ) ) !== FALSE )
      {
        // $dongles[] = htmlentities( $data[0] );
        $dongles[$data[0]] = $data[1];
      }
      fclose( $handle );
    }

    return $dongles;
  }
?>
