<!DOCTYPE html>
<html lang="en-US">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Email Template</title>
    <style type="text/css">
      @media screen and (max-width: 600px),
      screen and (max-device-width: 600px) {
        body {
          margin: 0 !important;
          padding: 0 !important;
        }
      }
      @media screen and (-webkit-min-device-pixel-ratio: 0) and (max-width: 600px) {
        body {
          margin: 0 !important;
          padding: 0 !important;
        }
      }
    </style>
  </head>
  <body style="margin: 0; padding: 0; border: 0;">
    <table width="100%" align="center" cellpadding="0" cellspacing="0" border="0" dir="ltr" style="background-color: rgb(242, 245, 247);">
      <tbody>
        <tr>
          <td align="center" valign="top" style="margin: 0; padding: 0px 15px 0px;">
            <table width="600" align="center" border="0" cellspacing="0" cellpadding="0" style="width: 600px;">
              <tbody>
                @include('emails.includes.header')  
                
                <tr>
                  <td align="center" valign="top" style="margin: 0; padding: 0;">
                    <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff">
                      <tbody>
                        <tr>
                          <td align="left" valign="top" style="margin: 0px; padding: 30px 30px 10px 30px; background-color: rgb(255, 255,
									255); font-size: 16px; font-family: 'Lato', Arial, Helvetica, sans-serif; line-height: 1.33;">
                            <span style="font-family: 'Lato', Arial, Helvetica, sans-serif; color: #fa006e; font-size: 20px;">
										<span style="font-weight: 700;">Pioneer Signup</span>
                            </span>
                          </td>
                        </tr>
                        <tr>
                          <td align="left" valign="top" style="margin: 0px; padding: 0 30px 24px 30px; background-color: rgb(255, 255, 255); font-size: 16px; font-family: 'Lato', Arial, Helvetica, sans-serif; line-height: 24px;">
                            <p> Hello {{$admin->first_name}} {{$admin->last_name}}. New Pioneer member signup name {{$user->first_name}}. 



</p>
</td>
</tr>
                        
              </tbody>
            </table>

            @include('emails.includes.thank') 



          </td>
        </tr>
        



        
        @include('emails.includes.footer')
      </tbody>
    </table>
    </td>
    </tr>
    </tbody>
    </table>
  </body>
</html>