<?php
//+----------------------------------------------------------------------+
//| NOTEPAD GENERATOR
//+----------------------------------------------------------------------+
//| Notepad generator is a tool for customizing notepaper in PDF format. |
//| This tool is free to use and is distributed under the terms of       |
//| GNU GPL.                                                             |
//+----------------------------------------------------------------------+
//| Author: Michael Botsko                                               |
//+----------------------------------------------------------------------+
//
// $Id: notepaper.php,v 1.1 2007-01-08 19:12:54 botskonet Exp $

//+----------------------------------------------------------------------+
//| ABSOLUTELY DO NOT CHANGE THE FOLLOWING LINES                         |
//+----------------------------------------------------------------------+

	if(file_exists("class.pdf.php")){
		include("class.pdf.php");
	} else {
		print "I can't work without the PDF class.";
	}

//+----------------------------------------------------------------------+
//| BEGIN THE GENERATOR
//+----------------------------------------------------------------------+

  $pdf = new Cpdf(array(0,0,598,842));
  $pdf->selectFont('fonts/' . $_GET['my_font']);
  
//+----------------------------------------------------------------------+
//| SET DEFAULT MARGINS                            
//+----------------------------------------------------------------------+

  $page_length    = 792; // Length of page
  $page_width     = 612; // Length of page
  $bottom_margin  = 30;
  $left_margin    = 20;
  $right_margin   = 20;
  $line_height    = strip_tags($_GET['line_height']); // line height

//+----------------------------------------------------------------------+
//| CREATE PUNCH HOLES AND ADJUST LEFT MARGIN                            
//+----------------------------------------------------------------------+

  if(isset($_GET['show_punch_holes'])){
    if($_GET['show_punch_holes'] == "on"){
    
      $left_margin = 40;
      $pdf->ellipse(20,750,10);
      $pdf->ellipse(20,410,10);
      $pdf->ellipse(20,75,10);
    
    }
  }
  
//+----------------------------------------------------------------------+
//| CALCULATE POSITIONS
//+----------------------------------------------------------------------+

  function getXfromRightMargin($myString, $mySize){

    global $pdf, $page_width, $left_margin;

    $newX = ($page_width + $left_margin - $pdf->getTextWidth($mySize, $myString));

    return $newX;
  }
  
//+----------------------------------------------------------------------+
//| DRAW NOTEPAPER BOX AND LINES                            
//+----------------------------------------------------------------------+

  // Set the width of the section
    $note_section_width = 320 - $left_margin;
    
  // Set the height of the section
    $note_section_height = $page_length - $bottom_margin;
    
  // Loop through and draw each line
    $c = $bottom_margin;
  
    if((isset($_GET['show_notes_lines'])) && ($_GET['show_notes_lines'] == "on")){
      while($c < ($note_section_height - 10)){
        // Set the line style
        if(isset($_GET['use_light_lines'])){

          $pdf->setLineStyle(.5);

        } else {

          $pdf->setLineStyle(1);

        }
        
        $pdf->line($left_margin,$c,$note_section_width,$c);
        
        $c = $c + $line_height;
      }
    }
  
  // Set the line color/style
    $pdf->setStrokeColor(0,0,0);
    
    if(isset($_GET['use_light_lines'])){

      $pdf->setLineStyle(.5);
      
    } else {

      $pdf->setLineStyle(1);
      
    }
    
  // Draw the title
    $note_title_left_margin = round(($note_section_width / 2), 2);
    $pdf->addText($note_title_left_margin,$note_section_height,10,"Notes",0,0);

//+----------------------------------------------------------------------+
//| DRAW THE PAGE BOX                          
//+----------------------------------------------------------------------+

  // Calculate page width using margins
  $page_width = 580 - $left_margin;
  $pdf->rectangle($left_margin,$bottom_margin,$page_width,752); // Page box
  
//+----------------------------------------------------------------------+
//| DRAW THE ACTION ITEMS BOX                           
//+----------------------------------------------------------------------+

  // Calculate the width using margins
  $action_width = 230;
    
  // Draw the rectangle
  $pdf->rectangle($note_section_width,$bottom_margin,$action_width,752); // Action items section box
  
  // Loop through and draw each line
    $c = $bottom_margin;
    
    if((isset($_GET['show_actions_lines'])) && ($_GET['show_actions_lines'] == "on")){
      while($c < ($note_section_height - 10)){
        // Set the line style
        if(isset($_GET['use_light_lines'])){

          $pdf->setLineStyle(.5);

        } else {

          $pdf->setLineStyle(1);

        }

        $pdf->line($note_section_width,$c,($note_section_width + $action_width),$c);

        $c = $c + $line_height;
      }
    }
  
  // Set the title
  $action_title_left_margin = round(($action_width / 3), 2);
  $pdf->addText(($note_section_width + $action_title_left_margin),$note_section_height,10,"Action Items",0,0);
  
  
//+----------------------------------------------------------------------+
//| DRAW THE DUE DATE TITLE                          
//+----------------------------------------------------------------------+
  
  // Set the title
  $due_width = $page_width - ($note_section_width + $action_width);
  
  if(isset($_GET['show_punch_holes'])){
    if($_GET['show_punch_holes'] == "on"){
      $due_title_left_margin = round(($due_width), 2); 
    } else {
      $due_title_left_margin = round(($due_width / 2), 2); 
    }
  } else {
    
    $due_title_left_margin = round(($due_width / 2), 2); 
  
  }
  
  // Loop through and draw each line
    $c = $bottom_margin;

    if((isset($_GET['show_actions_lines'])) && ($_GET['show_actions_lines'] == "on")){
      while($c < ($note_section_height - 10)){
        // Set the line style
        if(isset($_GET['use_light_lines'])){

          $pdf->setLineStyle(.5);

        } else {

          $pdf->setLineStyle(1);

        }

        $pdf->line(($note_section_width + $action_width),$c, ($page_width + $left_margin),$c);

        $c = $c + $line_height;
      }
    }
  
  $pdf->addText(($note_section_width + $action_width + $due_title_left_margin),$note_section_height,10,"Due",0,0);

//+----------------------------------------------------------------------+
//| DRAW THE PAGE HEADER TEXT                         
//+----------------------------------------------------------------------+

  // User-Input: Name
  $pdf->addText($left_margin,810,10,strip_tags(stripslashes($_GET['my_name'])),0,0);
  
  // User-Input: Phone
  $pdf->addText($left_margin,797,10,strip_tags($_GET['my_phone']),0,0);
  
  // User-Input: Project
  $text_height_project = $note_section_height + 22;
  $pdf->addText($left_margin,$text_height_project,10,"PROJECT:",0,0);
  $pdf->addText(100,$text_height_project,10,strip_tags(stripslashes($_GET['my_project'])),0,0);
  
  // Month and Year
  if((isset($_GET['show_page_number'])) && ($_GET['show_page_number'] == "on")){
  
    $pdf->addText(510,$text_height_project,10,"PAGE:",0,0);
    
  }
  
  // Month and Year
  if((isset($_GET['show_date'])) && ($_GET['show_date'] == "on")){

    $pdf->addText(getXfromRightMargin(date($_GET['my_date_format']), 8),810,8,date($_GET['my_date_format']),0,0);
    
  }
  
//+----------------------------------------------------------------------+
//| DRAW THE FOOTER                         
//+----------------------------------------------------------------------+

$pdf->addText($left_margin,20,6, ("Notepad Generator by Mike Botsko; www.botsko.net"),0,0);

  // Month and Year
  if(isset($_GET['my_footer'])){
  
    $pdf->addText($left_margin,10,6, stripslashes($_GET['my_footer']),0,0);;
    
  }

//+----------------------------------------------------------------------+
//| GENERATE THE PDF                        
//+----------------------------------------------------------------------+

$pdf->stream();

?>
