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
		background:url("{{asset('app-assets/images/certificate/left-top-bg.png')}}") no-repeat top left, url("{{asset('app-assets/images/certificate/right-top-bg.png')}}") no-repeat right top, url("{{asset('app-assets/images/certificate/left-bottom-bg.png')}}") no-repeat left bottom, url("{{asset('app-assets/images/certificate/right-bottom-bg.png')}}") no-repeat right bottom;
		width:700px;
    margin: 0 auto;
		padding:35px 25px;
		text-align: center;
	}
.email-body {
    width:500px;
    margin: 0 auto;
	
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
              <td><img src="{{asset('app-assets/images/certificate/logo.png')}}"  style="width:200px"></td>
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
              <td><img src="{{asset('app-assets/images/certificate/heading.png')}}" style="width:200px"></td>
            </tr>
			  <tr>
              <td>&nbsp;</td>
            </tr>
			  <tr>
              <td><img src="{{asset('app-assets/images/certificate/heading-line.png')}}"  style="width:400px"></td>
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
              <td><span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 40px; color: #176ECD;">Hippa Business Trainings</span></td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td>
				  <span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 36px; color: #111024;">{{$users->vendors->firstname}}{{$users->vendors->lastname}}</span>
				</td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td><span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:12px; color:#333333;">Lorem ipsum dolor sit amet, viris sanctus partiendo ex sit, eum eu postulant iudicabit incorrupte. Eos ubique assueverit comprehensam ad.
 Erat nihil ut vix, cu possit repudiare scriptorem pri, mea an convenire molestiae.,</span></td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
            </tr>
            <tr>
              <td width="10">&nbsp;</td>
              <td>
				  <span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size: 36px; color: #111024;">{{$round_off_percentage}}%</span>
				</td>
              <td width="10">&nbsp;</td>
            </tr>
            <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
            </tr>
			   <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
            </tr>
			  <tr>
              <td width="10">&nbsp;</td>
              <td align="right">
				  
				  <table width="150" border="0" cellspacing="0" cellpadding="0">
  <tbody>
    <tr>
      <td style="border-bottom:2px solid #111024;">&nbsp;</td>
    </tr>
    <tr>
      <td style="font-size:5px;">&nbsp;</td>
    </tr>
    <tr>
      <td align="center"><span style="font-family: Arial, 'Helvetica Neue', Helvetica, sans-serif; font-size:20px; color: #111024;">Signature</span></td>
    </tr>
  </tbody>
</table>
</td>
              <td width="10">&nbsp;</td>
            </tr>
			   <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
            </tr>
			  <tr>
              <td width="10" style="font-size: 12px">&nbsp;</td>
              <td style="font-size: 12px">&nbsp;</td>
              <td width="10" style="font-size: 12px">&nbsp;</td>
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
<div class="container">
  <div class="row">
    <div class="col text-center">
     <br> 
    <button class="btn btn-primary btn-lg" onclick="window.print()">Download</button>
  </div>
</div>
</div>
</body>
</html>
