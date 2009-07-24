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
// $Id: index.php,v 1.1 2007-01-08 19:12:54 botskonet Exp $

//+----------------------------------------------------------------------+
//| HERE WE;LL SET SOME SYSTEM VARIABLES                                 |
//+----------------------------------------------------------------------+

  $Application_Version    = "1.0.0a";
  $Application_Build      = "20051209";
  $Application_Auth_Email = "botsko@gmail.com";

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
  <head>
  <meta http-equiv="content-type" content="text/html; charset=windows-1250">
  <title>Notepad Generator</title>
  
  <style type="text/css">
  
    body {
      font-family: Verdana, arial, sans-serif;
      font-size: 10pt;
      padding: 10px;
    }

    #main-content {
      width: 600px;
    }
    
    .page-title {
      font-family: Verdana, arial, sans-serif;
      font-size: 16pt;
    }
    
    .small-text {
      font-family: Verdana, arial, sans-serif;
      font-size: 8pt;
    }
    
    #main-content legend {
      font-family: Verdana, arial, sans-serif;
      font-size: 12pt;
      font-weight: bold;
      color: darkgreen;
    }
    
    #google_ad {
      border: 1px solid #ccc;
    }
    
  </style>
  
  </head>
  <body>
  <div id="main-content">
  
  <span class="page-title">Notepad Generator - <?php print $Application_Version; ?></span><br />
  <span class="small-text">By <a href="http://botsko.net" target="_blank">Michael Botsko / Botsko.net</a></span><br /><br />
  
  This tool allows you to customize a PDF notepad. I needed a way to organize my notes from various meetings, so I developed this to assist me. Below you can customize how you would like your PDF file to look. You can then print it out on standard 8 <small>1/2</small> x 11 paper.
  
  <br /><br />
  <i>Web design. Programming. <a href="http://www.botsko.net/Website/index.php?p=home">Botsko.net is perfect for your business.</a></i>
  
  <br /><br />
  
  <div id="google_ad">
<script type="text/javascript"><!--
google_ad_client = "pub-0078816256219662";
google_ad_width = 468;
google_ad_height = 60;
google_ad_format = "468x60_as";
google_ad_type = "text";
google_ad_channel ="";
//--></script>
<script type="text/javascript"
  src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
  </div>
  
  <br /><br />
  <a href="mailto:<?php print $Application_Auth_Email; ?>?subject=Notepad_Generator_<?php print $Application_Version; ?>_<?php print $Application_Build; ?>">Report Bug/Suggestion</a>
  
  <br /><br />
  
  <form action="notepaper.php" method="GET">
  
  <fieldset>
    <legend>Basic Information</legend>
  <table cellpadding="3" cellspacing="3">
   <tr>
    <td>
        <label>Your Name</label>
    </td>
    <td>
        <input type="text" size="45" name="my_name" />
    </td>
   </tr>
   <tr>
    <td>
        Phone:
    </td>
    <td>
        <input type="text" size="45" name="my_phone" />
    </td>
   </tr>
   <tr>
    <td>
        Project Name:
    </td>
    <td>
        <input type="text" size="45" name="my_project" />
    </td>
   </tr>
   <tr>
    <td>
        Custom Footer:
    </td>
    <td>
        <input type="text" size="45" name="my_footer" />
    </td>
   </tr>
  </table>
  </fieldset>
  
  <br /><br />

  <fieldset>
    <legend>Font Changes</legend>
  <table>
   <tr>
    <td>
        Font:
    </td>
    <td>
        <select name="my_font">
          <option value="Courier">Courier</option>
          <option value="Helvetica" selected>Helvetica</option>
          <option value="Times-Roman">Times New Roman</option>
        </select>
    </td>
   </tr>
  </table>
  </fieldset>
  
  <br /><br />
    
  <fieldset>
    <legend>Page Adjusments</legend>
  <table>
   <tr>
    <td>
        <input type="checkbox" name="show_punch_holes" CHECKED>
    </td>
    <td>
        Show Punch Holes
    </td>
   </tr>
   <tr>
    <td>
        <input type="checkbox" name="show_page_number">
    </td>
    <td>
        Show Page Numbers
    </td>
   </tr>
   <tr>
    <td>
        <input type="checkbox" name="show_notes_lines" CHECKED>
    </td>
    <td>
        Show Lines in Notes Box
    </td>
   </tr>
   <tr>
    <td>
        <input type="checkbox" name="show_actions_lines">
    </td>
    <td>
        Show Lines in Actions Box
    </td>
   </tr>
   <tr>
    <td>
        <input type="text" size="2" maxlength="2" name="line_height" value="15" />
    </td>
    <td>
        Height of lines in note box.
    </td>
   </tr>
   <tr>
    <td>
        <input type="checkbox" name="use_light_lines" CHECKED />
    </td>
    <td>
        Use lighter shaded lines.
    </td>
   </tr>
   <tr>
    <td>
        <input type="checkbox" name="show_date" CHECKED>
    </td>
    <td>
        Show Date, format:
        <select name="my_date_format">
          <option value="F Y" SELECTED>December 2005</option>
          <option value="M d, Y">Dec 01, 2005</option>
          <option value="F d, Y">December 01, 2005</option>
          <option value="m/d/Y">12/01/2005 (MM/DD/YYYY)</option>
          <option value="d/m/Y">01/12/2005 (DD/MM/YYYY)</option>
          <option value="l M d, Y">Thursday Dec 01, 2005</option>
          <option value="l F d, Y">Thursday December 01, 2005</option>
        </select>
    </td>
   </tr>
  </table>
  </fieldset>
  
  <br /><br />
    
  <input type="submit" name="submit_button" value="Generate PDF" />
  
  </form>
  
  </div>
  
  <P>
  
<a href="http://t.extreme-dm.com/?login=montag45"
target="_top"><img src="http://t1.extreme-dm.com/i.gif"
name="EXim" border="0" height="38" width="41"
alt="eXTReMe Tracker"></img></a>
<script type="text/javascript" language="javascript1.2"><!--
EXs=screen;EXw=EXs.width;navigator.appName!="Netscape"?
EXb=EXs.colorDepth:EXb=EXs.pixelDepth;//-->
</script><script type="text/javascript"><!--
var EXlogin='montag45' // Login
var EXvsrv='s9' // VServer
navigator.javaEnabled()==1?EXjv="y":EXjv="n";
EXd=document;EXw?"":EXw="na";EXb?"":EXb="na";
EXd.write("<img src=http://e0.extreme-dm.com",
"/"+EXvsrv+".g?login="+EXlogin+"&amp;",
"jv="+EXjv+"&amp;j=y&amp;srw="+EXw+"&amp;srb="+EXb+"&amp;",
"l="+escape(EXd.referrer)+" height=1 width=1>");//-->
</script><noscript><img height="1" width="1" alt=""
src="http://e0.extreme-dm.com/s9.g?login=montag45&amp;j=n&amp;jv=n"/>
</noscript>
<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
  _uacct = "UA-335306-1";
  urchinTracker();
</script>
  </body>
</html>

