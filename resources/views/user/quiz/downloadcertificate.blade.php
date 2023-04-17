<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<title>Certificate</title>
<style>
body {

}
  .email-main{
    background:url("{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('app-assets/images/certificate/main-bg.png')))}}") no-repeat center top;
    
  }
.email-body {
    width:500px;
    margin: 0 auto;
    text-align: center;
  
}
@media print {
   body {
      -webkit-print-color-adjust: exact;
   }
}

/*Media Queries ------------------------------ */

@media only screen and (max-width: 600px) {
.email-body {
    width: 100% !important;
}
}

</style>
</head>

<body>
  <div class="email-main">
<table id="customers" width="500" border="0" cellspacing="0" cellpadding="0" class="email-body">
  <tbody>
    <tr>
      <td ><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="10">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td align="center"><img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('app-assets/images/certificate/logo.png')))}}" width="150;" class="img-fluid"></td>

              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="10">&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td align="center"><img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('app-assets/images/certificate/heading.png')))}}" style="width:150px"></td>
            </tr>
        <tr>
              <td>&nbsp;</td>
            </tr>
        <tr>
              <td align="center"><img src="{{'data:image/png;base64,'.base64_encode(file_get_contents(public_path('app-assets/images/certificate/heading-line.png')))}}"  style="width:300px"></td>
            </tr>
        <tr>
              <td align="left">&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    <tr>
      <td  valign="middle"></td>
    </tr>
    <tr>
      <td><table width="100%" border="0" cellspacing="0" cellpadding="0">
          <tbody>
            <tr>
              <td width="10">&nbsp;</td>
              <td>&nbsp;</td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td align="center"><span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 30px; color: #176ECD; text-align: center;">Hippa Business Trainings</span></td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td align="center">
          <span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 26px; color: #111024; text-align: center;">{{$array[0]}}&nbsp;{{$array[1]}}</span>
        </td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td  align="center" style="padding:0 15%;"><span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px; color:#333333; text-align:center;">Lorem ipsum dolor sit amet, viris sanctus partiendo ex sit, eum eu postulant iudicabit incorrupte. Eos ubique assueverit comprehensam ad.
 Erat nihil ut vix, cu possit repudiare scriptorem pri, mea an convenire molestiae.,</span></td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td align="center">
          <span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:20px; color: #111024;text-align:center">{{$array[2]}}</span>
        </td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
         <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
        <tr>
              <td width="10">&nbsp;</td>
              <td align="right">
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td width="200">&nbsp;</td>
      <td width="150" style="border-bottom:2px solid #111024;">&nbsp;</td>
      <td width="10">&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td style="font-size:5px;">&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td align="centerr><span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:20px; color: #111024;">Signature</span></td>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
</td>
              <td width="10">&nbsp;</td>
            </tr>
         <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
        <tr>
              <td width="10" style="font-size: 8px">&nbsp;</td>
              <td style="font-size: 8px">&nbsp;</td>
              <td width="10" style="font-size: 8px">&nbsp;</td>
            </tr>
          </tbody>
        </table></td>
    </tr>
    
    <tr>
      <td>&nbsp;</td>
    </tr>
  </tbody>
</table>
    </div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.debug.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<script>
    function demoFromHTML() {
var pdf = new jsPDF("p", "pt", "a4");
// source can be HTML-formatted string, or a reference
// to an actual DOM element from which the text will be scraped.
source = $('#customers')[0];

// we support special element handlers. Register them with jQuery-style 
// ID selector for either ID or node name. ("#iAmID", "div", "span" etc.)
// There is no support for any other type of selectors 
// (class, of compound) at this time.
specialElementHandlers = {
    // element with id of "bypass" - jQuery style selector
    '#bypassme': function (element, renderer) {
        console.log(element)
        // true = "handled elsewhere, bypass text extraction"
        return true
    }
};
margins = {
    top: 0,
    bottom:0,
    left:0,
    width:1800
};
// all coords and widths are in jsPDF instance's declared units
// 'inches' in this case
pdf.fromHTML(
source, // HTML string or DOM elem ref.
margins.left, // x coord
margins.top, { // y coord
    'width': margins.width, // max width of content on PDF
    'elementHandlers': specialElementHandlers
},

function (dispose) {
    // dispose: object with X, Y of the last line add to the PDF 
    //          this allow the insertion of new lines after html
    pdf.save('Test.pdf');
}, margins);
}
</script>

</body>
</html>
