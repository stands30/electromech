<html xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:w="urn:schemas-microsoft-com:office:word" xmlns:m="http://schemas.microsoft.com/office/2004/12/omml" xmlns="http://www.w3.org/TR/REC-html40">

<head>
<meta http-equiv=Content-Type content="text/html; charset=utf-8">
<meta name=Generator content="Microsoft Word 12 (filtered medium)">
<style>

 /* Font Definitions */
 @font-face
	{font-family:"Cambria Math";
	panose-1:0 0 0 0 0 0 0 0 0 0;}
@font-face
	{font-family:Calibri;
	panose-1:2 15 5 2 2 2 4 3 2 4;}
@font-face
	{font-family:Tahoma;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
@font-face
	{font-family:"Lucida Sans";
	panose-1:2 11 6 2 3 5 4 2 2 4;}
@font-face
	{font-family:Verdana;
	panose-1:2 11 6 4 3 5 4 4 2 4;}
 /* Style Definitions */
 p.MsoNormal, li.MsoNormal, div.MsoNormal
	{margin:0in;
	margin-bottom:.0001pt;
	font-size:12.0pt;
	font-family:"Times New Roman","serif";}
a:link, span.MsoHyperlink
	{mso-style-priority:99;
	color:blue;
	text-decoration:underline;}
a:visited, span.MsoHyperlinkFollowed
	{mso-style-priority:99;
	color:purple;
	text-decoration:underline;}
span.EmailStyle17
	{mso-style-type:personal-reply;
	font-family:"Calibri","sans-serif";
	color:#1F497D;}
.MsoChpDefault
	{mso-style-type:export-only;}
@page Section1
	{size:8.5in 11.0in;
	margin:1.0in 1.0in 1.0in 1.0in;}
div.Section1
	{page:Section1;}

</style>
<!--[if gte mso 9]><xml>
 <o:shapedefaults v:ext="edit" spidmax="1026" />
</xml><![endif]--><!--[if gte mso 9]><xml>
 <o:shapelayout v:ext="edit">
  <o:idmap v:ext="edit" data="1" />
 </o:shapelayout></xml><![endif]-->
</head>

<body lang=EN-US link=blue vlink=purple>

<div class=Section1>



<p class=MsoNormal><o:p>&nbsp;</o:p></p>

<div>

<div>

<p class=MsoNormal><span style='font-family:"Verdana","sans-serif";color:#0B5394'><o:p>&nbsp;</o:p></span></p>

</div>

<div>

<div>

<div>

<div align=center>

<table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="100%"
 style='width:100.0%;background:#F2F2F2'>
  <tr>
    <td valign=top style='padding:22.5pt 15.0pt 22.5pt 15.0pt'>
    <table class=MsoNormalTable border=0 cellspacing=0 cellpadding=0 width="90%"
     style='width:90.0%;'>
     <tr>
      <td valign=top style='border:solid #DADADA 1.0pt;background:white;
      padding:22.5pt 22.5pt 22.5pt 22.5pt'>
        <div>
        <p class=MsoNormal style='margin-bottom:12.0pt;line-height:18.0pt'><span
        style='font-size:10.5pt;font-family:"Lucida Sans","sans-serif";color:#222222'>
         Dear <strong><?php echo $data['people']->ppl_title_name.' '.$data['people']->ppl_name; ?></strong>!
        <br>
        <br>
         Greeting From <?php if(!empty($data['people_company_name']))
         {
          echo $data['people_company_name']->bpm_value;
         } ?>
        <br>
        <br>
       <?php if($data['people']->event_name != '') { ?>It was pleasure meeting you at <strong><?php echo $data['people']->event_name; ?></strong> on&nbsp;<strong><?php echo $data['people']->event_date; ?></strong>
      		<?php } ?>
          <div>
              <?php if(isset($data['company_profile']->cpf_desc) && $data['company_profile']->cpf_desc != ''){ echo $data['company_profile']->cpf_desc; } ?>
            </div>
        </div>
      </td>
   </tr>
   <tr>
    <td valign=top style='padding:3.75pt 0in 0in 0in'>
    </td>
   </tr>
  </table>
  </td>
 </tr>
</table>

</div>

</div>

</div>

</div>

<p class=MsoNormal><o:p>&nbsp;</o:p></p>

</div>

</div>

</body>

</html>
